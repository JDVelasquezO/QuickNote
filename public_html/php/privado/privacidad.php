<?php

    session_start();
    if (!isset($_SESSION['correo']))
    {
        header("location: ../blog/index.php");
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Privacidad</title>
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
            <a id="logo-container" href="privado.php" class="brand-logo">QuickNote</a>
          <ul class="right hide-on-med-and-down">
              <li><a href="../blog/cerrar.php"><i style="font-size: 40px;" class="material-icons">settings_power</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Navbar Link</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
        </nav>
        
        <?php
        
            require '../conexion.php';
            $id = $_GET['id'];
            
        ?>
        <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>Eliminar cuenta</h4>
              <p>¿Estás seguro que deseas eliminar tucuenta?</p>
            </div>
            <div class="modal-footer">
              <a href="eliminarCuenta.php?id=<?=$id;?>" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
              <a href="privado.php" class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
            </div>
        </div>
        
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        <?php include '../nav_footer/footer.html'; ?>
        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>
        
    </body>
</html>

<?php $conexion->close(); ?>
