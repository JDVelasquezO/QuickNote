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
        
        <br><br>
        
    <div class="container">
        <div id="perfil" class="row">
            <div class="col s12 m6">
              <div class="card">
                <div class="card-image">
                  
                    <?php
                        $consulta = "SELECT * FROM usuarios WHERE id = '".$_SESSION['id']."' ";
                        $resultado = $conexion->query($consulta);

                        while ($fila = $resultado->fetch_assoc())
                        {
                            if ($fila['Foto'] != "")
                            {
                                echo "<img src='../../imagenes/" .$fila['Foto']. "' width:'300px' ";
                            }
                            else
                            {
                                echo '<img src="../../imagenes/default.jpg" width:"300px">';
                            }

                            $id = $fila['id'];

                        }
                    ?>
                <br><br><br><br>    
                <span class="card-title black-text"><?=$_SESSION['nombre']?></span>
                </div>
                <div class="card-content">
                    <p>
                        Que tal <?=$_SESSION['nombre']?>, estamos trabajando para que unos días puedas colocar
                        una pequeña descripción sobre ti, en este espacio... Espéralo
                    </p>
                </div>
                <div class="card-action">
                    <a href="perfil.php?id=<?=$id?>">Perfil</a>
                </div>
              </div>
            </div>
            
            <div class="col s12 m6">
                <ul class="collection">
                  <li class="collection-item cyan accent-4" style="color: #fff;">Notas:</li>
                
                <?php
                
                    $consulta = "SELECT * FROM notas WHERE id_usuario = '".$_SESSION['id']."' ";
                    $resultado = $conexion->query($consulta);
                    
                    $fila = $resultado->num_rows;
                    
                    if ($fila != NULL)
                    {
                        while ($registro = $resultado->fetch_assoc())
                        {
                ?>
                  
                  <li class="collection-item"><?=$registro['contenido']?><a href="mostrarPerfil.php?id=<?=$registro['id_nombre']?>" style="position: absolute; right:20px;" class="blue-text"> <?=$registro['nombre']?></a></li>
                  
                <?php
                        }
                
                    }
                
                ?>
              </ul>
            </div>
            
            <div class="fixed-action-btn toolbar">
                <a class="btn-floating btn-large red">
                  <i class="large material-icons">mode_edit</i>
                </a>
                <ul>
                  <li class="waves-effect waves-light"><a href="usuarios.php">Nuestra Comunidad</a></li>
                  <li class="waves-effect waves-light"><a href="blogs.php">Publicaciones</a></li>
                </ul>
            </div>
            
            <div class="col s12 m6">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Publicaciones</h4></li>
                    
                    <?php
                    
                        $consulta2 = "SELECT * FROM contenido WHERE id_usuario = '".$_SESSION['id']."' ";
                        $resultado2 = $conexion->query($consulta2);
                        
                        while ($fila2 = $resultado2->fetch_assoc())
                        {
                    
                    ?>
                    
                    <li class="collection-item"><div><?=$fila2['titulo']?><a href="mostrarBlog.php?id=<?=$fila2['id']?>" class="secondary-content"><i class="material-icons">remove_red_eye</i></a></div></li>
                    
                    <?php
                    
                        }
                    ?>
                    
                </ul>
            </div>
            
        </div>
        
    <a class="btn tooltipped cyan accent-4" data-position="bottom" data-delay="50" data-tooltip="Publica algo" href="form.php">
        <i class="large material-icons">chrome_reader_mode</i>
    </a>
    <a class="btn tooltipped cyan accent-4" data-position="bottom" data-delay="50" data-tooltip="Chat en línea" href="indexChat.php">
        <i class="large material-icons">chat_bubble</i>
    </a>
        
        <br><br><br><br>
    
    <form action="buscarPerfil.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">search</i>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input id="icon_prefix" type="text" class="validate" name="buscar" required>
                    <label for="icon_prefix">Busca perfil:</label>
                </div>
                
                <center>
                <div class="row">
                    <div class="col s12">
                      <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="enviar">Busqueda
                        <i class="material-icons right">search</i>
                      </button>
                    </div>
                </div>
                </center>
            </div>
    </form>
        
    <h5><a href="privacidad.php?id=<?=$_SESSION['id']?>">Privacidad</a></h5>
        
    </div>
                
        <?php include '../nav_footer/footer.html'; ?>
        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>
        
    </body>
</html>

<?php
        
    }

    $conexion->close();