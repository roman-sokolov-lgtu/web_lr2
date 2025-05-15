<?php
class Router {
    public function route($url) {
        $url = trim($url, '/');
        if (empty($url)) {
            $controllerName = 'OrderController';
            $methodName = 'index';
        } else {
            $urlParts = explode('/', $url);
            
            $controllerName = ucfirst($urlParts[0]) . 'Controller';
            
            $methodName = isset($urlParts[1]) ? $urlParts[1] : 'index';
        }

        $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();
            
            if (method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                echo "Метод $methodName не найден!";
            }
        } else {
            echo "Контроллер $controllerName не найден!";
        }
    }
}
?>
