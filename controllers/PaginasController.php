<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasController
{

    public function __construct()
    {

    }   // Here End Construct

    public static function index(Router $router)
    {
        // Get All Properties
        $propiedades = Propiedad::get(3);

        $inicio = true;

        $router->render('paginas/index', 
        [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }   // Here End Function
} // Here End Class
    ?>