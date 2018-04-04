<?php

    require '../conexion.php';

    session_start();
    
    if (!isset($_SESSION['correo']))
    {
        header("location: index.php");
    }

?>

<html>
<head>
	<title>Actualizar</title>
        <title>Mostrar</title>
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
          <a id="logo-container" href="../../index.html" class="brand-logo">QuickNote</a>
          <ul class="right hide-on-med-and-down">
              <li><a href="form.php"><i style="font-size: 40px;" class="material-icons">arrow_back</i></a></li>
              <li><a href="../blog/cerrar.php"><i style="font-size: 40px;" class="material-icons">settings_power</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="../blog/cerrar.php"><i class="material-icons">settings_power</i>Cerrar Sesion</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

	<?php

		$id = $_GET['id'];
		$titulo = $_GET['titulo'];
		$contenido = $_GET['contenido'];

		$consulta = "SELECT * FROM contenido WHERE id = '$id' ";
		$resultado = $conexion->query($consulta);

		while ($fila = $resultado->fetch_assoc()) 
		{
			
	?>

    <div class="container">
        <div id="formContacto3" class="row center">
            <div class="row">
		<form action="editarBlog.php" method="post">
                    <input type="hidden" name="id" value="<?= $fila['id']?>">
                    <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">font_download</i>
                          <input id="icon_prefix" type="text" class="validate" name="titulo" required value="<?= $fila['titulo']?>">
                          <label for="icon_prefix">Título</label>
                        </div>
                        
                        <div class="input-field col s6">
                          <i class="material-icons prefix">message</i>
                          <textarea id="icon_prefix2" class="materialize-textarea" data-length="120" name="contenido" required><?= $fila['comentario'] ?></textarea>
                          <label for="icon_prefix2">Deja tu comentario aquí</label>
                        </div>
                    </div>
                    
                    <div class="row">
                            <div class="col s12">
                              <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="enviar">Actualizar
                                <i class="material-icons right">send</i>
                              </button>
                            </div>
                    </div>
		</form>
            </div>
        </div>
        
        <div id="formContacto3" class="row center">
            <div class="row">
		<form action="editarImg.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $fila['id']?>">
		    <input type="hidden" name="titulo" value="<?= $fila['titulo']?>">
	            <input type="hidden" name="contenido" value="<?= $fila['comentario']?>">
                    
                    <?php  
			echo "<img class='materialboxed' src='../../imagenes/" .$fila['imagen']. "' width='300px' >";
		    ?>
                    
                    <div class="input-field col s6">
                        <div class="file-field input-field">
                            <div class="btn cyan accent-4">
                              <span>File</span>
                              <input type="file" name="imagen">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                            
                            <div class="col s12">
                              <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="enviar">Actualizar
                                <i class="material-icons right">send</i>
                              </button>
                            </div>
                            
                        </div>
                    </div>
                    
		</form>
            </div>
        </div>
    </div>

	<?php

		}

	?>

        <?php include '../nav_footer/footer.html'; ?>
        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>

</body>
</html>

<?php

    $conexion->close();

?>