<?php
session_start();

class UserController {
    private $userModel;

    public function __construct() {
        require_once __DIR__ . '/../models/User.php';
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $error = "Заполните все поля!";
                require __DIR__ . '/../views/register.php';
                return;
            }

            if ($this->userModel->getByUsername($username)) {
                $error = "Пользователь с таким именем уже существует!";
                require __DIR__ . '/../views/register.php';
                return;
            }

            if ($this->userModel->register($username, $password)) {
                header('Location: /user/login');
                exit;
            } else {
                $error = "Ошибка при регистрации!";
                require __DIR__ . '/../views/register.php';
            }
        } else {
            require __DIR__ . '/../views/register.php';
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            $user = $this->userModel->getByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                header('Location: /order/index');
                exit;
            } else {
                $error = "Неверный логин или пароль!";
                require __DIR__ . '/../views/login.php';
            }
        } else {
            require __DIR__ . '/../views/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /user/login');
        exit;
    }

    public function profile() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /user/login');
            exit;
        }
        require __DIR__ . '/../views/profile.php';
    }

    public function list() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: /user/profile');
            exit;
        }

        $users = $this->userModel->getAllUsers();

        require_once __DIR__ . '/../views/userlist.php';
    }
}
?>
