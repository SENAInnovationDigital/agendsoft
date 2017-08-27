  <?php
  require_once('controlador/bdd.php');
  $sql = "SELECT c.id_cit, c.fechaIni_cit, c.fechaFin_cit, c.id_trata, c.docPac_cit, p.nombres_pac
          FROM cita c, paciente p
          WHERE c.docPac_cit = p.doc_pac";
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
    <!--Link archivos CSS-->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='css/fullcalendar.css' rel='stylesheet' />
    <link href="css/style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/toastr.min.css">


    <!--Enlace JQuery-->
    <script src="js/libraries/jquery-1.12.1.min.js"></script>

  </head>
  <body>
    <div class="fakeloader"></div>

    <?php
    include("estructura/navbar.php");
    ?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
          <img src="img/logo2.png" alt="">
          <div class="">
            <div class="row">
              <div class="col-md-4">

              </div>
              <div class="col-md-3">

              </div>
              <div class="col-md-4 etiqueta-doc">
                <i class="fa fa-user-md fa-3x" aria-hidden="true"></i>
                <h4>Dr. Juan Roberto Parra Soto</h4>
              </div>

            </div>
          </div>
          <div id="calendar" class="col-centered">
          </div>
        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form class="form-horizontal" method="POST" action="controlador/agregarCita.php">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva Cita</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="codigo" class="col-sm-2 control-label">Codigo</label>
                  <div class="col-sm-10">
                    <input type="text" name="cedulaPac" class="form-control" id="cedulaPac" placeholder="Cedula" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Paciente</label>
                  <div class="col-sm-10">
                    <input type="text" name="cita_pac" class="form-control" id="cita_pac" placeholder="Nombre Del Paciente" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="color" class="col-sm-2 control-label">Motivo</label>
                  <div class="col-sm-10">
                    <select name="motivo" class="form-control" id="motivo">
                      <option style="color:#0071c5;" value="#0071c5">&#9724; Ortodoncia</option>
                      <option style="color:#40E0D0;" value="#40E0D0">&#9724; Limpieza</option>
                      <option style="color:#008000;" value="#008000">&#9724; Extracción</option>
                      <option style="color:#FFD700;" value="#FFD700">&#9724; Endodoncia</option>
                      <option style="color:#FF8C00;" value="#FF8C00">&#9724; Periodoncia</option>
                      <option style="color:#FF0000;" value="#FF0000">&#9724; Retiro de brackets</option>
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
              </div>
              <div class="modal-footer">
                <input type="text" name="" id="validacionPaciente">
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
                <form class="form-horizontal" method="POST" action="controlador/editEventTitle.php">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar Cita</h4>
                  </div>
                  <div class="modal-body">

                    <div class="form-group">
                      <label for="title" class="col-sm-2 control-label">Paciente</label>
                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="color" class="col-sm-2 control-label">Motivo</label>
                      <div class="col-sm-10">
                        <select name="motivo" class="form-control" id="color">
                          <option style="color:#0071c5;" value="#0071c5">&#9724; Ortodoncia</option>
                          <option style="color:#40E0D0;" value="#40E0D0">&#9724; Limpieza</option>
                          <option style="color:#008000;" value="#008000">&#9724; Extracción</option>
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Endodoncia</option>
                          <option style="color:#FF8C00;" value="#FF8C00">&#9724; Periodoncia</option>
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Retiro de brackets</option>
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
                          <label class="text-danger"><input type="checkbox" name="eliminar" id="eliminar"><i class="fa fa-trash" aria-hidden="true"></i>
                            Eliminar Cita</label>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="id_cit" class="form-control" id="id_cit">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cerrar</button>
                      <button type="submit" class="btn btn-primary" id="guardaP"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar Cambios</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


      <!--Inicio del codigo funcion del calendario-->
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
                listDay: { buttonText: 'Agenda del día' },
                agendaDay: { buttonText: 'Dia' },
                agendaWeek: { buttonText: 'Semana' },
                month: { buttonText: 'Mes' }
              },

              defaultDate: new Date(),
              editable: true,
              eventLimit: true, // allow "more" link when too many events
              selectable: true,
              selectHelper: true,
              businessHours: true,
              eventOverlap:false,
              select: function(start, end) {
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD 08:mm:ss'));
                $('#ModalAdd #end').val(moment(start).format('YYYY-MM-DD 08:05:ss'));
                $('#ModalAdd').modal('show');
              },
              eventRender: function(event, element) {
                element.bind('dblclick', function() {
                  $('#ModalEdit #id_cit').val(event.id_cit);
                  $('#ModalEdit #title').val(event.title);
                  $('#ModalEdit #color').val(event.color);
                  $('#ModalEdit #start').val(event.start.format('YYYY-MM-DD HH:mm:ss'));;
                  $('#ModalEdit #end').val(event.end.format('YYYY-MM-DD HH:mm:ss'));
                  $('#ModalEdit').modal('show');
                });
              },

              eventDrop: function(event, delta, revertFunc) { // si changement de position
                bootbox.confirm("¿Confirmar cambios?", function(result){
                  if (result){edit(event);}
                  else{
                    revertFunc();
                  }
                });

              },
              eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                bootbox.confirm("¿Confirmar cambios?", function(result){
                  if (result){edit(event);}
                      else{
                        minuteDelta();
                      }
                    });

              },
              events: [
                <?php foreach($events as $event):

                  $start = explode(" ", $event['fechaIni_cit']);
                  $end = explode(" ", $event['fechaFin_cit']);
                  if($start[1] == '00:00:00'){
                    $start = $start[0];
                  }else{
                    $start = $event['fechaIni_cit'];
                  }
                  if($end[1] == '00:00:00'){
                    $end = $end[0];
                  }else{
                    $end = $event['fechaFin_cit'];
                  }
                  ?>
                  {
                    id_cit: '<?php echo $event['id_cit']; ?>',
                    title: '<?php echo $event['nombres_pac']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event['id_trata']; ?>',
                  },
                  <?php endforeach;
                  ?>
                ]
              });

              function edit(event)
              {
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
                if(event.end){
                  end = event.end.format('YYYY-MM-DD HH:mm:ss');
                }else{
                  end = start;
                }

                id_cit =  event.id_cit;

                Event = [];
                Event[0] = id_cit;
                Event[1] = start;
                Event[2] = end;
                var conf = 1;
                var conf2 = 2;

                $.ajax({
                  url: 'controlador/editarCita.php',
                  type: "POST",
                  data: {Event:Event},

                  beforeSend: function(){
                    $.loadingBlockShow({
                      style: {
                        position: 'fixed',
                        width: '100%',
                        height: '100%',
                        background: 'rgba(255, 255, 255, .5)',
                        left: 0,
                        top: 0,
                        zIndex: 10000
                      }
                    });
                  },
                  success: function(rep) {
                    if(rep == 'OK'){
                      $.loadingBlockHide();
                      toastr.info("La cita fué actualizada", "Actualizado");
                    }else{
                      $.loadingBlockHide();
                      toastr.error("Ocurrió un error", "Error");
                      setTimeout('document.location.reload()',1500);
                    }
                  },
                  error: function(){
                      $.loadingBlockHide();
                      location.reload();
                      toastr.error("Ocurrió un error", "Error");
                      setTimeout('document.location.reload()',1500);
                  }
                });

            }

            });

        </script>
        <!--Finalización del codigo funcion del calendario-->

          <?php
          include("estructura/footer.php");
          ?>
          <!--Links JavaScript -->
          <script src="js/libraries/bootstrap.min.js"></script>
          <script src='js/libraries/moment.min.js'></script>
          <script src='js/libraries/fullcalendar.js'></script>
          <script src="js/active.js"></script>
          <script type="text/javascript" src="js/libraries/toastr.min.js"></script>
          <script src="js/libraries/bootbox.min.js"></script>
          <script type="text/javascript" src="js/color.js"></script>
          <script src="js/libraries/jquery.loading.block.js"></script>
          <script src="js/ajaxnombrepaciente.js"></script>

    </body>
  </html>
