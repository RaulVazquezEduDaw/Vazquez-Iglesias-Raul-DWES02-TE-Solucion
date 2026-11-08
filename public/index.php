<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
use app\controllers\VehicleController;

function request(): void {
    // Se obtiene el método (GET o POST) utilizado en la request
    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
    
    $controller = new VehicleController();
    
    // Si recibe una petición GET, llamará al método getById() del controlador
    // Si recibe una petición POST, llamará al método store() del controlador
    switch (true) {
        case $method === "GET":
            $id = $_GET['id'] ?? '';
            $controller->getById($id);
            break;
        case $method === "POST";
            $vehiculoData = $_POST['jsonPost'] ?? '';
            $controller->store($vehiculoData);
    }
}

request();
