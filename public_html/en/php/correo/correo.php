<html>
    <head>
        <title>Correo enviado</title>
        <!--Links para cs-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../stylesheet.css">
        <!--Optimizacion en móbiles-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
    </head>

<?php
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    
    $para = "jdvela158@gmail.com";
    $asunto = "Mensaje Nuevo";
    
    $contenido = ""
            .    "Nombre del remitente: " . $nombre . " " . $apellido . "<br>"
            .    "Teléfono: " . $telefono . "<br>"
            .    "Correo: " . $email . "<br>"
            .    "Mensaje: " . $mensaje;
    
    $enviar = mail(utf8_decode($contenido), $asunto, $para);
?>
    <body class="blue-grey lighten-5">    
        
        <div id="modal1" class="modal white">
        <div class="modal-content white">
            <h4 style="color: #00b0ff;">Mensaje enviado</h4>
            <p style="color: #00b0ff">Tu mensaje fue enviado correctamente, pronto te responderemos</p>
        </div>
        <div class="modal-footer white">
            <a style="color: #00b0ff" href="../../index.html" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
        </div>
      </div>
        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>
    </body>
    
</html>