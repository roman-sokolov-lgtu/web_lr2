<?php
try {
    $pdo = new PDO('mysql:host=db;dbname=mydb;charset=utf8', 'user', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM orders ORDER BY id DESC");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список заказов</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #eee; }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Список заказов</h2>
        <?php if (count($orders) > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Тип доставки</th>
                    <th>Клиент</th>
                    <th>Водитель</th>
                    <th>Город</th>
                    <th>Улица</th>
                    <th>Дом</th>
                    <th>Квартира</th>
                    <th>Телефон</th>
                    <th>Цена</th>
                </tr>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['id']) ?></td>
                        <td><?= htmlspecialchars($order['delivery_type']) ?></td>
                        <td><?= htmlspecialchars($order['client_name']) ?></td>
                        <td><?= htmlspecialchars($order['driver']) ?></td>
                        <td><?= htmlspecialchars($order['city']) ?></td>
                        <td><?= htmlspecialchars($order['street']) ?></td>
                        <td><?= htmlspecialchars($order['house']) ?></td>
                        <td><?= htmlspecialchars($order['apartment']) ?></td>
                        <td><?= htmlspecialchars($order['phone']) ?></td>
                        <td><?= htmlspecialchars($order['price']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Нет данных для отображения.</p>
        <?php endif; ?>
    <div>
</body>
</html>
