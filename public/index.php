<?php
    declare(strict_types=1);
    namespace public;
    
    require_once __DIR__ . '/../vendor/autoload.php';
    use app\controllers\VehicleController;
    
    function request(): void {
        // Se obtiene el método (GET o POST) utilizado en la request
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        
        // Si es una petición GET pero NO viene ningún ID, se mostrará index.html
        if ($method === 'GET' && empty($_GET['id'])) {
            require_once __DIR__ . '/index.html';
            return;
        }
        
        $controller = new VehicleController();
        
        // Si recibe una petición GET, llamará al método getById() del controlador
        // Si recibe una petición POST, llamará al método store() del controlador
        switch (true) {
            case $method === "GET":
                $id = $_GET['id'] ?? '';
                $controller->getById($id);
                break;
            case $method === "POST":
                $vehiculoData = $_POST['jsonPost'] ?? '';
                $controller->store($vehiculoData);
        }
    }
    
    request();
?>