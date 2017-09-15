$( "form#form-reg-med" ).submit(function(event) {
  event.preventDefault();

  var formData = new FormData(this);

      $.ajax({
        url: 'panel/controladores/insertMedico.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(){
          $("#pre").addClass('fa fa-spinner fa-spin fa-fw');
        },
        success: function(html){
          if(html == 'OK'){
            $("#pre").removeClass('fa fa-spinner fa-spin fa-fw');
            toastr.success("El Médico fué agregado", "Agregado");
            document.getElementById("form-reg-med").reset();
          }
          else{
            $("#pre").removeClass('fa fa-spinner fa-spin fa-fw');
            toastr.error("Ocurrió un error", "Error");
          }
        },
        error: function(){
          $("#pre").removeClass('fa fa-spinner fa-spin fa-fw');
          toastr.error("Fallas en la conexión local o remota", "Error");
        }
      });
      return false;
});
