// generamos un evento cada vez que se pulse una tecla
     $("#cedulaPac").keyup(function(){

           // enviamos una petición al servidor mediante AJAX enviando el id
   	// introducido por el usuario mediante POST

         $.post("./controlador/ajaxnompaciente.php", {"id_pac":$("#cedulaPac").val()}, function(data){
             // Si devuelve un nombre lo mostramos, si no, vaciamos la casilla
             if(data.nombre){
             var nom = data.nombre;
                 ape = data.apellido;
                 a = nom+' '+ape;
               $("#cita_pac").val(a);
             }
             else
               $("#cita_pac").val("");

             if(data.tel1)
               $("#ModalAdd #celular").val(data.tel1);
             else
               $("#ModalAdd #celular").val("");


             if(data.validacion)
 	$("#validacionPaciente").val(data.validacion);
 	else
 	 $("#validacionPaciente").val("");

             if(data.validacion == "Paciente no registrado"){
               $("#validacionPaciente").removeClass("reg-estado");
               $("#validacionPaciente").addClass("noreg-estado");
             }
             else if (data.validacion == "Ingresa el documento"){
               $("#validacionPaciente").removeClass("noreg-estado");
               $("#validacionPaciente").addClass("ing-estado");
             }
             else if (data.validacion == "Paciente registrado"){
               $("#validacionPaciente").addClass("reg-estado");
             }

         },"json");
     });
