<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController
{

    public function __construct()
    {

    }   // Here End Construct

    public static function index(Router $router)
    {
        // Get All Properties
        $vendedores = Vendedor::all();

        $resultado = $_GET["resultado"] ?? null;

        $router->render('vendedores/admin', 
        [
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }   // Here End Function

    public static function crear(Router $router)
    {
        $vendedor = new Vendedor;
        $errores = Vendedor::getErrores();

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
             /** Crea una nueva instancia */
        $vendedor = new Vendedor($_POST['vendedor']);
        
        // Validar
        $errores = $vendedor->validar();

            if(empty($errores)) 
            {
                // Guarda en la base de datos
                $vendedor->guardar();
            }   // Here End If

        }   // Here End If

        $router->render('vendedores/crear',
        [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);

    }   // Here End Function

    public static function actualizar(Router $router)
    {
        $id = reedireccionar('/admin');

        $vendedor = Vendedor::find($id);
        $errores = Vendedor::getErrores();

    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') 
    {

        // Asignar los atributos
        $args = $_POST['vendedor'];

        $vendedor->sincronizar($args);

        // Validación
        $errores = $vendedor->validar();
        
        if(empty($errores)) 
        {
            $vendedor->guardar();
        }   // Here End If
    }   // Here End If

        $router->render('/vendedores/actualizar',
        [
            'vendedor' => $vendedor,
            '$errores' => $errores
        ]); // Here End Render
    }   // Here End Function

    public static function eliminar(Router $router)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $tipo = $_POST['tipo'];
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $vendedor = Vendedor::find($id);

            // peticiones validas
            if(validarTipoContenido($tipo) ) 
            {
                $vendedor->eliminar();
            }   // Here End If
        }   // Here End If
    }   // Here End Function

}   // Here End Class

?>