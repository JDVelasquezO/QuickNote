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

<html>
    <head>
        <title>Posting</title>
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
        
        <br><br><br>
        
        <div class="container">
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
            
            <a class="btn tooltipped cyan accent-4" data-position="bottom" data-delay="50" data-tooltip="View blogs" href="blogs.php">
                <i class="large material-icons">credit_card</i>
            </a>
            </center>
            </div>
        </form>
            
        <div id="formContacto3" class="row center">
            <div class="row">
                <form method="post" action="insertarBlog.php" enctype="multipart/form-data">
                        <input type="hidden" name="nombre" value="<?=$_SESSION['nombre']?>">
                        <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
                        
                        <h3 class="blue-text">Post a blog</h3>
                        <br><br>
                        <div class="row">
                            <div class="input-field col s6">
                              <i class="material-icons prefix">art_track</i>
                              <input id="icon_prefix" type="text" class="validate" name="titulo" required value="<?= $fila['Nombre'] ?>">
                              <label for="icon_prefix">Title</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix">message</i>
                              <textarea id="icon_prefix2" class="materialize-textarea" data-length="120" name="contenido" required></textarea>
                              <label for="icon_prefix2">Content</label>
                            </div>
                        </div>
                        
                        <input type="hidden" name="MAX_TAM" value="2000000">
                        
                        <div class="row">
                        <div class="input-field col s6">
                        <div class="file-field input-field">
                            <div class="btn cyan accent-4">
                                <span><i class="material-icons">attach_file</i></span>
                              <input type="file" name="imagen">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        </div>
                            
                        <div class="input-field col s6">
                        <div class="file-field input-field">
                            <label>Choose an image smaller than 2 MB</label>
                        </div>
                        </div>
                        </div>
                        
                        <div>
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="action">Send
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        </div>
        
        <?php include '../nav_footer/footer.html'; ?>
        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>

    </body>
</html>

<?php $conexion->close(); ?>