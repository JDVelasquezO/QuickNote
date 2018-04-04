<?php

    require '../conexion.php';

    session_start();
    
    if (!isset($_SESSION['correo']))
    {
        header("location: ../blog/index.php");
    }
    
    $consulta = "SELECT * FROM contenido";
    $resultado = $conexion->query($consulta);
    while ($fila = $resultado->fetch_assoc())
    {
        $id = $fila['id'];
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
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
              <li><a href="form.php"><i style="font-size: 40px;" class="material-icons">arrow_back</i></a></li>
              <li><a href="../blog/cerrar.php"><i style="font-size: 40px;" class="material-icons">settings_power</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="../blog/cerrar.php"><i class="material-icons">settings_power</i>Log out</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    
    <br><br><br>
    
    <div class="container">
        <center>
        <h3>All Blogs:</h3><br>
        </center>

	<?php

		$consulta = "SELECT * FROM contenido ORDER BY fecha DESC";
		$resultado = $conexion->query($consulta);

		while ($fila = $resultado->fetch_assoc()) 
		{
			$id = $fila['id'];
			$titulo = $fila['titulo'];

	?>
        <center>
                <div id="listaBlogs">
                    <h4><a href="mostrarBlog.php?id=<?=$id?>"><?= $titulo . "<br>"?></a></h4>
                    <div class="chip">
                        <?=$fila['nombre']?>
                    </div>
                    <hr>
                </div>
        </center>

	<?php

		}

	?>
        
        <br><br><br>
        
        <form action="buscar.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">search</i>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input id="icon_prefix" type="text" class="validate" name="buscar" required>
                    <label for="icon_prefix">Search blog:</label>
                </div>
                
                <center>
                <div class="row">
                    <div class="col s12">
                      <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="enviar">Search
                        <i class="material-icons right">search</i>
                      </button>
                    </div>
                </div>
                </center>
            </div>
    </form>
    
        </div>
                
    <br><br><br><br><br><br>
    
        <?php include '../nav_footer/footer.html'; ?>
    
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>

</body>
</html>

<?php

    $conexion->close();

?>