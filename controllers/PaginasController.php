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

    public static function anuncios(Router $router)
    {
          // Get All Properties
            $propiedades = Propiedad::all();

            $router->render('paginas/anuncios', 
            [
                'propiedades' => $propiedades
            ]);
    }   // Here End Function
    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros',['']);
    }   // Here End Function

    public static function anuncio(Router $router)
    {
        $id = reedireccionar('/');
          // Get All Properties
            $propiedad = Propiedad::find($id);

            $router->render('paginas/anuncio', 
            [
                'propiedad' => $propiedad
            ]);
    }   // Here End Function

    public static function blog(Router $router)
    {
        $router->render('paginas/blog',['']);
    }   // Here End Function

    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada',['']);
    }   // Here End Function

    public static function contacto(Router $router)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            debuguear($_POST);
        }   // Here End Function
        $router->render('paginas/contacto',[]);
    }   // Here End Function


} // Here End Class
    ?>