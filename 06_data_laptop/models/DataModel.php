<?php
class DataLaptopModel {
    private PDO $pdo;
    private string $table = 'data_laptop';

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function all(): array {
        return $this->pdo->query("SELECT * FROM {$this->table} ORDER BY id DESC")->fetchAll();
    }

    public function find(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function create(array $data): void {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (pemilik, merek, tipe, tahun) VALUES (?, ?, ?, ?)");
        $stmt->execute(array_values($data));
    }

    public function update(int $id, array $data): void {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET pemilik=?, merek=?, tipe=?, tahun=? WHERE id = ?");
        $stmt->execute([...array_values($data), $id]);
    }

    public function delete(int $id): void {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
    }
}
