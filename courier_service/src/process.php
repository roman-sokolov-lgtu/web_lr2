<?php
try {
    $pdo = new PDO('mysql:host=db;dbname=mydb;charset=utf8', 'user', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delivery_type = $_POST["delivery_type"] ?? '';
    $client_name = $_POST["client_name"] ?? '';
    $driver = $_POST["driver"] ?? '';
    $city = $_POST["city"] ?? '';
    $street = $_POST["street"] ?? '';
    $house = $_POST["house"] ?? '';
    $apartment = $_POST["apartment"] ?? '';
    $phone = $_POST["phone"] ?? '';
    $price = $_POST["price"] ?? '';

    $validDrivers = ["Иванов", "Петров", "Сидоров"];
    $validDeliveryTypes = ["Стандарт", "Экспресс"];

    if (empty($client_name) || empty($city) || empty($street) || empty($house) || empty($phone) || empty($price)) {
        die("Ошибка: Все обязательные поля должны быть заполнены!");
    }

    if (!in_array($driver, $validDrivers)) {
        die("Ошибка: Недопустимый водитель!");
    }

    if (!in_array($delivery_type, $validDeliveryTypes)) {
        die("Ошибка: Недопустимый тип доставки!");
    }

    if (mb_strlen($client_name) > 100) {
        die("Ошибка: Имя клиента слишком длинное (макс. 100 символов)!");
    }

    if (mb_strlen($city) > 50) {
        die("Ошибка: Город слишком длинный (макс. 50 символов)!");
    }

    if (mb_strlen($street) > 100) {
        die("Ошибка: Улица слишком длинная (макс. 100 символов)!");
    }

    if (mb_strlen($house) > 10) {
        die("Ошибка: Номер дома слишком длинный (макс. 10 символов)!");
    }

    if (mb_strlen($apartment) > 10) {
        die("Ошибка: Номер квартиры слишком длинный (макс. 10 символов)!");
    }

    if (mb_strlen($phone) > 20) {
        die("Ошибка: Телефон слишком длинный (макс. 20 символов)!");
    }

    if (mb_strlen($price) > 10) {
        die("Ошибка: Стоимость слишком большая (макс. 10 символов)!");
    }

    if (!preg_match("/^[0-9\-\+\s]+$/", $phone)) {
        die("Ошибка: Некорректный номер телефона!");
    }

    if (!preg_match("/^[0-9]+[a-zA-Zа-яА-Я]?$/u", $house)) {
        die("Ошибка: Некорректный номер дома!");
    }

    if (!empty($apartment) && !preg_match("/^[0-9]+$/", $apartment)) {
        die("Ошибка: Квартира должна быть числом!");
    }

    if (!is_numeric($price) || $price <= 0) {
        die("Ошибка: Стоимость должна быть положительным числом!");
    }

    $sql = "INSERT INTO orders 
        (delivery_type, client_name, driver, city, street, house, apartment, phone, price)
        VALUES 
        (:delivery_type, :client_name, :driver, :city, :street, :house, :apartment, :phone, :price)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':delivery_type' => $delivery_type,
        ':client_name' => $client_name,
        ':driver' => $driver,
        ':city' => $city,
        ':street' => $street,
        ':house' => $house,
        ':apartment' => $apartment,
        ':phone' => $phone,
        ':price' => $price
    ]);

    header("Location: success.php");
    exit();
} else {
    die("Ошибка: Некорректный метод запроса!");
}
