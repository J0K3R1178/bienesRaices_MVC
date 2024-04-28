<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

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

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();

        $router->render('propiedades/crear',
        [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores
        ]);
    }   // Here End Function

    public static function actualizar()
    {
        echo "Actualizar Controller";
    }   // Here End Function
}   // Here End Class

?>