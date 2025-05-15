<?php
require_once __DIR__ . '/../models/Order.php';


class OrderListController {

    public function index() {
        $order = new Order();
        $orders = $order->getAll();
        require_once __DIR__ . '/../views/order_list.php';
    }
}
?>
