<?php

// USES
use MVC\Router;
use Controllers\PropiedadController;

//  APP
require_once __DIR__ . "/../includes/app.php";
// Autoload
require_once __DIR__ . '/../vendor/autoload.php';

// Instance variables
$router = new Router();

$router->get('/', 'funcion_index');
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);


$router->comprobarRutas();

?>
