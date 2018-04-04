<?php  
			require "../conexion.php";

			$id = $_POST['id'];
			$titulo = $_POST['titulo'];
			$contenido = $_POST['contenido'];

			$consulta = "UPDATE contenido SET titulo = '$titulo', comentario = '$contenido' 
						 WHERE id = '$id'";

			$resultado = $conexion->query($consulta);

			$conexion->close();

			if ($resultado)
			{
				header("location: mostrarBlog.php?id=$id");
			}
			else
			{
				echo "No se pudo actualizar";			
			}

$conexion->close();