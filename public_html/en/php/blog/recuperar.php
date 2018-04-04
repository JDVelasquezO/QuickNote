<html>
    <head>
        <title>Recovery</title>
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
              <li><a href="index.php"><i style="font-size: 50px;" class="material-icons">arrow_back</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="index.php"><i class="material-icons">arrow_back</i>Home</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
        </nav>

<br><br><br>
        
        <div class="container">
            <div id="formContacto" class="row left">
               <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">mail</i>
                          <input id="icon_prefix" type="email" class="validate" name="correo" required>
                          <label for="icon_prefix">E-mail</label>
                        </div>
                    </div>
                    
                   <div class="row">
                        <div class="input-field col s12">
                              <i class="material-icons prefix">pets</i>
                              <input id="icon_prefix" type="text" class="validate" name="mascota">
                              <label for="icon_prefix">Name of your first pet</label>
                        </div>
                    </div>
                    
                   <div class="row">
                    <div class="col s12">
                      <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="recuperar">Recovery
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </form> 
            </div>
        </div>
        
        <?php include '../nav_footer/footer.html'; ?>
        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>

    </body>
</html>

<?php

    require '../conexion.php';
    
    if (isset($_POST['recuperar']))
    {
        $correo = $_POST['correo'];
        $mascota = $_POST['mascota'];

        $consulta = "SELECT * FROM usuarios WHERE Correo = '$correo' AND Mascota = '$mascota'";
        $resultado = $conexion->query($consulta);
        
        $fila = $resultado->num_rows;

        if ($fila != 0)
        {
            while ($registro = $resultado->fetch_assoc())
            {
                $para = $fila['Correo'];
                $asunto = "Recupera tu password";
                $mensaje = "Hola ".$fila['Nombre'] . ",<br>"
                        .  "si has solicitado la recuperacion de tu password, es: ".$fila['Password'] .".<br>"
                        .  "Si no, omite este mensaje";
                
                mail($para, $asunto, utf8_decode($mensaje));
                
?>

<div id="modal1" class="modal" style="color: #0091ea;">
            <div class="modal-content">
              <h4>All rigth!</h4>
              <p>We sent you an email with your password</p>
            </div>
            <div class="modal-footer">
                <a style="color: #0091ea;" href="../../index.html" class="modal-action modal-close waves-effect waves-green btn-flat">Thank you</a>
            </div>
</div>
    
<?php
                
            }
        }
        else
        {
?>
<div id="modal1" class="modal" style="color: red;">
            <div class="modal-content">
              <h4>¡Error!</h4>
              <p>The mail or pet does not match</p>
            </div>
            <div class="modal-footer">
                <a style="color: red;" href="recuperar.php" class="modal-action modal-close waves-effect waves-green btn-flat">Retry</a>
            </div>
<?php
        }
    }

?>