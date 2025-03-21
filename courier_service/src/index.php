<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Курьерская служба</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            let name = document.forms["orderForm"]["client_name"].value.trim();
            let phone = document.forms["orderForm"]["phone"].value.trim();
            let city = document.forms["orderForm"]["city"].value.trim();
            let street = document.forms["orderForm"]["street"].value.trim();
            let house = document.forms["orderForm"]["house"].value.trim();
            let apartment = document.forms["orderForm"]["apartment"].value.trim();
            let price = document.forms["orderForm"]["price"].value.trim();

            if (!name || !phone || !city || !street || !house || !price) {
                alert("Все обязательные поля должны быть заполнены!");
                return false;
            }

            if (name.length > 100) {
                alert("Имя клиента слишком длинное (макс. 100 символов)!");
                return false;
            }

            if (city.length > 50) {
                alert("Город слишком длинный (макс. 50 символов)!");
                return false;
            }

            if (street.length > 100) {
                alert("Улица слишком длинная (макс. 100 символов)!");
                return false;
            }

            if (house.length > 10) {
                alert("Номер дома слишком длинный (макс. 10 символов)!");
                return false;
            }

            if (apartment.length > 10) {
                alert("Номер квартиры слишком длинный (макс. 10 символов)!");
                return false;
            }

            if (phone.length > 20) {
                alert("Телефон слишком длинный (макс. 20 символов)!");
                return false;
            }

            if (price.length > 10) {
                alert("Стоимость слишком большая (макс. 10 символов)!");
                return false;
            }

            let phonePattern = /^[0-9\-\+\s]+$/;
            if (!phonePattern.test(phone)) {
                alert("Введите корректный номер телефона!");
                return false;
            }

            let housePattern = /^[0-9]+[а-яА-Яa-zA-Z]?$/;
            if (!housePattern.test(house)) {
                alert("Введите корректный номер дома!");
                return false;
            }

            if (apartment && !/^[0-9]+$/.test(apartment)) {
                alert("Квартира должна быть числом!");
                return false;
            }

            return true;
        }
    </script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Оформить заказ</h2>
        <form name="orderForm" action="process.php" method="post" onsubmit="return validateForm();">
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
                <input type="number" name="price" required min="1" maxlength="10">
            </div>

            <button type="submit">Оформить</button>
        </form>
    </div>
</body>
</html>
