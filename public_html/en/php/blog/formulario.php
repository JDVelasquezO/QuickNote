<!DOCTYPE html>
<html lang="es">
<head>
    <title></title>
	<!--Links para cs-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../stylesheet.css">
    <!--Optimizacion en móbiles-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
</head>

<body class="blue-grey lighten-5">
    <div class="row">
    <!--Login-->
    <div class="col s12 m6">
    <div class="container">
        <div id="formContacto2" class="row left"><br><br><br>
            <h3 class="blue-text">Log in</h3>
            <div class="row">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">mail</i>
                          <input id="icon_prefix" type="email" class="validate" name="correo" required value="<?php 
                                                                                                if(isset($_COOKIE['usuario']))
                                                                                                {
                                                                                                    echo $_COOKIE['usuario'];
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    echo '';
                                                                                                }
                                                                                                  ?>">
                          <label for="icon_prefix">E-mail</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">lock</i>
                          <input id="icon_prefix" type="password" class="validate" name="pass" required value="<?php 
                                                                                                if(isset($_COOKIE['pass']))
                                                                                                {
                                                                                                    echo $_COOKIE['pass'];
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    echo '';
                                                                                                }
                                                                                                  ?>">
                          <label for="icon_prefix">Password</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <p>
                            <div class="col s12">
                                <input type="checkbox" id="test5" name="recordar" >
                            <label for="test5">Remember password</label>
                            </div>
                        </p>
                    </div>
                    
                  <div class="row">
                    <div class="col s12">
                      <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="enviar">Start
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                    
                    <div class="row">
                    <div class="col s12">
                        <a href="recuperar.php">have you forgotten your password?</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    
    <!--Registro-->
    <div class="col s12 m6">
    <div class="container">
        <div id="formContacto2" class="row rigth"><br><br><br>
            <h3 class="blue-text">Sign up</h3>
            <div class="row">
                <form method="post" class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="icon_prefix" type="text" class="validate" name="nombre" required>
                          <label for="icon_prefix">First Name</label>
                        </div>
                        <div class="input-field col s6">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="icon_prefix" type="text" class="validate" name="apellido">
                          <label for="icon_prefix">Last Name</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">accessibility</i>
                          <input id="icon_prefix" type="text" class="validate" name="user" required>
                          <label for="icon_prefix">User</label>
                        </div>
                        <div class="input-field col s6">
                          <i class="material-icons prefix">mail</i>
                          <input id="icon_prefix" type="email" class="validate" name="correo">
                          <label for="icon_prefix">E-mail</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">lock</i>
                          <input id="icon_prefix" type="password" class="validate" name="pass" required placeholder="Mínimo 6 caracteres">
                          <label for="icon_prefix">Password</label>
                        </div>
                        <div class="input-field col s6">
                          <i class="material-icons prefix">lock</i>
                          <input id="icon_prefix" type="password" class="validate" name="cpass">
                          <label for="icon_prefix">Repeat password</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">phone</i>
                          <input id="icon_prefix" type="tel" class="validate" name="telefono" required>
                          <label for="icon_prefix">Phone</label>
                        </div>
                        <div class="input-field col s6">
                          <i class="material-icons prefix">business_center</i>
                          <input id="icon_prefix" type="text" class="validate" name="trabajo">
                          <label for="icon_prefix">What is your job?</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">date_range</i>
                          <input id="icon_prefix" type="text" class="datepicker" step="1" min="1900-01-01" max="2017-12-31" name="fecha_nac" required>
                          <label for="icon_prefix">What is your job?</label>
                        </div>
                    </div>
                    
                    <div class="row">
                    <div class="input-field col s12">
                          <i class="material-icons prefix">pets</i>
                          <input id="icon_prefix" type="text" class="validate" name="mascota">
                          <label for="icon_prefix">First Pet Name</label>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col s12">
                      <button class="btn waves-effect waves-light cyan accent-4" type="submit" name="registrar">Check in
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    
    <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    
</body>
</html>