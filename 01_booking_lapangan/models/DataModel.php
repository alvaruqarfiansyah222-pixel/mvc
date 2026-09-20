<?php
class BookingLapanganModel {
    private PDO $pdo;
    private string $table = 'bookings';

    public function __construct(PDO $pdo) { $this->pdo = $pdo; }

    public function all(): array {
        return $this->pdo->query("SELECT * FROM {$this->table} ORDER BY id DESC")->fetchAll();
    }
    public function find(int $id): ?array {
        $s=$this->pdo->prepare("SELECT * FROM {$this->table} WHERE id=?");
        $s->execute([$id]); return $s->fetch() ?: null;
    }
    public function create(array $d): void {
        $cols = "nama, lapangan, jam, jumlah_orang, harga_per_orang, total";
        $place = implode(',', array_fill(0, count($d), '?'));
        $s=$this->pdo->prepare("INSERT INTO {$this->table} ($cols) VALUES ($place)");
        $s->execute(array_values($d));
    }
    public function update(int $id, array $d): void {
        $cols = explode(',', "nama, lapangan, jam, jumlah_orang, harga_per_orang, total");
        $set = implode(',', array_map(fn($c)=>trim($c).'=?', $cols));
        $s=$this->pdo->prepare("UPDATE {$this->table} SET $set WHERE id=?");
        $s->execute([...array_values($d), $id]);
    }
    public function delete(int $id): void {
        $s=$this->pdo->prepare("DELETE FROM {$this->table} WHERE id=?"); $s->execute([$id]);
    }
}
