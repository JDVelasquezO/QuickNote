<?php
    
ob_start();
    session_start();

?>

<html>
    <head>
        <title>Registro</title>
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
              <li><a href="../../index.html"><i style="font-size: 50px;" class="material-icons">arrow_back</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="../../index.html"><i class="material-icons">arrow_back</i>Inicio</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
        </nav>
        
        <?php
        
        //Si hay respuesta del boton submit... que ejecute todo
        if (isset($_POST['enviar']))
        {
            require '../conexion.php';
            
            $correo = $_POST['correo'];
            $pass = $_POST['pass'];
            
            $consulta = "SELECT * FROM usuarios WHERE Correo = '$correo' AND Password = '$pass'";
            $resultado = $conexion->query($consulta);
            
            $fila = $resultado->num_rows; //num_rows busca una coincidencia en la db y devuelve un 0 o 1
            
            if ($fila != 0) //Si encuentra algo...
            {
                //session_start(); //Que inicie sesion y...
                $_SESSION['correo'] = $correo;
                header("location: ../privado/privado.php");
                
                while ($registro = $resultado->fetch_assoc())
                {
                    $_SESSION['id'] = $registro['id'];
                    $_SESSION['nombre'] = $registro['User'];
                    $_SESSION['pass'] = $registro['Password'];
                }
                
                if (isset($_POST['recordar']))
                {
                    setcookie("usuario", $_POST['correo'], time() + 3600);
                    setcookie("pass", $_POST['pass'], time() + 3600);
                }
                
            }
            else 
            {
                
        ?>
        
            <div id="modal1" class="modal white">
                <div class="modal-content white">
                    <h4 style="color: #e53935;">Error</h4>
                    <p style="color: #e53935">Correo o contraseña incorrectas</p>
                </div>
                <div class="modal-footer white">
                    <a style="color: #e53935" href="index.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                </div>
            </div>

        <?php
        
            }
        }
        
        ?>
        
        <?php
        
            include 'formulario.php';
        
        ?>
        
        <!-------------------------------------Registro----------------------------------------------------->
    
    <?php
            if (isset($_POST['registrar']))
            {
    
            require '../conexion.php';
            
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $user = $_POST['user'];
            $correo = $_POST['correo'];
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];
            $mascota = $_POST['mascota'];
            $telefono = $_POST['telefono'];
            $trabajo = $_POST['trabajo'];
            $fecha_nac = $_POST['fecha_nac'];
            
            $consulta = "SELECT Correo FROM usuarios WHERE Correo LIKE '%$correo%' ";
            $resultado = $conexion->query($consulta);
            
            $fila = $resultado->fetch_assoc();
            
            if ($fila['Correo'] == $correo)
            {
                
    ?>
            <div id="modal1" class="modal white">
                <div class="modal-content white">
                    <h4 style="color: #e53935;">Error</h4>
                    <p style="color: #e53935">Este correo ya está en uso</p>
                </div>
                <div class="modal-footer white">
                    <a style="color: #e53935" href="index.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                </div>
            </div>  
    <?php
                
            }
            else
            {
                if (strlen($pass) > 6)
                {
                    if ($pass == $cpass) 
                    {   
                        $consulta = "INSERT INTO usuarios (Nombre, Apellido, User, Correo, Password, Mascota, telefono, Trabajo, fecha_nac) VALUES ('$nombre', '$apellido', '$user', '$correo', '$pass', '$mascota', '$telefono', '$trabajo', '$fecha_nac')";

                        $resultado = $conexion->query($consulta);

                        if ($resultado) 
                        {
                            ?>
                                <div id="modal1" class="modal white">
                                    <div class="modal-content white">
                                        <h4 style="color: #00b0ff;">¡Bien hecho!</h4>
                                        <p style="color: #00b0ff">Listo, ahora inicia sesión</p>
                                    </div>
                                    <div class="modal-footer white">
                                        <a style="color: #00b0ff" href="index.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                                    </div>
                                </div>  
                            <?php
                            
                        }
                        else
                        {
                            echo '<center><div id="div2">No se pudo insertar</div></center>';
                        }
                    }
                    else 
                    {
                        ?>
                            <div id="modal1" class="modal white">
                                <div class="modal-content white">
                                    <h4 style="color: #e53935;">Error</h4>
                                    <p style="color: #e53935">Las contraseñas no coinciden</p>
                                </div>
                                <div class="modal-footer white">
                                    <a style="color: #e53935" href="index.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                                </div>
                            </div>  
                    <?php
                    }
                }
                else
                {
                    ?>
                            <div id="modal1" class="modal white">
                                <div class="modal-content white">
                                    <h4 style="color: #e53935;">Error</h4>
                                    <p style="color: #e53935">La contraseña debe tener más de 6 caracteres</p>
                                </div>
                                <div class="modal-footer white">
                                    <a style="color: #e53935" href="index.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                                </div>
                            </div>  
                    <?php
                }
            }
            
            }
            
        ?>
        
        <?php include '../nav_footer/footer.html'; ?>
        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>
        
    </body>
</html>

<?php
ob_end_flush();
?>