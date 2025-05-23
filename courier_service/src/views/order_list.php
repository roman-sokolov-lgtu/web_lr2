<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список заказов</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
        <div class="header-row">
            <a href="/user/profile" class="back-button">←</a>
            <h2>Список заказов</h2>
        </div>
        <?php if (count($orders) > 0): ?>
            <table>
                <tr>
                    <th>№</th>
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
                    <th>Дата</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $i++ ?></td>
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
                        <td><?= htmlspecialchars($order['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Нет данных для отображения.</p>
        <?php endif; ?>
    </div>
</body>
</html>
