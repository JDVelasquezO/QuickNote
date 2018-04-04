<?php

    session_start();
    
    if(!isset($_SESSION['correo']))
    {
	header("location: ../blog/index.php");
    }
    else
    {
        
        require '../conexion.php';
            
            $consulta = "SELECT * FROM usuarios WHERE id = '" . $_GET['id'] . "' ";
            $resultado = $conexion->query($consulta);
            
            while ($fila = $resultado->fetch_assoc())
            {
    
?>

<html>
    <head>
        <title>Perfil</title>
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
            <li><a href="../blog/cerrar.php"><i class="material-icons">settings_power</i>Cerrar Sesion</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
        </nav>
        
        <div class="container">
            <div id="formContacto3" class="row center">
                <div class="row">
                    <form method="post" action="insertarimg.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                        <input type="hidden" name="MAX_TAM" value="200000">
                        
                        <?php
        
                        if ($fila['Foto'] != "") 
                        {
                            echo "<img class='materialboxed' src='../../imagenes/" .$fila['Foto']. "' width='300px' style='margin:auto;'>";
                        }
                        else
                        {
                            echo '<img class="materialboxed" src="../../imagenes/default.jpg" width="300px" style="margin:auto;">';
                        }

                        ?>
                        
                        <div class="row">
                            <div class="input-field col s6">
                            <div class="file-field input-field">
                                <div class="btn cyan accent-4">
                                  <span>File</span>
                                  <input type="file" name="imagen">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            </div>
                            
                        <div class="input-field col s6">
                        <div class="file-field input-field">
                            <label>Escoge una imagen menor a 2 MB</label>
                        </div>
                        </div>
                        </div>
                        
                        <div>
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="action">Actualiza tu foto!
                                    <i class="material-icons right">autorenew</i>
                                </button>
                            </div>
                        </div> 
                        
                    </form>
                    
                    <br><br><br><br><br><br><br>
                    
                    <form action="editar.php" method="post">
                        <h3 class="blue-text">Tu información personal</h3>
                        <br><br><br>
                        <input type="hidden" name="id" value="<?= $fila['id'] ?>">
                        <div class="row">
                            <div class="input-field col s6">
                              <i class="material-icons prefix">account_circle</i>
                              <input id="icon_prefix" type="text" class="validate" name="nombre" required value="<?= $fila['Nombre'] ?>">
                              <label for="icon_prefix">Nombre</label>
                            </div>
                            <div class="input-field col s6">
                              <i class="material-icons prefix">account_circle</i>
                              <input id="icon_prefix" type="text" class="validate" name="apellido" required value="<?= $fila['Apellido'] ?>">
                              <label for="icon_prefix">Apellido</label>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="input-field col s6">
                              <i class="material-icons prefix">mail</i>
                              <input id="icon_prefix" type="email" class="validate" name="correo" value="<?= $fila['Correo'] ?>" readonly>
                              <label for="icon_prefix">Correo</label>
                            </div>
                            
                            <div class="input-field col s6">
                                <i class="material-icons prefix">phone</i>
                                <input id="icon_prefix" type="tel" class="validate" name="telefono" required value="<?= $fila['telefono'] ?>">
                                <label for="icon_prefix">Teléfono</label>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="input-field col s6">
                              <i class="material-icons prefix">business_center</i>
                              <input id="icon_prefix" type="text" class="validate" name="trabajo" required value="<?= $fila['Trabajo'] ?>">
                              <label for="icon_prefix">¿A qué te dedicas?</label>
                            </div>
                            
                            <div class="input-field col s6">
                                <i class="material-icons prefix">pets</i>
                                <input id="icon_prefix" type="text" class="validate" name="mascota" required value="<?= $fila['Mascota'] ?>">
                                <label for="icon_prefix">Nombre de tu primer mascota</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12">
                              <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="registrar">Actualiza
                                <i class="material-icons right">autorenew</i>
                              </button>
                            </div>
                        </div>
                        
                        <a href="privacidad.php?id=<?= $_SESSION['id'] ?>">Privacidad</a>
                        
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

    }

    $conexion->close();