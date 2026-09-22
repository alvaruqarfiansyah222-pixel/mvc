<?php

require_once __DIR__ . '/../models/Waktu.php';

class WaktuController
{
    private Waktu $waktu;

    public function __construct()
    {
        $this->waktu = new Waktu();
    }

    public function index(): void
    {
        // Cek apakah user sudah login
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $hasil = null;

        // Jika form dikirim
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $mulai = $_POST['mulai'] ?? '';
            $selesai = $_POST['selesai'] ?? '';

            // Hitung selisih waktu
            $hasil = $this->waktu->hitungSelisih(
                $mulai,
                $selesai
            );

            // Jika terjadi error
            if (!$hasil['success']) {
                $_SESSION['alert'] = [
                    'type' => 'error',
                    'message' => $hasil['message']
                ];

                header('Location: index.php');
                exit;
            }
        }

        // Tampilkan halaman penghitung waktu
        require __DIR__ . '/../views/waktu/index.php';
    }
}