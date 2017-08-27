  $("#btn-reg-pc").click(function(e){
    e.preventDefault();

  var id =  $("#id_pac").val();
      nom = $("#nom_pac").val();
      ape = $("#ape_pac").val();
      sex = $("#sex_pac").val();
      nac = $("#nac_pac").val();
      tiposangre =  $("#tiposangre_pac").val();
      ciu = $("#ciu_pac").val();
      dir = $("#dir_pac").val();
      tel1 = $("#tel1").val();
      tel2 = $("#tel2").val();
      email = $("#email_pac").val();


      datos = {"id": id, "nom": nom, "ape": ape, "sex": sex, "nac": nac,
                "tiposangre": tiposangre, "ciu": ciu, "dir": dir,
                "tel1": tel1, "tel2": tel2, "email": email}
      $.ajax({
        url: 'controlador/agregarPaciente.php',
        type: 'POST',
        data: datos,

        beforeSend: function(){
          $("#pre").addClass('fa fa-spinner fa-spin fa-fw');
        },
        success: function(html){
          if(html == 'OK'){
            $("#pre").removeClass('fa fa-spinner fa-spin fa-fw');
            toastr.success("El paciente fué agregado", "Agregado");
            document.getElementById("form-reg-pac").reset();
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
  });
