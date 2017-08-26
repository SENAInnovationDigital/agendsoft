
$(document).ready(function(){
  $("#guardP").click(function(e){
     e.preventDefault();
     var id_cit = $('#id_cit').val();
          eliminar= $('#delete').val();
          motivo = $('#color').val();
          end = $('#end').val();
          start = $('#start').val();
          data = {"id_cit": id_cit, "eliminar": eliminar, "motivo":motivo, "end": end, "start": start}

     $.ajax({
       url: 'controlador/editEventTitle.php',
       type: "POST",
       data: data,
       success: function(rep) {
         if(rep == 'OK'){
           toastr.info("La cita fué Eliminada/Actualizada", "Guardado");
           $('#calendar').fullCalendar( 'refetchEvents' );
         }else{
           alert('No se pudo guardar, revisa la conexión.');
         }
       }
     });
    });
 });
