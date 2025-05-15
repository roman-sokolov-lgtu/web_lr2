<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
        <h2>Вход</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post" action="/user/login">
            <input type="text" name="username" placeholder="Логин" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit" class="login-button">Войти</button>
        </form>
        <a href="/user/register" class="full-width-button">Регистрация</a>
    </div>
</body>
</html>
