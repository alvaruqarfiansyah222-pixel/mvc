<?php

require_once 'config/database.php';
require_once 'models/DataModel.php';
require_once 'controllers/DataController.php';


$model = new BookingLapanganModel($pdo);

$controller = new DataController($model);


$action = $_GET['action'] ?? 'index';


if ($action === 'create') {

    $controller->create();

} elseif ($action === 'store') {

    $controller->store();

} elseif ($action === 'edit') {

    $controller->edit();

} elseif ($action === 'update') {

    $controller->update();

} elseif ($action === 'delete') {

    $controller->delete();

} else {

    $controller->index();

}