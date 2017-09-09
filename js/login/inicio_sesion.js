  $('#login-btn').click(function(e){
    e.preventDefault();

      var tipo = $('#login-type-id').val();
          username = $('#login-username').val();
          password = $('#login-password').val();

    if(tipo == ""){
      $('#hr-info').addClass("hr-blue");
      $('#small-info').html("Selecciona tipo de usuario");
    }
    else if (username == "") {
      $('#login-username').focus();
    }
    else if (password == "") {
      $('#login-password').focus();
    }
    else{
        $('#pret').html("");
        $("#pret").removeClass('fa fa-exclamation-triangle');


          datos ={"tipo":tipo, "username":username, "password":password}

          $.ajax({
            url: 'panel/login.php',
            type: 'POST',
            data: datos,

            beforeSend: function(){
              $("#pre").addClass('fa fa-spinner fa-spin fa-fw fa-2x');
            },
            success: function(html){
              if(html == 'OK'){
                $("#pre").removeClass('fa fa-spinner fa-spin fa-fw fa-2x');
                window.location.href='main.php';
              }
              else{
                $("#pre").removeClass('fa fa-spinner fa-spin fa-fw fa-2x');
                $("#pret").addClass('fa fa-exclamation-triangle');
                $("#pret").html("Usuario o contraseña incorrecta");
                $("#pret").css("color","red");
              }
            },
            error: function(){
              $("#pre").removeClass('fa fa-spinner fa-spin fa-fw fa-2x');
              $("#pre").addClass('fa fa-spinner fa-spin fa-fw fa-2x');

              alert("error en la conexión local o remota");
            }
          });
        }
  });

$('#btn-secretary').click(function(){
  $('#btn-medico').removeClass('btn-info');
  $('#btn-admin').removeClass('btn-info');
  $('#btn-secretary').removeClass('btn-outline-info');
  $('#hr-info').removeClass("hr-blue");
  $('#small-info').fadeOut();



  $('#btn-secretary').addClass('btn-info');

  $('#login-type-id').val("1");
  $('#login-type-user').fadeOut(500).html("Secretaria").fadeIn(500);


  });

  $('#btn-medico').click(function(){
    $('#btn-secretary').removeClass('btn-info');
    $('#btn-admin').removeClass('btn-info');
    $('#btn-medico').removeClass('btn-outline-info');
    $('#hr-info').removeClass("hr-blue");
    $('#small-info').fadeOut();


    $('#btn-medico').addClass('btn-info');

    $('#login-type-id').val("2");
    $('#login-type-user').fadeOut(500).html("Medico").fadeIn(500);
    });

    $('#btn-admin').click(function(){
      $('#btn-secretary').removeClass('btn-info');
      $('#btn-medico').removeClass('btn-info');
      $('#btn-admin').removeClass('btn-outline-info');
      $('#hr-info').removeClass("hr-blue");
      $('#small-info').fadeOut();

      $('#btn-admin').addClass('btn-info');

      $('#login-type-id').val("3");
      $('#login-type-user').fadeOut(500).html("Administrador").fadeIn(500);

      });
