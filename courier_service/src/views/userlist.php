<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список пользователей</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <div class="header-row">
        <a href="/user/profile" class="back-button">←</a>
        <h2>Пользователи</h2>
    </div>
    <?php if (count($users) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Логин</th>
                <th>Роль</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Пользователей не найдено.</p>
    <?php endif; ?>
</div>
</body>
</html>
