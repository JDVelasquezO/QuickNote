<!DOCTYPE html>
<html lang="es">
<head>
    <title>Contact</title>
	<!--Links para cs-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../stylesheet.css">
    <!--Optimizacion en móbiles-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
</head>

<body class="blue-grey lighten-5">
    <!--Barra de navagacion-->
    <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="../../index.html" class="brand-logo">QuickNote</a>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="../../index.html"><i style="font-size: 20px;">Home</i></a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
    
    <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Send your email</h1>
      <div class="row center">
        <h5 class="header col s12 light">Your opinion is important, let me know</h5>
      </div>
      </div>
    </div>
        <div class="parallax"><img src="../../res/Wall4.jpg" alt="Unsplashed background img 1"></div>
    </div>
      
        
        <br><br><br>
      
      <!--Formulario-->
      <div class="container">
      <div id="formContacto" class="row center">
      <div class="row">
        <form action="correo.php" method="post" class="col s12">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" class="validate" name="nombre" required>
              <label for="icon_prefix">First name</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" class="validate" name="apellido">
              <label for="icon_prefix">Last name</label>
            </div>
          </div>
            
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">phone</i>
              <input id="icon_prefix" type="tel" class="validate" name="telefono" required>
              <label for="icon_prefix">Phone</label>
            </div>
          </div>
            
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">mail</i>
              <input id="icon_prefix" type="email" class="validate" name="email" required>
              <label for="icon_prefix">E-mail</label>
            </div>
          </div>
            
          <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">message</i>
            <textarea id="icon_prefix2" class="materialize-textarea" data-length="120" name="mensaje" required></textarea>
            <label for="icon_prefix2">Comment here</label>
          </div>
          </div>
            
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </form>
      </div>
      </div>
      <br><br>
    </div>
    
    <!--Footer-->
    <?php include '../nav_footer/footer.html'; ?>
    
    <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    
</body>
</html>