<?php

    require '../conexion.php';

    session_start();
    
    if (!isset($_SESSION['correo']))
    {
        header("location: ../blog../index.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Show blog</title>
        <!--Links para cs-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../stylesheet.css">
        <!--Optimizacion en móbiles-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
</head>
<body class="blue-grey lighten-5">
    
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="privado.php" class="brand-logo"><i style="font-size: 70px;" class="material-icons">account_circle</i></a>
          <ul class="right hide-on-med-and-down">
              <li><a href="blogs.php"><i style="font-size: 40px;" class="material-icons">arrow_back</i></a></li>
              <li><a href="../blog/cerrar.php"><i style="font-size: 40px;" class="material-icons">settings_power</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="../blog/cerrar.php"><i class="material-icons">settings_power</i>Log out</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

<!--Script de compartir en fb-->    
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=148909985666373";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!----------------------------------------------------------------------------->

<?php

		$id = $_GET['id'];

		$consulta = "SELECT * FROM contenido WHERE id = '$id'";
		$resultado = $conexion->query($consulta);

		while ($fila = $resultado->fetch_assoc())
		{
			$id = $fila['id'];
			$id_usuario = $fila['id_usuario'];
			$nombre = $fila['nombre'];
			$titulo = $fila['titulo'];
			$contenido = $fila['comentario'];
			$imagen = $fila['imagen'];
                        
?>

<div class="container">
<div id="blogs">
<center>
<p class="flow-text">
    <h4>By: <a style='color: #00c853;' href='mostrarPerfil.php?id=<?=$id_usuario?>'> <?=$nombre?></a></h4>
    <h4><?=$titulo?></h4>
    <h5><?=$fila['fecha']?></h5>
    <br><br><br>
    <div style='width: 100%;'><h4><?='"'.$contenido.'"'?></div></h4><br><br>
</p>
<?php
			if ($imagen != "") 
			{
?>
                        <img class="materialboxed" data-caption="Foto subida por <?=$nombre?>" src='../../imagenes/<?=$imagen?>' width="50%" >
<?php
			}
             
?>
             
</center>
</div>
</div>

<?php

                        echo "<br><br><br>";
                        
?>
    
<!-------------------------------Comentarios--------------------------------------------->
<div class="container">
<div id="comentario">
<h4>Comments: </h4><br>
<?php
    $consulta2 = "SELECT * FROM comentario WHERE id_contenido = $id ORDER BY fecha DESC ";
    $resultado2 = $conexion->query("$consulta2");
    
    while ($fila2 = $resultado2->fetch_assoc())
    {
        echo "<p class='blue-text'>" . $fila2['fecha'] . "</p>" . " ";
?>
                                
<div class="chip">
<?=$fila2['nombre'] . " "?>
</div>
                        
<?php
    echo $fila2['comentario'] . "<br>";
    echo '<hr>';
    
    }
    
?>
</div>
</div>

<div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large blue">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a href="comentario.php?id=<?=$id?>" class="btn-floating green"><i class="material-icons">announcement</i></a></li>
      
<?php 

                        if ($_SESSION['id'] == $fila['id_usuario'])
                        {

?>
      
      <li><a href='actualizar.php?id=<?=$id?> & 
                                                titulo=<?=$titulo?> & 
						contenido=<?=$contenido?> & 
						imagen=<?=$imagen?>' class="btn-floating yellow darken-1"><i class="material-icons">mode_edit</i></a></li>
                                                
      <li><a href='borrarBlog.php?id=<?=$id?>' class="btn-floating red"><i class="material-icons">highlight_off</i></a></li>
      
<?php

                        }
                }

?>
      
    </ul>
</div>
			
<!--------------------------------------------------------------------------------->
                        
        <?php include '../nav_footer/footer.html'; ?>
                        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>

</body>
</html>

<?php $conexion->close(); ?>