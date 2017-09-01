
$("#id_pac").keyup(function(){
  $.post("./controlador/validacionRegPaciente.php", {"id_pac":$("#id_pac").val()}, function(data){

    if(data.nombre)
    {
      $("#nom_pac").val(data.nombre);
      $("#form-validate .form-vali").prop('disabled', true);
      $("#btn-reg-pac").prop('disabled', true);
      $("#btn-reg-pac").html("<i class='fa fa-user-o' aria-hidden='true'>"+"</i>"+' Paciente registrado');
    }
    else
    {
      $("#nom_pac").val("");
      $("#form-validate .form-vali").removeAttr('disabled');
      $("#btn-reg-pac").removeAttr('disabled');
      $("#btn-reg-pac").html("<i class='fa fa-floppy-o' aria-hidden='true'>"+"</i>"+' Registrar');
    }
    if(data.apellido)
    {
      $("#ape_pac").val(data.apellido);
    }
    else
      $("#ape_pac").val("");

    if(data.sexo){
      if(data.sexo == "M"){
        $("input[name=sex_mas]").prop('checked', true);
      }
      else if(data.sexo == "F"){
        $("input[name=sex_fem").prop('checked', true);
      }
    }
      else{
        $("input[name=sex_mas]").removeAttr('checked');
        $("input[name=sex_fem]").removeAttr('checked');
      }

        if(data.fecha)
          $("#nac_pac").val(data.fecha);
        else
          $("#nac_pac").val("");

        if(data.rh)
          $("#tiposangre_pac").val(data.rh);
        else
          $("#tiposangre_pac").val("");

        if(data.ciudad)
          $("#ciu_pac").val(data.ciudad);
        else
          $("#ciu_pac").val("");

        if(data.direccion)
          $("#dir_pac").val(data.direccion);
        else
          $("#dir_pac").val("");

        if(data.tel1)
          $("#tel1").val(data.tel1);
        else
          $("#tel1").val("");

        if(data.tel2)
          $("#tel2").val(data.tel2);
        else
          $("#tel2").val("");

        if(data.email)
          $("#email_pac").val(data.email);
        else
          $("#email_pac").val("");
  },"json");


});
