<?php

require_once 'controllers/Controller.php';

$controller = new Controller();

$page = $_GET['page'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

// Jika halaman tidak ditemukan,
// kembali ke dashboard
if (!method_exists($controller, $page)) {
    $page = 'dashboard';
}

// Jalankan controller
$controller->$page($action);