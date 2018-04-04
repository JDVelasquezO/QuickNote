<?php  
ob_start();
	require "../conexion.php";

	$id = $_POST['id'];
	$nombre_img = $_FILES['imagen']['name'];
	$titulo = $_POST['titulo'];
	$contenido = $_POST['contenido'];

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

					$consulta = "UPDATE contenido SET imagen = '$nombre_img' WHERE id = '$id'";

					$resultado = $conexion->query($consulta);

					$conexion->close();

					if ($resultado)
					{
						header("location: mostrarBlog.php?id=$id");
					}
				}
				else
				{
					echo "No se pudo actualizar";			
				}

			}

                        $conexion->close();
ob_end_flush();