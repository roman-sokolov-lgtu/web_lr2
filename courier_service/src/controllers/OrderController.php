<?php
session_start();
require_once __DIR__ . '/../models/Order.php';

class OrderController {
    
    public function index() {
        require_once __DIR__ . '/../views/order_form.php';
    }
    
    public function listAll() {
        $order = new Order();
        $orders = $order->getAll();
        require_once __DIR__ . '/../views/order_list.php';
    }


    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
            $order = new Order();
            $order->create($_POST, $_SESSION['user_id']);
        }
        header('Location: /order/success');
        exit;
    }

    public function success() {
        require_once __DIR__ . '/../views/success.php';

    }
    
    public function history() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $order = new Order();
        $userOrders = $order->getByUserId($_SESSION['user_id']);

        require_once __DIR__ . '/../views/order_history.php';
    }

}
