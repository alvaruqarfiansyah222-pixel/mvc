<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $user = $this->user->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'nama' => $user['nama'],
                    'email' => $user['email']
                ];

                $_SESSION['alert'] = [
                    'type' => 'success',
                    'message' => 'Login berhasil.'
                ];

                header('Location: index.php');
                exit;
            }

            $_SESSION['alert'] = [
                'type' => 'error',
                'message' => 'Email atau password salah.'
            ];

            header('Location: index.php?page=login');
            exit;
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nama = trim($_POST['nama'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Cek data kosong
            if ($nama === '' || $email === '' || $password === '') {

                $_SESSION['alert'] = [
                    'type' => 'error',
                    'message' => 'Semua data wajib diisi.'
                ];

                header('Location: index.php?page=register');
                exit;
            }

            // Cek format email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $_SESSION['alert'] = [
                    'type' => 'error',
                    'message' => 'Format email tidak valid.'
                ];

                header('Location: index.php?page=register');
                exit;
            }

            // Cek panjang password
            if (strlen($password) < 6) {

                $_SESSION['alert'] = [
                    'type' => 'error',
                    'message' => 'Password minimal 6 karakter.'
                ];

                header('Location: index.php?page=register');
                exit;
            }

            // Cek email sudah terdaftar
            if ($this->user->findByEmail($email)) {

                $_SESSION['alert'] = [
                    'type' => 'error',
                    'message' => 'Email sudah terdaftar.'
                ];

                header('Location: index.php?page=register');
                exit;
            }

            // Simpan user
            $this->user->register(
                $nama,
                $email,
                $password
            );

            $_SESSION['alert'] = [
                'type' => 'success',
                'message' => 'Registrasi berhasil, silakan login.'
            ];

            header('Location: index.php?page=login');
            exit;
        }

        require __DIR__ . '/../views/auth/register.php';
    }

    public function logout(): void
    {
        unset($_SESSION['user']);

        $_SESSION['alert'] = [
            'type' => 'success',
            'message' => 'Anda berhasil logout.'
        ];

        header('Location: index.php?page=login');
        exit;
    }
}