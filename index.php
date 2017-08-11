<?php
require_once('bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

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
    <link href="css/bootstrap.css" rel="stylesheet">

	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <script src="js/jquery.js"></script>

<!--  <script type="text/javascript">
  $(document).ready(function(){
      $(".dropdown").hover(
          function() {
              $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("fast");
              $(this).toggleClass('open');
          },
          function() {
              $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("fast");
              $(this).toggleClass('open');
          }
      );
  });
</script>-->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


  <nav class="navbar navbar-default  navbar-fixed-top">
    <div class="container">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-home" aria-hidden="true"></i>
          Agend Soft</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      </ul>

   <!-- Slider consulta, ingreso y edición de pacientess-->


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown mega-dropdown active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i>
              Pacientes<span class="caret"></span></a>
            <div class="dropdown-menu mega-dropdown-menu">
                    <div class="container-fluid">
                <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active">
                            <ul class="nav-list list-inline">
                                <li><a href="#"><i class="fa fa-user fa-5x" aria-hidden="true"></i>
                                  <i class="fa fa-search fa-2x" aria-hidden="true"></i>
                                      <span>Buscarrr</span></a></li>
                                <li><a href="registropaciente.html"><i class="fa fa-user-plus fa-5x" aria-hidden="true"></i>
                                      <span>Agregar</span></a></li>
                            </ul>
                          </div>

                        </div>
                    </div>
                  <!-- Nav tabs -->
             </div>
       </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
              Bienvenida, Jhoana <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="/user/preferences"><i class="icon-cog"></i> Preferences</a></li>
                <li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
                <li class="divider"></li>
                <li><a href="/auth/logout"><i class="icon-off"></i> Cerrar Sesión</a></li>
            </ul>
        </li>
     </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">

                    <img src="img/logo2.png" alt="">
                   <div id="calendar" class="col-centered">

                </div>
            </div>

        </div>

        <!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">

			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Nueva Cita</h4>
			  </div>
			  <div class="modal-body">

				  <div class="form-group">
            <label for="codigo" class="col-sm-2 control-label">Codigo</label>
  					<div class="col-sm-10">
  					  <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Codigo">
  					</div>
          </div>
        <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Paciente</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Nombre Del Paciente">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Motivo</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">

						  <option style="color:#0071c5;" value="Ortodoncia">&#9724; Ortodoncia</option>
						  <option style="color:#40E0D0;" value="Limpieza">&#9724; Limpieza</option>
						  <option style="color:#008000;" value="Extracción">&#9724; Extracción</option>
						  <option style="color:#FFD700;" value="Endodoncia">&#9724; Endodoncia</option>
						  <option style="color:#FF8C00;" value="Periodoncia">&#9724; Periodoncia</option>
						  <option style="color:#FF0000;" value="Retiro de brackets">&#9724; Retiro de brackets</option>

						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Fecha De Inicio</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fecha De Terminación</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="start">
					</div>
				  </div>

			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i>
            Cerrar</button>
				<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
            Guardar Cita</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>



		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Editar Cita</h4>
			  </div>
			  <div class="modal-body">

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Paciente</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Motivo</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">

              <option style="color:#0071c5;" value="Ortodoncia">&#9724; Ortodoncia</option>
						  <option style="color:#40E0D0;" value="Limpieza">&#9724; Limpieza</option>
						  <option style="color:#008000;" value="Extracción">&#9724; Extracción</option>
						  <option style="color:#FFD700;" value="Endodoncia">&#9724; Endodoncia</option>
						  <option style="color:#FF8C00;" value="Periodoncia">&#9724; Periodoncia</option>
						  <option style="color:#FF0000;" value="Retiro de brackets">&#9724; Retiro de brackets</option>

						</select>
					</div>
				  </div>

          <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Fecha De Inicio</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fecha De Terminación</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end">
					</div>
				  </div>



          <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
            <label class="text-danger"><input type="checkbox"  name="delete"><i class="fa fa-trash" aria-hidden="true"></i>
                  Elminar Cita</label>
            </div>
          </div>
        </div>

        <input type="hidden" name="id" class="form-control" id="id">


      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cerrar</button>
      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar Cambios</button>
      </div>
    </form>
    </div>
    </div>
  </div>

  </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
  <script src='js/fullcalendar.js'></script>




	<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({

      monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
      dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
      dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],

			header: {
				left: 'prev,next,today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay, listDay'
			},

      views: {
        listDay: { buttonText: 'Agenda' },
        agendaDay: { buttonText: 'Dia' },
        agendaWeek: { buttonText: 'Semana' },
        month: { buttonText: 'Mes' }
      },

			defaultDate: new Date(),
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {

				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
          $('#ModalEdit #start').val(event.start);
          $('#ModalEdit #end').val(event.end);
					$('#ModalEdit').modal('show');
				});
			},

			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event):

				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach;
       ?>
			]
		});

		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}

			id =  event.id;

			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;

			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Guardado');
					}else{
						alert('No se pudo guardar, revisa la conexión.');
					}
				}
			});
		}

	});

</script>

</body>

</html>
