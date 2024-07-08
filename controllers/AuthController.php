<?php
require_once '/opt/lampp/htdocs/mini_project/models/User.php';
require_once '/opt/lampp/htdocs/mini_project/helpers/Session.php';
require_once '/opt/lampp/htdocs/mini_project/helpers/Validation.php';

class AuthController {
    private $user;

    public function __construct($pdo) {
        $this->user = new User($pdo);
        Session::start();
    }

    public function login($username, $password, $rememberMe) {
        $user = $this->user->login($username, $password);
        if ($user) {
            Session::set('user', $user);
            if ($rememberMe) {
                setcookie('username', $username, time() + (86400), "/");
                setcookie('password', $password, time() + (86400), "/");
            }
            header('Location: /mini_project/views/dashboard.php');
        } else {
            header('Location: /mini_project/views/login.php?error=Invalid credentials');
        }
    }

    public function logout() {
        Session::destroy();
        setcookie('username', '', time() - 3600, "/");
        setcookie('password', '', time() - 3600, "/");
        header('Location: /mini_project/views/login.php');
    }

    public function register($username, $password, $email) {
        if (!Validation::notEmpty($username) || !Validation::notEmpty($password) || !Validation::validateEmail($email)) {
            header('Location: /mini_project/views/register.php?error=Invalid input');
            return;
        }

        if ($this->user->register($username, $password, $email)) {
            header('Location: /mini_project/views/login.php?message=Registration successful');
        } else {
            header('Location: /mini_project/views/register.php?error=Username already exists');
        }
    }
}
