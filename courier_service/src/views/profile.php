<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
        <h2>Личный кабинет</h2>
        <p>Добро пожаловать, <?= htmlspecialchars($_SESSION['username']) ?></p>
        <p>Роль: <?= htmlspecialchars($_SESSION['role']) ?></p>
        <div class="header-row">
            <a href="/order/index" class="back-button">Заказ</a>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="/user/list" class="back-button">Пользователи</a>
            <?php endif; ?>
           
            <a href="/user/logout" class="exit-button">Выйти</a>
        </div>
    </div>
</body>
</html>
