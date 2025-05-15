<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отчёт</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">

        <div class="header-row">
            <a href="/user/profile" class="back-button">←</a>
            <h2>Отчёт по клиентам</h2>
            <a href="/report/download" class="profile-button">💾</a>
            
        </div>
    

    <?php if (empty($results)): ?>
        <p>Нет данных за выбранный период.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>№</th>
                    <th>Имя пользователя</th>
                    <th>Потрачено</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $index => $row): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($row['username']) ?></td>
                        <td><?= htmlspecialchars($row['total']) ?>р</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p>
            Всего клиентов в базе: <?= $totalClients ?>
        </p>
    <?php endif; ?>

</div>
</body>
</html>
