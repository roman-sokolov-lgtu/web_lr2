<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delivery_type = htmlspecialchars($_POST["delivery_type"]);
    $client_name = htmlspecialchars($_POST["client_name"]);
    $driver = htmlspecialchars($_POST["driver"]);
    $city = htmlspecialchars($_POST["city"]);
    $street = htmlspecialchars($_POST["street"]);
    $house = htmlspecialchars($_POST["house"]);
    $apartment = htmlspecialchars($_POST["apartment"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $price = htmlspecialchars($_POST["price"]);

    if (empty($client_name) || empty($city) || empty($street) || empty($house) || empty($phone) || empty($price)) {
        die("Ошибка: Все обязательные поля должны быть заполнены!");
    }

    if (strlen($client_name) > 100) {
        die("Ошибка: Имя клиента слишком длинное (макс. 100 символов)!");
    }

    if (strlen($city) > 50) {
        die("Ошибка: Город слишком длинный (макс. 50 символов)!");
    }

    if (strlen($street) > 100) {
        die("Ошибка: Улица слишком длинная (макс. 100 символов)!");
    }

    if (strlen($house) > 10) {
        die("Ошибка: Номер дома слишком длинный (макс. 10 символов)!");
    }

    if (strlen($apartment) > 10) {
        die("Ошибка: Номер квартиры слишком длинный (макс. 10 символов)!");
    }

    if (strlen($phone) > 20) {
        die("Ошибка: Телефон слишком длинный (макс. 20 символов)!");
    }

    if (strlen($price) > 10) {
        die("Ошибка: Стоимость слишком большая (макс. 10 символов)!");
    }

    if (!preg_match("/^[0-9\-\+\s]+$/", $phone)) {
        die("Ошибка: Некорректный телефон!");
    }


    if (!preg_match("/^[0-9]+[a-zA-Zа-яА-Я]?$/u", $house)) {
        die("Ошибка: Некорректный номер дома!");
    }    

    if (!empty($apartment) && !preg_match("/^[0-9]+$/", $apartment)) {
        die("Ошибка: Квартира должна быть числом!");
    }

    $file = fopen("orders.csv", "a");
    fputcsv($file, [$delivery_type, $client_name, $driver, $city, $street, $house, $apartment, $phone, $price]);
    fclose($file);
   
    header("Location: success.php");
    exit();

} else {
    die("Ошибка: Некорректный метод запроса!");
}
?>
