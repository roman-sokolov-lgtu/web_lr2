<?php
class Order {

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=db;dbname=mydb;charset=utf8', 'user', 'password');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }
    
    public function create($data, $userId) {
        $sql = "INSERT INTO orders (delivery_type, client_name, driver, city, street, house, apartment, phone, price, user_id, created_at)
                VALUES (:delivery_type, :client_name, :driver, :city, :street, :house, :apartment, :phone, :price, :user_id, NOW())";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':delivery_type' => $data['delivery_type'],
            ':client_name' => $data['client_name'],
            ':driver' => $data['driver'],
            ':city' => $data['city'],
            ':street' => $data['street'],
            ':house' => $data['house'],
            ':apartment' => $data['apartment'],
            ':phone' => $data['phone'],
            ':price' => $data['price'],
            ':user_id' => $userId
        ]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM orders ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUserId($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE user_id = :user_id ORDER BY id DESC");
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
