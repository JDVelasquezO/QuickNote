<?php

    session_start();
    if (!isset($_SESSION['correo']))
    {
        header("location: ../blog/index.php");
    }
    
    require '../conexion.php';

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
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
              <li><a href="privado.php"><i style="font-size: 40px;" class="material-icons">arrow_back</i></a></li>
              <li><a href="../blog/cerrar.php"><i style="font-size: 40px;" class="material-icons">settings_power</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="../blog/cerrar.php"><i class="material-icons">settings_power</i>Log out</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
        </nav>
        
        <br><br>
        
        <?php
            
            $id = $_GET['id'];
            
            $consulta = "SELECT * FROM usuarios WHERE id = '".$id."' ";
            $resultado = $conexion->query($consulta);
            
            $consulta2 = "SELECT * FROM contenido WHERE id_usuario = '".$id."' ";
            $resultado2 = $conexion->query($consulta2);
            
            $consulta3 = "SELECT * FROM notas WHERE id_usuario = '".$id."' ";
            $resultado3 = $conexion->query($consulta3);
            
            while ($fila = $resultado->fetch_assoc())
            {
        ?>
        
    <center>
        <div style="width: 50%;" class="card">
            <div class="card-image waves-effect waves-block waves-light">
                
                <?php
                    if ($fila['Foto'] != "") 
                    {
                        echo "<img class='activator' src='../../../imagenes/" .$fila['Foto']. "' width='300px' style='border: solid 1px;' >";
                    }
                    else
                    {
                        echo '<img class="activator" src="../../../imagenes/default.jpg" width="300px" style="border: solid 1px;">';
                    }
                ?>
                
            </div>
            <div class="card-content">
                <span class="card-title activator" style="color: #00b8d4;"><?=$fila['Nombre']?><i class="material-icons right">more_vert</i></span>
                <p><a href='nota.php?id=<?=$fila["id"]?>' class="orange-text">Write note</a></p>
            </div>
            <div class="card-reveal">
            <div id="margen">
              <span class="card-title" style="color: #00b8d4;"><?=$fila['Nombre']?><i class="material-icons right">close</i></span>
              <br><br>
              <h5><i class="material-icons">accessibility</i>&nbsp;<?=$fila['Apellido']?></h5>
              <h5><i class="material-icons">mail</i>&nbsp;<?=$fila['Correo']?></h5>
              <h5><i class="material-icons">pets</i>&nbsp;<?=$fila['Mascota']?></h5>
              <h5><i class="material-icons">phone</i>&nbsp;<?=$fila['telefono']?></h5>
              <h5><i class="material-icons">business_center</i>&nbsp;<?=$fila['Trabajo']?></h5>
              <h5><i class="material-icons">cake</i>&nbsp;<?=$fila['fecha_nac']?></h5>
            </div>
            </div>
        </div>
        
        <?php
            
            }
            
        ?>
        
        <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Publications</a>
        <ul id='dropdown1' class='dropdown-content'>
        <?php
        
            $fila2 = $resultado2->num_rows;
            
            if ($fila2 == "NULL")
            {
                
        ?>
            
            <li><a>Without publications</a></li>
            
        <?php
                
            }
            else
            {
            while ($fila2 = $resultado2->fetch_assoc())
            {
                $titulo = $fila2['titulo'];
                $id = $fila2['id'];
                
        ?>
            
            <li><a href="mostrarBlog.php?id=<?=$id?>"><?=$titulo?></a></li>
            
        <?php
                
            }
            }
            
        ?>
            
        </ul>
        
        <br><br><br><br><br><br><br>
        
        <div id="notas" class="container">
        <h4>Notes</h4>
    
    <?php
            
            while ($fila3 = $resultado3->fetch_assoc())
            {
                if (isset($_COOKIE['asunto']) && isset($_COOKIE['contenido']) )
                {
                    
    ?>
        
                        <div class="row" style="width: 50%;">
                            <div class="col s12">
                              <div class="card blue-grey darken-1">
                                <div class="card-content white-text">
                                  <span class="card-title"><?=$fila3['asunto']?> </span>
                                  <p>
                                      <?=$fila3['contenido']?>
                                  </p>
                                </div>
                                <div class="card-action">
                                    <p class="white-text">Att</p><a><?=$fila3['nombre']?> </a>
                                </div>
                              </div>
                            </div>
                        </div>
        
    <?php
                    
                }
            }
                
    ?>
        
                    
                    </div>
        </center>
        
        <?php include '../nav_footer/footer.html'; ?>
                        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>
        
    </body>
</html>

<?php $conexion->close(); ?>