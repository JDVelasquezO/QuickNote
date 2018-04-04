<?php
ob_start();
session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Log out</title>
    </head>
    <body>
        <?php
            //session_start(); //Se reanuda la sesion
            
            session_destroy(); //Se cierra la sesion
            
            setcookie("usuario", $_SESSION['correo'], time() -1);
            setcookie("pass", $_SESSION['pass'], time() -1);
            
            header("location: final.php"); //Se redirige a otra pagina
            
        ?>
    </body>
</html>

<?php
ob_end_flush();
?>