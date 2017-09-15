$('#btn-reg-adm').click(function(e){
      e.preventDefault();

      nom = $('#nom_adm').val();
      ape = $('#ape_adm').val();
      email = $('#email_adm').val();
      user = $('#user_adm').val();
      pass = $('#pass_adm').val();

      if(nom == "" || ape == "" || email == "" || user == "" || pass ==""){
          toastr.error("Revisa que los campos estén llenos", "Hace falta algo");
      }
    else{
      datos = {"nom": nom, "ape": ape, "email": email,"user": user,"pass":pass}

      $.ajax({
        url: 'panel/controladores/insertAdministrador.php',
        type: 'POST',
        data: datos,

        beforeSend: function(){
          $("#pre").addClass('fa fa-spinner fa-spin fa-fw');
        },
        success: function(html){
          if(html == 'OK'){
            $("#pre").removeClass('fa fa-spinner fa-spin fa-fw');
            toastr.success("El Administrador fué agregado", "Agregado");
            document.getElementById("form-reg-adm").reset();
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
