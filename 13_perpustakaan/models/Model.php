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
    // DASHBOARD
    // =========================

    public function stats()
    {
        return [
            'buku' => $this->q(
                "SELECT COUNT(*) AS c FROM buku"
            )['c'],

            'anggota' => $this->q(
                "SELECT COUNT(*) AS c FROM anggota"
            )['c'],

            'dipinjam' => $this->q(
                "SELECT COUNT(*) AS c 
                 FROM peminjaman 
                 WHERE status = 'Dipinjam'"
            )['c'],

            'stok' => $this->q(
                "SELECT COALESCE(SUM(stok), 0) AS c 
                 FROM buku"
            )['c']
        ];
    }

    // Query sederhana
    private function q($sql)
    {
        return $this->db->query($sql)->fetch();
    }


    // =========================
    // DATA BUKU
    // =========================

    public function buku()
    {
        return $this->db
            ->query("SELECT * FROM buku ORDER BY id DESC")
            ->fetchAll();
    }

    public function getBuku($id)
    {
        $sql = "SELECT * FROM buku WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function saveBuku($d)
    {
        if (!empty($d['id'])) {

            $sql = "UPDATE buku 
                    SET kode = ?,
                        judul = ?,
                        pengarang = ?,
                        penerbit = ?,
                        tahun = ?,
                        stok = ?
                    WHERE id = ?";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                $d['kode'],
                $d['judul'],
                $d['pengarang'],
                $d['penerbit'],
                $d['tahun'],
                $d['stok'],
                $d['id']
            ]);

        } else {

            $sql = "INSERT INTO buku
                    (kode, judul, pengarang, penerbit, tahun, stok)
                    VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                $d['kode'],
                $d['judul'],
                $d['pengarang'],
                $d['penerbit'],
                $d['tahun'],
                $d['stok']
            ]);
        }
    }

    public function delBuku($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM buku WHERE id = ?"
        );

        $stmt->execute([$id]);
    }


    // =========================
    // DATA ANGGOTA
    // =========================

    public function anggota()
    {
        return $this->db
            ->query("SELECT * FROM anggota ORDER BY id DESC")
            ->fetchAll();
    }

    public function getAnggota($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM anggota WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function saveAnggota($d)
    {
        if (!empty($d['id'])) {

            $sql = "UPDATE anggota
                    SET nama = ?,
                        email = ?,
                        telepon = ?
                    WHERE id = ?";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                $d['nama'],
                $d['email'],
                $d['telepon'],
                $d['id']
            ]);

        } else {

            $sql = "INSERT INTO anggota
                    (nama, email, telepon)
                    VALUES (?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                $d['nama'],
                $d['email'],
                $d['telepon']
            ]);
        }
    }

    public function delAnggota($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM anggota WHERE id = ?"
        );

        $stmt->execute([$id]);
    }


    // =========================
    // PEMINJAMAN
    // =========================

    public function pinjaman()
    {
        $sql = "SELECT 
                    p.*,
                    b.judul,
                    a.nama
                FROM peminjaman p
                JOIN buku b 
                    ON b.id = p.id_buku
                JOIN anggota a 
                    ON a.id = p.id_anggota
                ORDER BY p.id DESC";

        return $this->db
            ->query($sql)
            ->fetchAll();
    }

    public function pinjam($d)
    {
        try {

            $this->db->beginTransaction();

            // Cek stok buku
            $stmt = $this->db->prepare(
                "SELECT stok 
                 FROM buku 
                 WHERE id = ? 
                 FOR UPDATE"
            );

            $stmt->execute([$d['id_buku']]);

            $buku = $stmt->fetch();

            if (!$buku || $buku['stok'] <= 0) {
                $this->db->rollBack();
                return false;
            }

            // Simpan data peminjaman
            $stmt = $this->db->prepare(
                "INSERT INTO peminjaman
                (id_buku, id_anggota, tanggal_pinjam)
                VALUES (?, ?, CURDATE())"
            );

            $stmt->execute([
                $d['id_buku'],
                $d['id_anggota']
            ]);

            // Kurangi stok
            $stmt = $this->db->prepare(
                "UPDATE buku
                 SET stok = stok - 1
                 WHERE id = ?"
            );

            $stmt->execute([
                $d['id_buku']
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
    // PENGEMBALIAN
    // =========================

    public function kembali($id)
    {
        $stmt = $this->db->prepare(
            "SELECT id_buku
             FROM peminjaman
             WHERE id = ?
             AND status = 'Dipinjam'"
        );

        $stmt->execute([$id]);

        $r = $stmt->fetch();

        if (!$r) {
            return false;
        }

        try {

            $this->db->beginTransaction();

            // Ubah status peminjaman
            $stmt = $this->db->prepare(
                "UPDATE peminjaman
                 SET status = 'Kembali',
                     tanggal_kembali = CURDATE()
                 WHERE id = ?"
            );

            $stmt->execute([$id]);

            // Tambahkan stok buku
            $stmt = $this->db->prepare(
                "UPDATE buku
                 SET stok = stok + 1
                 WHERE id = ?"
            );

            $stmt->execute([
                $r['id_buku']
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