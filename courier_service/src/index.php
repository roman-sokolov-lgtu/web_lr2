<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Курьерская служба</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function validateForm() {
        const form = document.forms["orderForm"];
        const name = form["client_name"].value.trim();
        const phone = form["phone"].value.trim();
        const city = form["city"].value.trim();
        const street = form["street"].value.trim();
        const house = form["house"].value.trim();
        const apartment = form["apartment"].value.trim();
        const price = form["price"].value.trim();
        const driver = form["driver"].value.trim();
        const deliveryType = form["delivery_type"].value.trim();

        const validDrivers = ["Иванов", "Петров", "Сидоров"];
        const validDeliveryTypes = ["Стандарт", "Экспресс"];

        if (!name || !phone || !city || !street || !house || !price || !driver || !deliveryType) {
            alert("Все обязательные поля должны быть заполнены!");
            return false;
        }

        if (!validDrivers.includes(driver)) {
            alert("Выбран недопустимый водитель!");
            return false;
        }

        if (!validDeliveryTypes.includes(deliveryType)) {
            alert("Выбран недопустимый тип доставки!");
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

        const phonePattern = /^[0-9\-\+\s]+$/;
        if (!phonePattern.test(phone)) {
            alert("Введите корректный номер телефона!");
            return false;
        }

        const housePattern = /^[0-9]+[а-яА-Яa-zA-Z]?$/;
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
    function setInputFilters() {
        const phoneInput = document.querySelector('input[name="phone"]');
        const houseInput = document.querySelector('input[name="house"]');
        const apartmentInput = document.querySelector('input[name="apartment"]');
        const priceInput = document.querySelector('input[name="price"]');

        if (phoneInput) {
            phoneInput.addEventListener("input", () => {
                phoneInput.value = phoneInput.value.replace(/[^0-9+\-\s]/g, '');
            });
        }

        if (houseInput) {
            houseInput.addEventListener("input", () => {
                houseInput.value = houseInput.value.replace(/[^0-9а-яА-Яa-zA-Z]/g, '');
            });
        }

        if (apartmentInput) {
            apartmentInput.addEventListener("input", () => {
                apartmentInput.value = apartmentInput.value.replace(/[^0-9]/g, '');
            });
        }

        if (priceInput) {
            priceInput.addEventListener("input", () => {
                priceInput.value = priceInput.value.replace(/[^0-9]/g, '');
            });
        }
    }
    window.addEventListener('DOMContentLoaded', setInputFilters);
    </script>
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
                <input type="number" name="price" required min="1">
            </div>

            <button type="submit">Оформить</button>
            <a href="orderlist.php">
                <button type="button">Посмотреть все заказы</button>
            </a>
        </form>
    </div>
</body>
</html>
