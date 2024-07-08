<?php
require_once 'config/config.php';
require_once 'helpers/Session.php';

Session::start();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'login':
        require_once 'controllers/AuthController.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rememberMe = isset($_POST['remember_me']) ? true : false;
        $authController = new AuthController($pdo);
        $authController->login($username, $password, $rememberMe);
        break;
    case 'logout':
        require_once 'controllers/AuthController.php';
        $authController = new AuthController($pdo);
        $authController->logout();
        break;
    case 'register':
        require_once 'controllers/AuthController.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $authController = new AuthController($pdo);
        $authController->register($username, $password, $email);
        break;
    case 'create':
        require_once 'controllers/CrudController.php';
        $name = $_POST['name'];
        $description = $_POST['description'];
        $crudController = new CrudController($pdo);
        $crudController->create($name, $description);
        break;
    case 'update':
        require_once 'controllers/CrudController.php';
        $id = $_GET['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $crudController = new CrudController($pdo);
        $crudController->update($id, $name, $description);
        break;
    case 'delete':
        require_once 'controllers/CrudController.php';
        $id = $_GET['id'];
        $crudController = new CrudController($pdo);
        $crudController->delete($id);
        break;
    default:
        if (Session::get('user')) {
            header('Location: views/dashboard.php');
        } else {
            header('Location: views/login.php');
        }
        break;
}
