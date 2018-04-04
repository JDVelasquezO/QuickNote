<?php
    
    $conexion = new mysqli("localhost", "id2358965_localhost", "localhost", "id2358965_pruebas");
    
    if ($conexion->connect_errno) 
    {
        echo 'Error al conectar';
        exit();
    }
    
    $conexion->set_charset("utf8");