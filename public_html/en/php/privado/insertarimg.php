<?php
    
    session_start();
    
    if(!isset($_SESSION['correo']))
    {
	header("location: ../blog/index.php");
    }

    require '../conexion.php';
    
    $id = $_POST['id'];
    $nombreImg = $_FILES['imagen']['name'];
    $tipoImg = $_FILES['imagen']['type'];
    $tamImg = $_FILES['imagen']['size'];
    $carpTemp = $_FILES['imagen']['tmp_name'];
    
    if ($_FILES['imagen']['error'] == 1)
    {
	echo "La imagen es demasiado grande";
    }
    else if($_FILES['imagen']['error'] == 2)
    {
	echo "La imagene debe ser menor a 2MB";
    }
    else if($_FILES['imagen']['error'] == 3)
    {
	echo "Error al subir archivo";
    }
    else if($_FILES['imagen']['error'] == 4)
    {
	echo "No subió ninguna imagen";
    }
    else if($_FILES['imagen']['error'] == 0)
    {   
        if (isset($nombreImg))
        {
            $carpeta = "../../imagenes/";
            move_uploaded_file($carpTemp, $carpeta . $nombreImg);
            
            $consulta = "UPDATE usuarios SET Foto = '$nombreImg' WHERE id = '$id' ";
            $resultado = $conexion->query($consulta);
            $conexion->close();

            if ($resultado)
            {
                header("location: perfil.php?id=$id");
            }
        }
        else
        {
            echo 'No se pudo subir el archivo';
        }
    }

    $conexion->close();