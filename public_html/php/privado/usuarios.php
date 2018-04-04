<?php

    include '../conexion.php';
    
    session_start();
    
    if (!isset($_SESSION['correo']))
    {
        header("location: ../blog/index.php");
    }
    else
    {
        
?>

<html>
    <head>
        <title><?=$_SESSION['nombre']?></title>
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
            <li><a href="../blog/cerrar.php"><i class="material-icons">settings_power</i>Cerrar Sesion</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
        </nav>
        
        <br><br><br>
        
        <div class="container">
        <ul class="collection">
                
<?php

            require '../conexion.php';
            
            $consulta = "SELECT * FROM usuarios";
            $resultado = $conexion->query($consulta);
            
            while ($fila = $resultado->fetch_assoc())
            { 

?>
            <li class="collection-item avatar">
                
<?php

            if ($fila['Foto'] != "")
            {

?>
                
                <img src="../../imagenes/<?=$fila['Foto']?>" alt="" class="circle">
                
<?php

            }
            else
            {
                echo '<img src="../../imagenes/default.jpg" alt="" class="circle">';
            }

?>
                    <span class="title"><?=$fila['Nombre']?></span>
                    <p><?=$fila['Trabajo']?><br>
                       <?=$fila['telefono']?>
                    </p>
                    <a href="mostrarPerfil.php?id=<?=$fila['id']?>" class="secondary-content"><i class="material-icons">exit_to_app</i></a>
            </li>
              
<?php

            }

?>
              
            
        </ul>
        </div>
        
        <br><br><br><br><br><br><br><br><br>
        
        <?php include '../nav_footer/footer.html'; ?>
        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>
        
    </body>
</html>

<?php
        
    }

    $conexion->close();