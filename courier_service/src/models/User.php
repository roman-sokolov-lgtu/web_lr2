<?php
class User {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=db;dbname=mydb;charset=utf8', 'user', 'password');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }

    public function register($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':username' => $username, ':password' => $hash]);
    }

    public function getByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers() {
        $stmt = $this->pdo->query("SELECT id, username, role FROM users ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
