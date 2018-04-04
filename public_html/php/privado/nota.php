<?php

    session_start();
    if (!isset($_SESSION['correo']))
    {
        header("location: ../blog/index.php");
    }
    
    require '../conexion.php';
    
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
    }
    
    $consulta = "SELECT * FROM usuarios WHERE id = '".$id."' ";
    $resultado = $conexion->query($consulta);
    
    while ($fila = $resultado->fetch_assoc())
    {

?>

<html>
    <head>
        <title>Notas</title>
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
        
    <div class="container">
        <div id="formContacto3" class="row center">
                <div class="row">
                    <form method="post" action="insertaNota.php">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="hidden" name="nombre" value="<?=$_SESSION['nombre']?>">
                        <input type="hidden" name="id_nombre" value="<?=$_SESSION['id']?>">
                        <h2 class="blue-grey-text">Haz una nota para: <?=$fila['Nombre']?> </h2>
                        <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix">art_track</i>
                              <input id="icon_prefix" type="text" class="validate" name="asunto" required >
                              <label for="icon_prefix">Asunto</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix">message</i>
                              <textarea id="icon_prefix2" class="materialize-textarea" data-length="50" name="contenido" required></textarea>
                              <label for="icon_prefix2">Deja tu nota aquí</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12">
                              <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="action">Enviar
                                <i class="material-icons right">send</i>
                              </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
        
        <br><br><br><br>
        
        <?php include '../nav_footer/footer.html'; ?>
    
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>

    </body>
</html>

<?php

    }

$conexion->close();