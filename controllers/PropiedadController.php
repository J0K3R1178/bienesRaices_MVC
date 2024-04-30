<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{

    public function __construct()
    {

    }   // Here End Construct

    public static function index(Router $router)
    {
        // Get All Properties
        $propiedades = Propiedad::all();

        // Get All Sellers
        $vendedores = Vendedor::all();

        $resultado = $_GET["resultado"] ?? null;

        $router->render('propiedades/admin', 
        [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }   // Here End Function

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
             /** Crea una nueva instancia */
        $propiedad = new Propiedad($_POST['propiedad']);

        // Generar un nombre único
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']) 
            {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }   // Here End If
        
        // Validar
        $errores = $propiedad->validar();

            if(empty($errores)) 
            {
            
                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) 
                {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guarda en la base de datos
                $propiedad->guardar();
            }   // Here End If

        }   // Here End If

        $router->render('propiedades/crear',
        [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);

    }   // Here End Function

    public static function actualizar(Router $router)
    {
        $id = reedireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') 
    {

        // Asignar los atributos
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);

        // Validación
        $errores = $propiedad->validar();

        // Generar un nombre único
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        if($_FILES['propiedad']['tmp_name']['imagen']) 
        {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }   // Here End If
        
        if(empty($errores)) 
        {
            // Almacenar la imagen
            if($_FILES['propiedad']['tmp_name']['imagen']) 
            {
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }   // Here End If

            $propiedad->guardar();
        }   // Here End If
    }   // Here End If

        $router->render('/propiedades/actualizar',
        [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
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
            $propiedad = Propiedad::find($id);

            // peticiones validas
            if(validarTipoContenido($tipo) ) 
            {
                $propiedad->eliminar();
            }   // Here End If
        }   // Here End If
    }   // Here End Function

}   // Here End Class

?>