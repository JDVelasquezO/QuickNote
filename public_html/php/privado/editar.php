<?php
ob_start();
    session_start();
    
    if(!isset($_SESSION['correo']))
    {
	header("location: ../blog/index.php");
    }
    
    include '../conexion.php';
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $trabajo = $_POST['trabajo'];
    $mascota = $_POST['mascota'];
    
    $consulta = "UPDATE usuarios SET Nombre = '$nombre', Apellido = '$apellido', telefono = '$telefono', Trabajo = '$trabajo', Mascota = '$mascota' WHERE id = '$id' ";
    $resultado = $conexion->query($consulta);
    
    if ($resultado) 
    {
        $_SESSION['nombre'] = $nombre;
        header("location: perfil.php?id=$id");
    }
    else
    {
        echo 'No se pudo actualizar';
    }

    $conexion->close();
ob_end_flush();