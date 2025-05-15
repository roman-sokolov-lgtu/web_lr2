<?php
require_once __DIR__ . '/../models/Order.php';

class OrderController {
    
    public function index() {
        require_once __DIR__ . '/../views/order_form.php';
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $order = new Order();
            $order->create($_POST);
        }
        header('Location: /success');
        exit;
    }

    public function success() {
        require_once __DIR__ . '/../views/success.php';

    }
}
