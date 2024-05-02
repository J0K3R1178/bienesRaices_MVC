<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

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
            $respuestas = $_POST['contacto'];

            // Instant of PHPMAILER
            $mail = new PHPMailer();

            // Config SMTP
            $mail->isSMTP();
            $mail->Host ='sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'a70bfa20bba5e0';
            $mail->Password = 'f08e203867eef1';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Config Mail
            $mail->setFrom('admin@example.com');
            $mail->addAddress('admin@example.com', 'BienesRaices.com');
            $mail->Subject = 'Contacto desde BienesRaices.com';

            // Create HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Define Content
            $contenido = "<html>"; 
            $contenido .= " <p>Tienes un Nuevo Mensaje</p></html>";
            $contenido .= "<p>Nombre " . $respuestas['nombre'] . "</p></html>";
            $contenido .= "<p>Email: " . $respuestas['email'] . "</p></html>";
            $contenido .= "<p>Telefono: " . $respuestas['telefono'] . "</p></html>";
            $contenido .= "<p>Mensaje: " . $respuestas['mensaje'] . "</p></html>";
            $contenido .= "<p>Vende o Compra: " . $respuestas['tipo'] . "</p></html>";
            $contenido .= "<p>Prefires ser Contactado por: " . $respuestas['contacto'] . "</p></html>";
            $contenido .= "<p>Precio o Presupuesto: $ " . $respuestas['precio'] . "</p></html>";
            $contenido .= "<p>Fecha: " . $respuestas['fecha'] . "</p></html>";
            $contenido .= "<p>Hora: " . $respuestas['hora'] . "</p></html>";
            $contenido .= "</html>";

            $mail->Body = $contenido;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($mail->send())
            {
                echo "Mensaje Enviado";
            }      // Here End If
            else
            {
                echo "Mensaje No Enviado";
                echo $mail->ErrorInfo;
            }

        }   // Here End Function
        $router->render('paginas/contacto',[]);
    }   // Here End Function


} // Here End Class
    ?>