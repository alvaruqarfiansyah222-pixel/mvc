<?php

session_start();

require_once __DIR__ . '/app/controllers/AuthController.php';
require_once __DIR__ . '/app/controllers/WaktuController.php';

$page = $_GET['page'] ?? '';

switch ($page) {
    case 'login':
        (new AuthController())->login();
        break;

    case 'register':
        (new AuthController())->register();
        break;

    case 'logout':
        (new AuthController())->logout();
        break;

    default:
        (new WaktuController())->index();
        break;
}