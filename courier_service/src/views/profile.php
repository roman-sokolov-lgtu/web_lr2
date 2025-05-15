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

            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="/user/list" class="back-button">Пользователи</a>
                <a href="/order/listAll" class="back-button">Доставки</a>
                <a href="/report/form" class="back-button">Отчет</a>
            <?php endif; ?>

            <?php if ($_SESSION['role'] !== 'admin'): ?>
                <a href="/order/index" class="back-button">Оформить доставку</a>
                <a href="/order/history" class="back-button">История</a>
            <?php endif; ?>
           
            
        </div>
        <a href="/user/logout" class="exit-button">Выйти</a>
    </div>
</body>
</html>
