<?php

namespace Controllers;

use MVC\Router;

class PropiedadController
{

    public function __construct()
    {

    }   // Here End Construct

    public static function index(Router $router)
    {
        $router->render('propiedades/admin');
    }   // Here End Function

    public static function crear()
    {
        echo "CREAR Controller";
    }   // Here End Function

    public static function actualizar()
    {
        echo "Actualizar Controller";
    }   // Here End Function
}   // Here End Class

?>