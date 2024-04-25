<?php 

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'J0K3R1178', 'bienesraices_udemy');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
    
}