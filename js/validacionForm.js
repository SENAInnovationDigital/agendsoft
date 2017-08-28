$('#form-reg-pac').bootstrapValidator({

      message: 'Este valor no es valido',

  	   feedbackIcons:
       {
    		 valid: 'glyphicon glyphicon-ok',

    		 invalid: 'glyphicon glyphicon-remove',

    		 validating: 'glyphicon glyphicon-refresh'
  	    },

        fields: {

          id_pac: {
                validators: {
                    notEmpty: {
                        message: 'El documento de identidad es requerido'
                      },
                      stringLength: {
                       min: 5,
                       max: 15,
                       message: 'Longitud del documento no valida'
                   },
               }
          },
          nom_pac: {
              validators: {
                  notEmpty: {
                      message: 'El nombre es requerido'
                  }
            }
        },
        ape_pac: {
            validators: {
                notEmpty: {
                    message: 'El apellidos es requerido'
                }
          }
      },

        sex_pac: {
            validators: {
                notEmpty: {
                    message: 'El sexo es requerido'
                }
          }
      },

        nac_pac: {
            validators: {
                notEmpty: {
                    message: 'Fecha de nacimiento es requerido'
                }
          }
      },

        tiposangre_pac: {
            validators: {
                  notEmpty: {
                    message: 'Tipo de sangre es requerido'
                }
          }
      },

      ciu_pac: {
          validators: {
              notEmpty: {
                  message: 'La ciudad es requerida'
              }
        }
      },

        dir_pac: {
            validators: {
                notEmpty: {
                    message: 'La dirección es requerida'
                }
          }
        },

        tel1: {
            validators: {
                notEmpty: {
                    message: 'Número telefonico requerido'
                }
          }
        },

        email_pac: {
                 validators: {
                     emailAddress: {
                         message: 'La dirección de correo no es valida'
                     }
                 }
             },
    }
  })
  .on('success.form.bv', function(e) {
      // Prevent form submission
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
                $("#form-reg-pac").data('bootstrapValidator').resetForm();
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
