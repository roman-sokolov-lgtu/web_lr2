<?php
require_once __DIR__ . '/../src/core/Router.php';

$router = new Router();
$router->route($_SERVER['REQUEST_URI']);
?>
