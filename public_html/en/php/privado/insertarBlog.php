<?php
ob_start();
    require "../conexion.php";

                $id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$titulo = $_POST['titulo'];
		$contenido = $_POST['contenido'];
		$nombre_img = $_FILES['imagen']['name'];

		//Control de errores al subir imagen
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
			echo "Imagen subida correctamente <br>";

			if (isset($nombre_img))
			{
				$carpeta = "../../imagenes/";

				move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombre_img);

				echo "El archivo " . $nombre_img . " se ha copiado en el directorio <br>";
			}
			else
			{
				echo "No se pudo subir el archivo";
			}

		}

		$consulta = "INSERT INTO contenido (titulo, comentario, imagen, nombre, id_usuario) 
					 VALUES ('$titulo', '$contenido', '$nombre_img', '$nombre', '$id')";

		$resultado = $conexion->query($consulta);

		$conexion->close();

		if ($resultado)
		{
                 
			header("location: blogs.php");
		}
                else
                {
                    echo 'No se pudo';
                }
$conexion->close();
ob_end_flush();