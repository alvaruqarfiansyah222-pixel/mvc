<?php

require_once 'controllers/Controller.php';

$controller = new Controller();

$page = $_GET['page'] ?? 'dashboard';

$action = $_GET['action'] ?? 'index';

if (!method_exists($controller, $page)) {
    $page = 'dashboard';
}

$controller->$page($action);