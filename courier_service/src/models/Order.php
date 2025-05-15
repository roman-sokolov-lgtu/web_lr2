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

    public function create($data) {
        $sql = "INSERT INTO orders (delivery_type, client_name, driver, city, street, house, apartment, phone, price)
                VALUES (:delivery_type, :client_name, :driver, :city, :street, :house, :apartment, :phone, :price)";
        
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
            ':price' => $data['price']
        ]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM orders ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
