<?php
$controller = new \Controller\EmployeeController();
$page = $_REQUEST['page'] ?? null;
$name = $_POST['name'] ?? null;
switch ($page) {
    case 'list':
        $controller->getAll();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'add':
        $controller->add();
        break;
    case 'details':
        $controller->detailsEmployee();
        break;
    case 'edit':
        $controller->editEmployee();
        break;
    case 'search':
        $controller->search($name);
        break;
}
