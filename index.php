<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS-->
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/login/bootstrap.css">
    <link rel="stylesheet" href="css/login/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="css/login/login.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">

    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!--jQuery libreria-->
    <script src="js/libraries/jquery-1.12.1.min.js"></script>

  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div style="margin-left:auto; margin-right:auto; text-align:center"class="content">
                  <div class="logo">
                    <img src="img/logo2.png" class="img-responsive" width="180px"alt="">
                  </div>
                  <h4>Inicio de sesión</h4>
                  <h3 id="login-type-user"></h3>
                  <input id="login-type-id" hidden="">
                  <i class="" id="pre"></i>
                  <i class="" id="pret"></i>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="login-form" method="post">
                    <div class="form-group">
                      <input id="login-username" type="text" name="loginUsername" required="" class="input-material">
                      <label for="login-username" class="label-material">Nombre de usuario</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="loginPassword" required="" class="input-material">
                      <label for="login-password" class="label-material">Contraseña</label>
                    </div><button id="login-btn" class="btn btn-info">Entrar</button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><br><br>

                        <button type="button" class="btn btn-outline-info btn-sm" id="btn-secretary">Secretaria</button>

                        <button type="button" class="btn btn-outline-info btn-sm" id="btn-medico">Médico</button>

                        <button type="button" class="btn btn-outline-info btn-sm" id="btn-admin">Administrador</button>
                        <small id="small-info">&#160;</small>
                        <hr id="hr-info">
                    <a id="pass-lost"href="" class="forgot-pass">Olvidé mi contraseña</a><br><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>&copy; 2017 AgendSoft</p>
      </div>
    </div>


    <!-- Javascript files-->
    <script src="js/libraries/bootstrap.min.js"></script>
    <script src="js/login/jquery.cookie.js"> </script>
    <script src="js/login/jquery.validate.min.js"></script>
    <script src="js/login/front.js"></script>
    <script src="js/login/inicio_sesion.js"></script>

  </body>
</html>
