<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>Nueva Secretaria</title>

      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

    	<!-- FullCalendar -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
      <link rel="stylesheet" href="css/toastr.min.css">
      <link rel="stylesheet" href="css/bootstrapValidator.min.css">
      <script src="js/libraries/jquery-1.12.1.min.js"></script>
  </head>

<body>
    <?php
        include("estructura/navbar.php");
     ?>

  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="well well-sm">
            <form class="form-horizontal" id="form-reg-med" enctype="multipart/form-data">
                <fieldset>
                    <legend class="text-center headercontact">Ingresar Nueva Secretaria</legend>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-address-card-o fa-2x bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="id_sec" name="id_sec" type="number" placeholder="Documento De Identificación" class="form-control">
                        </div>
                    </div>
                    <div id="form-validate">

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user fa-2x bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="nom_sec" name="nom_sec" type="text" placeholder="Nombres" class="form-control form-vali">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon fa-2x "></i></span>
                        <div class="col-md-8">
                            <input id="ape_sec" name="ape_sec" type="text" placeholder="Apellidos" class="form-control form-vali">
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon fa-2x "></i></span>
                        <div class="col-md-8">
                            <input id="tel" name="tel" type="text" placeholder="Número Teléfonico" class="form-control form-vali">
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon fa-2x "></i></span>
                        <div class="col-md-8">
                            <input id="email_sec" name="email_sec" type="text" placeholder="Correo" class="form-control form-vali">
                        </div>
                    </div><br>
                  </div>

                  <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon fa-2x "></i></span>
                      <div class="col-md-8">
                          <input id="user_sec" name="user_sec" type="text" placeholder="Usuario" class="form-control form-vali">
                      </div>
                  </div><br>
                  <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon fa-2x "></i></span>
                      <div class="col-md-8">
                          <input id="pass_sec" name="pass_sec" type="text" placeholder="Contraseña" class="form-control form-vali">
                      </div>
                  </div><br>
                </div>
              </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button id="btn-reg-sec" class="btn btn-primary btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                              Agregar Secretaria
                              <i class="" id="pre"></i>
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
  </div>
  </div>


  <?php
      include("estructura/footer.php");
   ?>

  <script src="js/libraries/bootstrap.min.js"></script>
  <script src="js/login/insertSecretaria.js"></script>
  <script src="js/libraries/toastr.min.js"></script>

  </body>

  </html>
