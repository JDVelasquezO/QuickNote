<?php
    
    session_start();
    if (!isset($_SESSION['correo']))
    {
        header("location: ../blog/index.php");
    }
    
    $busqueda = $_POST['buscar'];
    $id = $_POST['id'];
    
    require '../conexion.php';
    
    $consulta = "SELECT * FROM contenido WHERE titulo LIKE '%$busqueda%' ORDER BY fecha DESC ";
    $resultado = $conexion->query($consulta);
    
    $registro = $resultado->num_rows;
    
?>

<html>
    <head>
        <title>Found</title>
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
              <li><a href="blogs.php"><i style="font-size: 40px;" class="material-icons">arrow_back</i></a></li>
              <li><a href="../blog/cerrar.php"><i style="font-size: 40px;" class="material-icons">settings_power</i></a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="../blog/cerrar.php"><i class="material-icons">settings_power</i>Log out</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
        </nav>
        
        <br><br><br>
        
<?php

     if ($registro == NULL)
    {
        
?>
        <div id="modal1" class="modal white">
                <div class="modal-content white">
                    <h4 style="color: #e53935;">Error</h4>
                    <p style="color: #e53935">No results</p>
                </div>
                <div class="modal-footer white">
                    <a style="color: #e53935" href="form.php" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
                </div>
        </div>
    
<?php
         
    }
    
?>
        
        <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Records found</th>
                </tr>
            </thead>
        
<?php
    
    while ($fila = $resultado->fetch_assoc())
    {
        $id = $fila['id'];
?>
            
            <tbody>
                <tr>
                    <td><a href="mostrarBlog.php?id=<?=$id?>"><?=$fila['titulo']?></a></td>
                </tr>
            </tbody>

<?php
        
    }

?>
        </table>
        </div>
            
        <br><br><br><br><br><br><br><br><br>
        <?php include '../nav_footer/footer.html'; ?>
        
        <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/init.js"></script>
        
    </body>
</html>


<?php
    
    
    
    while ($fila = $resultado->fetch_assoc())
    {
        $id = $fila['id'];
?>

        <a href="mostrarBlog.php?id=<?=$id?>"><?=$fila['titulo']?></a>

<?php
        echo '<br>';
    }

    $conexion->close();