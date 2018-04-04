<?php  

	include '../conexion.php';
        
        session_start();
    
        if (!isset($_SESSION['correo']))
        {
            header("location: ../blog/index.php");
        }

	$id = $_GET['id'];
        
?>

<html>
    <head>
        <title>Delete blog</title>
        <!--Links para cs-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../stylesheet.css">
        <!--Optimizacion en móbiles-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
    </head>
    <body>
        
        
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="../../index.html" class="brand-logo">QuickNote</a>
          <ul class="right hide-on-med-and-down">
              <li><a href="form.php"><i style="font-size: 40px;" class="material-icons">arrow_back</i></a></li>
              <li><a href="../blog/cerrar.php"><i style="font-size: 40px;" class="material-icons">settings_power</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Navbar Link</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

        <div id="modal1" class="modal">
          <div class="modal-content">
              <h4 style="color: #00b0ff;">Blog successfully deleted</h4>
            <p>Your blog has been deleted, no one can see it now</p>
          </div>
          <div class="modal-footer">
            <a style="color: #00b0ff;" href="form.php" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
          </div>
        </div>
        
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        <?php
        
                $consulta = "DELETE FROM contenido WHERE id = '$id' ";
                $resultado = $conexion->query($consulta);
        
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