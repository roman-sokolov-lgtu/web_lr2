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

        if (isNaN(parseFloat(price)) || !isFinite(price)) {
        alert("Введите корректную стоимость!");
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