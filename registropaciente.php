
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
    <script src="js/jquery.js"></script>



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
            <form class="form-horizontal" method="post">
                <fieldset>
                    <legend class="text-center headercontact">Registro De Pacientes edwar prieto</legend>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user fa-2x bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="idpaciente" name="idpaciente" type="text" placeholder="Documento De Identificación" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user fa-2x bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="fname" name="name" type="text" placeholder="Nombres" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon fa-2x "></i></span>
                        <div class="col-md-8">
                            <input id="lname" name="name" type="text" placeholder="Apellidos" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon fa-2x "></i></span>
                        <div class="col-md-8">
                            <input id="email" name="email" type="text" placeholder="Correo" class="form-control">
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
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon fa-2x "></i></span>
                        <div class="col-md-8">
                            <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                              Registrar</button>
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





  <script src="js/bootstrap.min.js"></script>

  <!-- FullCalendar -->
  <script src='js/moment.min.js'></script>
  <script src='js/fullcalendar.js'></script>
  <script src="js/active.js"></script>


  </body>

  </html>
