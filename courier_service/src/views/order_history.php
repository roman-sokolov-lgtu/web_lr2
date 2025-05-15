<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>История доставок</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
        <div class="header-row">
            <a href="/user/profile" class="back-button">←</a>
            <h2>Ваша история доставок</h2>
        </div>
        

        <?php if (empty($userOrders)): ?>
            <p>У вас пока нет заказов.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>№</th>
                    <th>Тип</th>
                    <th>Город</th>
                    <th>Улица</th>
                    <th>Цена</th>
                    <th>Дата</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($userOrders as $order): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($order['delivery_type']) ?></td>
                        <td><?= htmlspecialchars($order['city']) ?></td>
                        <td><?= htmlspecialchars($order['street']) ?></td>
                        <td><?= htmlspecialchars($order['price']) ?></td>
                        <td><?= htmlspecialchars($order['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        
    </div>
</body>
</html>
