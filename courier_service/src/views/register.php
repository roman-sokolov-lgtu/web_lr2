<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
        <h2>Регистрация</h2>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post" action="/user/register">
            <input type="text" name="username" placeholder="Логин" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit"class="register-button">Зарегистрироваться</button>
        </form>
        <a href="/user/login"class="full-width-button">Войти</a>
    </div>
</body>
</html>
