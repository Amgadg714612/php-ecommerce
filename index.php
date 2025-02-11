<?php
// session_start();
require_once 'controllers/ProductController.php';
$controller = new ProductController();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';
switch ($action) {
    case 'add':
        $controller->add();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->list();
        break;
}


