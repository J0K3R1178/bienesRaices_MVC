<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PropiedadController
{

    public function __construct()
    {

    }   // Here End Construct

    public static function index(Router $router)
    {
        // Get All Properties
        $propiedades = Propiedad::all();

        $resultado = null;

        $router->render('propiedades/admin', 
        [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
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