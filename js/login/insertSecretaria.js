
$('#btn-reg-sec').click(function(e){
  e.preventDefault();

      id_sec = $('#id_sec').val();
      nom_sec = $('#nom_sec').val();
      ape_sec = $('#ape_sec').val();
      tel = $('#tel').val();
      email_sec = $('#email_sec').val();
      user_sec = $('#user_sec').val();
      pass_sec = $('#pass_sec').val();

      if(id_sec == "" || nombres_sec == "" || ape_sec == "" ||
          tel == "" || email_sec =="" || user_sec == "" || pass_sec == ""){

        toastr.error("Revisa que los campos estén llenos", "Hace falta algo");
      }

      else {

      datos = {"id": id_sec, "nom": nom_sec, "ape": ape_sec, "tel": tel,
              "email": email_sec, "user": user_sec, "pass":pass_sec}

      $.ajax({
        url: 'panel/controladores/insertSecretaria.php',
        type: 'POST',
        data: datos,

        beforeSend: function(){
          $("#pre").addClass('fa fa-spinner fa-spin fa-fw');
        },
        success: function(html){
          if(html == 'OK'){
            $("#pre").removeClass('fa fa-spinner fa-spin fa-fw');
            toastr.success("La secretaria fué agregado", "Agregado");
            document.getElementById("form-reg-sec").reset();
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
    }
});
