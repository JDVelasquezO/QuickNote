<?php 

        session_start();
        if (!isset($_SESSION['correo']))
        {
            header("location: ../blog/index.php");
        }

	require "../conexion.php"; 

	$consulta = "SELECT * FROM chat ORDER BY id DESC ";
	$resultado = $conexion->query($consulta);

	while ($fila = $resultado->fetch_assoc()):

?>

	<div id="datosChat">
		<span style="color: #1c62c4;"><?= $fila['nombre']; ?></span>
		<span style="color: #848484;"><?= $fila['mensaje']; ?></span>
		<span style="float: right;"><?= $fila['fecha']; ?></span>
	</div>

	<?php  

	endwhile;

?>