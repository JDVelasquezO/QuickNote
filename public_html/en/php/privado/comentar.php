<?php  

	require "../conexion.php";

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$comentario = $_POST['comentario'];

	$consulta = "INSERT INTO comentario(nombre, comentario, id_contenido) 
				 VALUES('$nombre', '$comentario', '$id') ";
	$resultado = $conexion->query($consulta);

	if ($resultado)
	{
		header("location: mostrarBlog.php?id=$id");
	}
	else
	{
		echo "No se pudo ejecutar";
	}
        
        $conexion->close();

?>
