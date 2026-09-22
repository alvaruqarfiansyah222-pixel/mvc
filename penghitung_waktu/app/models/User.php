<?php

require_once __DIR__ . '/../../config/database.php';

class User
{
    private PDO $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM users WHERE email = ?'
        );

        $stmt->execute([$email]);

        return $stmt->fetch() ?: null;
    }

    public function register(
        string $nama,
        string $email,
        string $password
    ): bool {
        $stmt = $this->db->prepare(
            'INSERT INTO users (nama, email, password)
             VALUES (?, ?, ?)'
        );

        return $stmt->execute([
            $nama,
            $email,
            password_hash($password, PASSWORD_DEFAULT)
        ]);
    }
}