<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Курьерская служба</title>
    <link rel="stylesheet" href="/style.css">
    <script src="/validate.js"></script>
</head>
<body>
    <div class="container">
        <div class="header-row">
            <h2>Оформить заказ</h2>
            <a href="/user/profile" class="profile-button">👤</a>
        </div>
        
        <form name="orderForm" action="/order/create" method="post" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="delivery_type">Тип доставки:</label>
                <select name="delivery_type" required>
                    <option value="Стандарт">Стандарт</option>
                    <option value="Экспресс">Экспресс</option>
                </select>
            </div>

            <div class="form-group">
                <label for="client_name">Имя клиента:</label>
                <input type="text" name="client_name" required maxlength="100">
            </div>

            <div class="form-group">
                <label for="driver">Водитель:</label>
                <select name="driver" required>
                    <option value="Иванов">Иванов</option>
                    <option value="Петров">Петров</option>
                    <option value="Сидоров">Сидоров</option>
                </select>
            </div>

            <div class="form-group address">
                <div>
                    <label for="city">Город:</label>
                    <input type="text" name="city" required maxlength="50">
                </div>
                <div>
                    <label for="street">Улица:</label>
                    <input type="text" name="street" required maxlength="100">
                </div>
                <div>
                    <label for="house">Дом:</label>
                    <input type="text" name="house" required maxlength="10">
                </div>
                <div>
                    <label for="apartment">Квартира:</label>
                    <input type="text" name="apartment" required maxlength="10">
                </div>
            </div>

            <div class="form-group">
                <label for="phone">Телефон:</label>
                <input type="text" name="phone" required maxlength="20">
            </div>

            <div class="form-group">
                <label for="price">Стоимость:</label>
                <input type="number" name="price" required min="1">
            </div>

            <button type="submit">Оформить</button>
        </form>
    </div>
</body>
</html>
