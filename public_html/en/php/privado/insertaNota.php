<?php        
    
        session_start();
        if (!isset($_SESSION['correo']))
        {
            header("location: ../blog/index.php");
        }

        require '../conexion.php';
        
        $id = $_POST['id'];
        $asunto = $_POST['asunto'];
        $contenido = $_POST['contenido'];
        $nombre = $_POST['nombre'];
        $id_nombre = $_POST['id_nombre'];
        
        $consulta = "INSERT INTO notas (asunto, contenido, id_usuario, nombre, id_nombre) VALUES ('$asunto', '$contenido', '$id', '$nombre', '$id_nombre')";
        $resultado = $conexion->query($consulta);
        
        if ($consulta)
        {
            setcookie("asunto", $_POST['asunto'], time() + 86400);
            setcookie("contenido", $_POST['contenido'], time() + 86400);
            header("location: mostrarPerfil.php?id=$id");
        }
        else
        {
            echo 'No se pudo ejecutar';
        }
        
        $conexion->close();