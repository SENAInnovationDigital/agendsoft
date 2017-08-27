
  <!DOCTYPE html>
  <html lang="en">

  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>Agend Soft</title>

      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

  	<!-- FullCalendar -->
  	<link href='css/fullcalendar.css' rel='stylesheet' />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="css/bootstrapValidator.min.css">
    <script src="js/libraries/jquery.js"></script>



      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

  </head>

  <body>

    <?php
        include("estructura/navbar.php");
     ?>

  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="well well-sm">
            <form class="form-horizontal" id="form-reg-pac">
                <fieldset>
                    <legend class="text-center headercontact">Registro De Pacientes</legend>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-address-card-o fa-2x bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="id_pac" name="id_pac" type="number" placeholder="Documento De Identificación" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user fa-2x bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="nom_pac" name="nom_pac" type="text" placeholder="Nombres" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon fa-2x "></i></span>
                        <div class="col-md-8">
                            <input id="ape_pac" name="ape_pac" type="text" placeholder="Apellidos" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-venus-mars bigicon fa-2x"></i></span>
                        <div class="col-md-8">
                          <label class="radio-inline"><input type="radio" id="sex_pac" name="sex_pac" value="M">Masculino</label>
                          <label class="radio-inline"><input type="radio" id="sex_pac" name="sex_pac" value="F">Femenino</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-birthday-cake bigicon fa-2x "></i></span>
                        <div class="col-md-8">
                            <input id="nac_pac" name="nac_pac" type="date" placeholder="Fecha de nacimiento" class="form-control">
                        </div>
                    </div>

                  <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-heartbeat bigicon fa-2x "></i></span>
                    <div class="col-md-8">
                        <select name="tiposangre_pac" class="form-control" id="tiposangre_pac">
                          <option style="" value="A+">&#9764; A+</option>
                          <option style="" value="A-">&#9764; A-</option>
                          <option style="" value="O+">&#9764; O+</option>
                          <option style="" value="O-">&#9764; O-</option>
                          <option style="" value="B+">&#9764; B+</option>
                          <option style="" value="B-">&#9764; B-</option>
                          <option style="" value="AB+">&#9764; AB+</option>
                          <option style="" value="AB-">&#9764; AB-</option>
                        </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-building bigicon fa-2x "></i></span>
                      <div class="col-md-8">
                          <input id="ciu_pac" name="ciu_pac" type="text" placeholder="Ciudad" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-home bigicon fa-2x "></i></span>
                      <div class="col-md-8">
                          <input id="dir_pac" name="dir_pac" type="text" placeholder="Dirección" class="form-control">
                      </div>
                  </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon fa-2x "></i></span>
                        <div class="col-md-4">
                            <input id="tel1" name="tel1" type="text" placeholder="Número Teléfonico" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input id="tel2" name="tel2" type="text" placeholder="Número Teléfonico alternativo" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon fa-2x "></i></span>
                        <div class="col-md-8">
                            <input id="email_pac" name="email_pac" type="text" placeholder="Correo" class="form-control">
                        </div>
                    </div><br>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button id="btn-reg-pac" class="btn btn-primary btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                              Registrar
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

  <!-- FullCalendar -->
  <script src="js/libraries/bootstrapValidator.min.js"></script>
  <script src="js/validacionForm.js"></script>
  <script src="js/libraries/toastr.min.js"></script>
  <script src="js/active.js"></script>
  <script src="js/registroPacientes.js"></script>



  </body>

  </html>
