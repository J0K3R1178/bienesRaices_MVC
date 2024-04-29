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

// Get Routes
$router->get('/', 'funcion_index');
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);


//  Post Routes
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);

$router->comprobarRutas();

?>
