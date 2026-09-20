<?php

require_once 'config/database.php';

class Model
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }


    // =========================
    // QUERY
    // =========================

    private function q($sql)
    {
        return $this->db->query($sql)->fetch();
    }


    // =========================
    // DASHBOARD
    // =========================

    public function stats()
    {
        return [
            'mobil' => $this->q(
                "SELECT COUNT(*) AS c FROM mobil"
            )['c'],

            'tersedia' => $this->q(
                "SELECT COUNT(*) AS c
                 FROM mobil
                 WHERE status = 'Tersedia'"
            )['c'],

            'dirental' => $this->q(
                "SELECT COUNT(*) AS c
                 FROM mobil
                 WHERE status = 'Dirental'"
            )['c'],

            'pelanggan' => $this->q(
                "SELECT COUNT(*) AS c
                 FROM pelanggan"
            )['c']
        ];
    }


    // =========================
    // DATA MOBIL
    // =========================

    public function mobil()
    {
        return $this->db
            ->query("SELECT * FROM mobil ORDER BY id DESC")
            ->fetchAll();
    }

    public function tersedia()
    {
        return $this->db
            ->query(
                "SELECT * FROM mobil
                 WHERE status = 'Tersedia'
                 ORDER BY id DESC"
            )
            ->fetchAll();
    }

    public function getMobil($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM mobil WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function saveMobil($d)
    {
        if (!empty($d['id'])) {

            $sql = "UPDATE mobil
                    SET nopol = ?,
                        nama = ?,
                        merk = ?,
                        tahun = ?,
                        harga_harian = ?
                    WHERE id = ?";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                $d['nopol'],
                $d['nama'],
                $d['merk'],
                $d['tahun'],
                $d['harga_harian'],
                $d['id']
            ]);

        } else {

            $sql = "INSERT INTO mobil
                    (nopol, nama, merk, tahun, harga_harian)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                $d['nopol'],
                $d['nama'],
                $d['merk'],
                $d['tahun'],
                $d['harga_harian']
            ]);
        }
    }

    public function delMobil($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM mobil WHERE id = ?"
        );

        $stmt->execute([$id]);
    }


    // =========================
    // DATA PELANGGAN
    // =========================

    public function pelanggan()
    {
        return $this->db
            ->query("SELECT * FROM pelanggan ORDER BY id DESC")
            ->fetchAll();
    }

    public function getPelanggan($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM pelanggan WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function savePelanggan($d)
    {
        if (!empty($d['id'])) {

            $sql = "UPDATE pelanggan
                    SET nama = ?,
                        no_telepon = ?,
                        alamat = ?
                    WHERE id = ?";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                $d['nama'],
                $d['no_telepon'],
                $d['alamat'],
                $d['id']
            ]);

        } else {

            $sql = "INSERT INTO pelanggan
                    (nama, no_telepon, alamat)
                    VALUES (?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                $d['nama'],
                $d['no_telepon'],
                $d['alamat']
            ]);
        }
    }

    public function delPelanggan($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM pelanggan WHERE id = ?"
        );

        $stmt->execute([$id]);
    }


    // =========================
    // DATA RENTAL
    // =========================

    public function list()
    {
        $sql = "SELECT
                    r.*,
                    m.nama AS mobil,
                    m.nopol,
                    p.nama AS pelanggan
                FROM rental r

                JOIN mobil m
                    ON m.id = r.id_mobil

                JOIN pelanggan p
                    ON p.id = r.id_pelanggan

                ORDER BY r.id DESC";

        return $this->db
            ->query($sql)
            ->fetchAll();
    }


    // =========================
    // PROSES RENTAL
    // =========================

    public function sewa($d)
    {
        try {

            $this->db->beginTransaction();

            // Cek mobil masih tersedia
            $stmt = $this->db->prepare(
                "SELECT harga_harian
                 FROM mobil
                 WHERE id = ?
                 AND status = 'Tersedia'
                 FOR UPDATE"
            );

            $stmt->execute([
                $d['id_mobil']
            ]);

            $mobil = $stmt->fetch();

            if (!$mobil) {

                $this->db->rollBack();

                return false;
            }


            // Hitung jumlah hari
            $mulai = new DateTime($d['tanggal_mulai']);
            $selesai = new DateTime($d['tanggal_selesai']);

            $hari = max(
                1,
                $mulai->diff($selesai)->days + 1
            );


            // Hitung total
            $total = $hari * $mobil['harga_harian'];


            // Simpan transaksi rental
            $stmt = $this->db->prepare(
                "INSERT INTO rental
                (
                    id_mobil,
                    id_pelanggan,
                    tanggal_mulai,
                    tanggal_selesai,
                    total
                )
                VALUES (?, ?, ?, ?, ?)"
            );

            $stmt->execute([
                $d['id_mobil'],
                $d['id_pelanggan'],
                $d['tanggal_mulai'],
                $d['tanggal_selesai'],
                $total
            ]);


            // Ubah status mobil
            $stmt = $this->db->prepare(
                "UPDATE mobil
                 SET status = 'Dirental'
                 WHERE id = ?"
            );

            $stmt->execute([
                $d['id_mobil']
            ]);


            $this->db->commit();

            return true;

        } catch (PDOException $e) {

            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            return false;
        }
    }


    // =========================
    // SELESAI RENTAL
    // =========================

    public function selesai($id)
    {
        try {

            $this->db->beginTransaction();

            // Cari mobil dari rental yang masih berjalan
            $stmt = $this->db->prepare(
                "SELECT id_mobil
                 FROM rental
                 WHERE id = ?
                 AND status = 'Berjalan'
                 FOR UPDATE"
            );

            $stmt->execute([$id]);

            $rental = $stmt->fetch();

            if (!$rental) {

                $this->db->rollBack();

                return false;
            }


            // Ubah status rental
            $stmt = $this->db->prepare(
                "UPDATE rental
                 SET status = 'Selesai'
                 WHERE id = ?"
            );

            $stmt->execute([$id]);


            // Kembalikan status mobil
            $stmt = $this->db->prepare(
                "UPDATE mobil
                 SET status = 'Tersedia'
                 WHERE id = ?"
            );

            $stmt->execute([
                $rental['id_mobil']
            ]);


            $this->db->commit();

            return true;

        } catch (PDOException $e) {

            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            return false;
        }
    }
}