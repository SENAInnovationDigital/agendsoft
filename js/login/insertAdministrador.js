$('#btn-reg-adm').click(function(e){
      e.preventDefault();

      nom = $('#nom_adm').val();
      ape = $('#ape_adm').val();
      email = $('#email_adm').val();
      user = $('#user_adm').val();
      pass = $('#pass_adm').val();

      datos = {"nom": nom, "ape": ape, "email": email,"user": user,"pass":pass}

      $.ajax({
        url: 'panel/controladores/insertAdministrador.php',
        type: 'POST',
        data: datos,

        beforeSend: function(){
          alert("Cargando");
        },
        success: function(html){
          if(html == 'OK'){
            alert("bien");
            document.getElementById("form-reg-adm").reset();
          }
          else{
            alert("error interno");
          }
        },
        error: function(){
          alert("error externo");
        }
      });
});
