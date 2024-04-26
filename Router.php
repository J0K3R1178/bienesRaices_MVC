<?php

namespace MVC;

class Router
{
    public $rutas_get = [];
    public $rutas_post = [];

    public function __construct()
    {
        
    }   // Here End Construct

    public function comprobarRutas()
    {
        $url_actual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo == 'GET')
        {
            $funcion = $this->rutas_get[$url_actual] ?? null;
        }   // Here End If

        if($funcion)
        {
            // Call a Function That is Unknown Until Execution Time
            call_user_func( $funcion, $this);
        }   // Here End If
        else
        {
            echo "Pagina No Encontrada";
        }   // Here End Else

    }   // Here End Function

    public function get($url, $funcion)
    {
        $this->rutas_get[$url] = $funcion;
    }   // Here End Function

}   // Here End Class


?>