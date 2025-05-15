<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отчёт</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <h2>Сформировать отчёт</h2>
    <form action="/report/generate" method="post">
        <label>С:</label>
        <input type="date" name="from_date" required>
        <label>По:</label>
        <input type="date" name="to_date" required>
        <button type="submit">Сгенерировать</button>
    </form>
</div>
</body>
</html>
