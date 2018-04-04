<?php

    session_start();
    if (!isset($_SESSION['correo']))
    {
        header("location: ../blog/index.php");
    }
    
    require '../conexion.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
        <!--Links para cs-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../stylesheet.css">
        <!--Optimizacion en móbiles-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
        <style>
            #contenedor
            {
                width: 100%;
                background: #fff;
                margin: 0 auto;
                padding: 20px;
                border-radius: 12px;
                -moz-border-radius: 12px;
                -o-border-radius: 12px;
            }
            
            #cajaChat
            {
                width: 100%;
                height: 400px;
            }
            
            #datosChat
            {
                width: 100%;
                padding: 5px;
                margin-bottom: 5px;
                border-bottom: 1px solid silver;
                font-weight: bold;
            }
            
            #chat
            {
                height: 400px;
                border: 1px solid #cccccc;
                padding: 45px;
                border-radius: 10px;
                -moz-border-radius: 5px;
                -o-border-radius: 5px;
                -webkit-border-radius: 5px;
                overflow-x: hidden;
                overflow-y: scroll;
                width: 100%;
            }
            
            input[type='text']
            {
                width: 100%;
                height: 40px;
                border: 1px solid gray;
                border-radius: 5px;
                -moz-border-radius: 5px;
                -o-border-radius: 5px;
            }

            input[type='submit']
            {
                width: 100%;
                height: 40px;
                border: 1px solid gray;
                border-radius: 5px;
                -moz-border-radius: 5px;
                -o-border-radius: 5px;
                cursor: pointer;
            }

            textarea
            {
                width: 100%;
                height: 40px;
                border: 1px solid gray;
                border-radius: 5px;
                -moz-border-radius: 5px;
                -o-border-radius: 5px;
            }

            input, textarea
            {
                margin-bottom: 3px;
            }
        </style>

	<script type="text/javascript">
		function ajax()
		{
			var req = new XMLHttpRequest();

			req.onreadystatechange = function()
			{
				if (req.readyState == 4 && req.status == 200) 
				{
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();
		}

		//Refresco de página a cada segundo
		setInterval(function(){
			ajax();
		}, 1000);

	</script>

</head>
<body onload="ajax();" class="blue-grey lighten-5">
    
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="privado.php" class="brand-logo">QuickNote</a>
          <ul class="right hide-on-med-and-down">
              <li><a href="../blog/cerrar.php"><i style="font-size: 40px;" class="material-icons">settings_power</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="../blog/cerrar.php"><i class="material-icons">settings_power</i>Cerrar Sesion</a></li>
          </ul>
          <a href="privado.php" data-activates="nav-mobile" class="button-collapse">Inicio</a>
        </div>
    </nav>
    
    <br><br><br>

    <div class="container">
	<div id="contenedor">
		<div id="cajaChat">
			<div id="chat"></div>
		</div>
            
<?php

               $consulta = "SELECT * FROM usuarios WHERE id = ".$_SESSION['id']." ";
               $resultado = $conexion->query($consulta);
               
               while ($fila = $resultado->fetch_assoc())
               {

?>

            <div class="container">
                <div id="formContacto3" class="row center">
                    <form method="post" action="indexChat.php">
                        <input type="hidden" name="id" value="<?=$fila['id']?>">
                        <input type="hidden" name="nombre" value="<?=$fila['Nombre']?>">
			
                        <div class="row">
                            <div class="input-field col s12">
                              <i class="material-icons prefix">message</i>
                              <textarea id="icon_prefix2" class="materialize-textarea" data-length="120" name="mensaje" required></textarea>
                              <label for="icon_prefix2">Send a message</label>
                            </div>
                        </div>
			
                        <div class="row">
                        <div class="col s12">
                          <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="enviar">Send
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

               <?php
               
               }//Cierre del while
               
			if (isset($_POST['enviar'])) 
			{
                                $nombre = $_POST['nombre'];
                                $id = $_POST['id'];
				$mensaje = $_POST['mensaje'];

				$consulta = "INSERT INTO chat (nombre, mensaje, id_usuario) VALUES ('$nombre', '$mensaje', '$id')";
				$resultado = $conexion->query($consulta);
			}

		?>

	</div>
    
    <?php include '../nav_footer/footer.html'; ?>
        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>

</body>
</html>