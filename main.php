  <?php
  require_once('controlador/bdd.php');
  include('controlador/tratamientos.php');
  include('controlador/tratamientos2.php');
  include('controlador/medicoCita.php');
  /*La consulta se desplazó para la linea 35, para que obtenga la sesión creada
    en el navbar y mayor legibilidad del codigo*/
  ?>

  <!DOCTYPE html>
  <html lang="es">
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
    <!--Preloader screen complete-->
    <div class="fakeloader"></div>

    <!--Navbar-->
    <?php
    include("estructura/navbar.php");
    include("controlador/allCitas.php");
    ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
          <img src="img/logo2.png" alt="">
          <div class="">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-3"></div>
              <div class="col-md-4 etiqueta-doc">
                <i class="fa fa-user-md fa-3x" aria-hidden="true"></i>
                <h4>
                  <?php

                  echo $row['nombres_med'];

                  ?></h4>
              </div>
            </div>
          </div>
            <div id="calendar" class="col-centered"></div>
        </div>
      </div>


      <!-- Modal Agregar cita-->
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
                    <input type="text" name="cedulaPac" class="form-control" id="cedulaPac" placeholder="Cedula" autofocus autocomplete="off">
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
                      <?php
                        while ($tratamientos = mysqli_fetch_assoc($consultaTratamientos))
                         {
                           echo '<option style="color:'.$tratamientos['id_trata'].';" value="'.$tratamientos['id_trata'].'">&#9724;'.$tratamientos['descripcion_tra'].'</option>';
                          }
                       ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="start" class="col-sm-2 control-label">Hora De Inicio</label>
                  <div class="col-sm-10">
                    <input type="time" name="start" class="form-control" id="horaini" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="start" class="col-sm-2 control-label">Hora De Finalización</label>
                  <div class="col-sm-10">
                    <input type="time" name="start" class="form-control" id="horafin" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="celular" class="col-sm-2 control-label">Celular</label>
                  <div class="col-sm-10">
                    <input type="text" name="celular" class="form-control" id="celular" readonly>
                  </div>
                </div>
                <!--Valor de la fecha actual oculto-->
                <input hidden=""type="text" name="start" class="" id="start">
                <input hidden=""type="text" name="end" class="" id="end">

              </div>
              <div class="modal-footer">
                <input type="text" name="form-control" id="validacionPaciente" readonly>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i>
                  Cerrar</button>
                  <button type="button" id="btn-save" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Guardar Cita</button>
                  </div>
                </form>
              </div>
            </div>
          </div>



          <!-- Modal EDIT-->
          <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form class="form-horizontal"><!-- method="POST" action="controlador/editEventTitle.php">-->
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
                        <select name="motivo" class="form-control" id="motivo">
                          <?php
                            while ($tratamientos2 = mysqli_fetch_assoc($consultaTratamientos2))
                             {
                              echo '<option style="color:'.$tratamientos2['id_trata'].';" value="'.$tratamientos2['id_trata'].'">&#9724;'.$tratamientos2['descripcion_tra'].'</option>';
                              }
                           ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="start" class="col-sm-2 control-label">Hora De Inicio</label>
                      <div class="col-sm-10">
                        <input type="time" name="start" class="form-control" id="horaini">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="start" class="col-sm-2 control-label">Hora De Finalización</label>
                      <div class="col-sm-10">
                        <input type="time" name="start" class="form-control" id="horafin">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="celular" class="col-sm-2 control-label">Número de celular</label>
                      <div class="col-sm-10">
                        <input type="text" name="celular" class="form-control" id="celular" readonly>
                      </div>
                    </div>
                    <?php
                    if(isset($_SESSION['doc_med']))
                      {
                    echo '<div class="form-group">
                            <label for="celular" class="col-sm-2 control-label">Comentario</label>
                            <div class="col-sm-10">
                              <input type="text" name="celular" class="form-control" id="coment">
                            </div>
                          </div>';
                      }
                     ?>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <button type="button"  class="btn btn-danger" data-dismiss="modal" data-placement="top" id="delete_Evento"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                          </div>
                        </div>
                      </div>
                      <!--Valor de la fecha actual oculto-->
                      <input hidden=""type="text" name="start" class="" id="start">
                      <input hidden=""type="text" name="end" class="" id="end">
                      <input type="hidden" name="id_cit" class="form-control" id="id_cit">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default"  id="cerrarM" ><i class="fa fa-ban" aria-hidden="true"></i> Cerrar</button>
                      <button type="button" class="btn btn-primary" id="guardaP"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar Cambios</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


      <!--Inicio del codigo funcion del calendario-->
      <script>
      //FUNCION DE COMPROBACION DE overlap      //BYELSENSEI
      //1=START      2= END        3=start y end        0=NoOverlap

    function isOverlapping(eventoStart,eventoEnd,CitaEvento) {
      var resultado=0;
      var arrCalEvents =$('#calendar').fullCalendar('clientEvents');

      for (i =0;i< arrCalEvents.length; i++)
      {
        //alert(arrCalEvents[i].id_cit);
        if(CitaEvento!=arrCalEvents[i].id_cit)
        {
              if (eventoStart >= arrCalEvents[i].start.format('YYYY-MM-DD HH:mm')
                  && eventoStart <= arrCalEvents[i].end.format('YYYY-MM-DD HH:mm'))
              {
                resultado=1;
                return resultado;
                break;
              }

              else if (eventoEnd >= arrCalEvents[i].start.format('YYYY-MM-DD HH:mm')
                      && eventoEnd <= arrCalEvents[i].end.format('YYYY-MM-DD HH:mm'))
                {
                  resultado= 2;
                  return resultado;
                  break;
                }

              if (eventoStart <= arrCalEvents[i].start.format('YYYY-MM-DD HH:mm')
                    && eventoEnd >= arrCalEvents[i].end.format('YYYY-MM-DD HH:mm'))
                {
                  resultado=3;
                  return resultado;
                  break;
                }
            }
          }
        return resultado;
      }

        //Cuando el doc HTML esté listo realiza lo siguiente
        $(document).ready(function() {
            //contenido del calendario
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
              businessHours: true, //Horario de atención
              eventOverlap: false, //Evita la sobreposición de los eventos Drop

              select: function(start, end) {
                end = start;
                $('#ModalAdd #cedulaPac').val("");
                $('#ModalAdd #horaini').val("");
                $('#ModalAdd #horafin').val("");
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
                $('#ModalAdd #validacionPaciente').val("");
                $('#ModalAdd #validacionPaciente').removeAttr('class');
                $('#ModalAdd #cita_pac').val("");
                $('#ModalAdd #celular').val("");
                $('#ModalAdd').modal('show');
                $('#ModalAdd').on('shown.bs.modal', function () {
                    $('#ModalAdd #cedulaPac').focus()
                  })
              },

            /*eventRender: function(event, element) {
                element.bind('dblclick', function() {
                  $('#ModalEdit #id_cit').val(event.id_cit);
                  $('#ModalEdit #title').val(event.title);
                  $('#ModalEdit #color').val(event.color);
                  $('#ModalEdit #start').val(event.start.format('HH:mm'));;
                  $('#ModalEdit #end').val(event.end.format('HH:mm'));
                  $('#ModalEdit').modal('show');
                });
              },*/

              eventDrop: function(event, delta, revertFunc) { // si changement de position
                bootbox.confirm("¿Confirmar cambios?", function(result)
                {
                  if (result){
                    edit(event);
                  }
                  else{
                    revertFunc();
                  }
                });
              },


              eventClick: function( event,jsEvent,view) {
                $('#guardaP').off("click");
                $('#delete_Evento').off("click");
                //Se obtiene el horario de la cita
                $('#ModalEdit #horaini').val(event.start.format('HH:mm'));
                $('#ModalEdit #horafin').val(event.end.format('HH:mm'));

                $('#ModalEdit #id_cit').val(event.id_cit);
                $('#ModalEdit #title').val(event.title);
                $('#ModalEdit #motivo').val(event.color);
                $('#ModalEdit #celular').val(event.celular);
                $('#ModalEdit #start').val(event.start.format('YYYY-MM-DD'));
                $('#ModalEdit #end').val(event.end.format('YYYY-MM-DD'));
                $('#ModalEdit').modal('show');

                //-----Eliminado eventClick
                  $('#delete_Evento').click(function(){

                    bootbox.confirm("¿Confirma que desea ELIMINAR la cita de "+event.title+"?", function(result){
                      if (result)
                      {
                        var btneliminar= "OK";
                        datos = {'id_cit':event.id_cit,'btneliminar':btneliminar}
                          $.ajax({
                             url: 'controlador/editEventTitle.php',
                             data: datos,
                             type: "POST",

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

                            success: function () {
                             $('#calendar').fullCalendar('removeEvents',  event._id);
                               $.loadingBlockHide();
                             toastr.error("la cita de "+event.title+" ha sido eliminada", "Eliminación exitosa!");
                             }
                           });
                           $('#delete_Evento').off("click");
                         }

                          if(!result)
                          {
                            toastr.info("la cita de "+event.title+" No fué eliminada", "No se eliminó!");
                            $('#delete_Evento').off("click");
                          }
                        });
                  });

                    //-----GUARDADO  EDITADO eventClick
                    $('#guardaP').click(function(){

                      startDate2 = $('#ModalEdit #start').val();
                      endDate2 = $('#ModalEdit #end').val();
                      horaini = $('#ModalEdit #horaini').val();
                      horafin = $('#ModalEdit #horafin').val();

                      start2 = startDate2+" "+horaini;
                      end2 = endDate2+" "+horafin;


                      if( isOverlapping(start2, end2,event.id_cit)
                       ==1)
                      {
                       toastr.error("La fecha de inicio de la cita se sobrepone con otra cita", "Fecha inválida!");
                      }
                      else if( isOverlapping(start2, end2,event.id_cit)
                        ==2)
                      {
                        toastr.error("La fecha Final de la cita se sobrepone con otra cita", "Fecha inválida!");
                      }
                      else if( isOverlapping(start2,end2,event.id_cit)
                        ==3)
                      {
                        toastr.error("La fecha Inicial y Final de la cita se sobrepone con otra cita", "Fecha inválida!");
                      }

                      else if(horaini > horafin ){
                        toastr.error("La fecha de inicio: "+start2+" no debe ser mayor a la de finalización.", "Horario incorrecto");
                      }
                      else if(horaini == horafin){
                        toastr.error("La fecha de inicio: "+start2+" no debe ser igual a la de finalización.", "Horario incorrecto");
                      }
                      else{

                      bootbox.confirm("¿Confirma que desea EDITAR la cita de "+event.title+"?", function(result){
                        if (result)
                      {
                          $('#guardaP').off("click");

                          datos2 = {'id_cit':event.id_cit,'color':$('#ModalEdit #motivo').val(),
                          'start':start2,'end':end2};//,, 'end':event.end.format('HH:mm')d}
                          var datos3=[
                                  {
                                  id_cit:event.id_cit,title:$('#ModalEdit #title').val(),
                                  celular: $('#ModalEdit #celular').val(),
                                  color:$('#ModalEdit #motivo').val(),start:start2,
                                  end:end2
                                }//,, 'end':event.end.format('HH:mm')d}
                              ];
                        $.ajax({
                           url: 'controlador/editEventTitle.php',
                           data: datos2,
                           type: "POST",

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

                           success: function () {
                            $('#calendar').fullCalendar('removeEvents',event._id);
                            $('#calendar').fullCalendar('addEventSource',  datos3);
                              $.loadingBlockHide();
                            toastr.info("la cita de "+event.title+" ha sido editada", "Edición exitosa!");
                          }
                      });
                      $('#ModalEdit').modal('hide');
                      $('#guardaP').off("click");
                    }
                    else {
                      toastr.info("la cita de "+event.title+" no ha sido editada", "No se editó");
                      $('#ModalEdit').modal('hide');
                      $('#guardaP').off("click");
                    }
                  });
                }
            });
                  //CIERRE del modal eventClick
                  $('#cerrarM').click(function(){
                      $('#delete_Evento').off("click");
                      $('#ModalEdit').modal('hide');
                    });
                 }, // fin eventClick

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
                    title: '<?php echo $event['nombres_pac'].' '.$event['apellidos_pac']; ?>',
                    start: '<?php echo $start; ?>',
                    end: '<?php echo $end; ?>',
                    color: '<?php echo $event['id_trata']; ?>',
                    celular: '<?php echo $event['telefono1_pac']; ?>',
                  },
                  <?php endforeach;

                  ?>
                ]
              });


         // Guardar nueva cita
          $("#btn-save").click(function(event){

              horaini = $('#ModalAdd #horaini').val();
              horafin = $('#ModalAdd #horafin').val();

              cedulaPac = $('#ModalAdd #cedulaPac').val();
              motivo =   $('#ModalAdd #motivo').val();
              startDate = $('#ModalAdd #start').val();
              endDate = $('#ModalAdd #end').val();
              title = $('#ModalAdd #cita_pac').val();
              celular = $('#ModalAdd #celular').val();
              estado = $('#validacionPaciente').val();

              start = startDate+" "+horaini;
              end = endDate+" "+horafin;

              event.color = motivo;
              event.start = start;
              event.end = end;
              event.title = title;
              event.celular = celular;

              //Comprobacion del overlap

              if( isOverlapping(start, end,0)
               ==1)
               {
               toastr.error("La fecha de inicio de la cita se sobrepone con otra cita", "Fecha inválida!");
              }
              else if( isOverlapping(start, end,0)
                ==2)
                {
                toastr.error("La fecha Final de la cita se sobrepone con otra cita", "Fecha inválida!");
              }
              else if( isOverlapping(start,end,0)
                ==3)
                {
                toastr.error("La fecha Inicial y Final de la cita se sobrepone con otra cita", "Fecha inválida!");
              }

            else if(cedulaPac == ""){
                $('#ModalAdd #cedulaPac').focus();
                $('.modal-body .form-group:first').addClass('has-error');
                }

                else if(estado == "Paciente no registrado"){
                  toastr.error("Paciente no registrado", "Documento inválido!");
                }

                else if(start > end ){
                  toastr.error("La hora de inicio: "+horaini+" no debe ser mayor a la de finalización.", "Horario incorrecto");
                }
                else if(start == end){
                  toastr.error("La hora de inicio: "+horaini+" no debe ser igual a la de finalización.", "Horario incorrecto");
                }
                else{

              datos = {'cedulaPac': cedulaPac, 'motivo':motivo, 'start':start, 'end':end}

              $.ajax({
                url: 'controlador/agregarCita.php',
                type: "POST",
                data: datos,

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
                success: function(response) {
                  if(response.estado != 'OK'){
                  event.id= response.eventid;
                  $.loadingBlockHide();
                  $('#calendar').fullCalendar('renderEvent', event);

                  $('#ModalAdd').modal('hide');
                  toastr.success("La cita fué agendada", "Guardado exitoso!");
                }
                else{
                  toastr.error("Ocurrió un error al acceder", "No se Guardó");
                  setTimeout('document.location.reload()',1500);
                }
                },
                error: function(){
                    toastr.error("Ocurrió un error", "No se Guardó!");
                    setTimeout('document.location.reload()',1500);
                }
              });
            }
          });


            function edit(event)
            {
                start = event.start.format('YYYY-MM-DD HH:mm');
                if(event.end){
                  end = event.end.format('YYYY-MM-DD HH:mm');
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
          <script type="text/javascript" src="js/libraries/bootstrap-confirmation.js"></script>

    </body>
  </html>
