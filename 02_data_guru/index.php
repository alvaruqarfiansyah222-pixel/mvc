<?php
require_once 'config/database.php';
require_once 'models/DataModel.php';
require_once 'controllers/DataController.php';

$model = new DataGuruModel($pdo);
$controller = new DataGuruController($model);

$action = $_GET['action'] ?? 'index';

match ($action) {
    'create' => $controller->create(),
    'store' => $controller->store(),
    'edit' => $controller->edit(),
    'update' => $controller->update(),
    'delete' => $controller->delete(),
    default => $controller->index(),
};
