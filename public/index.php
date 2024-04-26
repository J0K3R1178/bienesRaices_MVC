<?php

// USES
use MVC\Router;
use Controllers\PropiedadController;

//  APP
require_once __DIR__ . "/../includes/app.php";

// Header
incluirTemplate('header');

// Instance variables
$router = new Router();

$router->get('/', 'funcion_index');
$router->get('/admin/', 'funcion_admin');
$router->get('/propiedades/crear', 'funcion_propiedades_crear');
$router->get('/propiedades/actualizar', 'funcion_propiedades_actualizar');
$router->get('/propiedades/crear', 'funcion_propiedades_crear');



$router->comprobarRutas();

?>



<?php

incluirTemplate('footer');
?>