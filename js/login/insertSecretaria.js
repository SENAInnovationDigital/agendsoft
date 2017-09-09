
$('#btn-reg-sec').click(function(e){
  e.preventDefault();

      id_sec = $('#id_sec').val();
      nom_sec = $('#nom_sec').val();
      ape_sec = $('#ape_sec').val();
      tel = $('#tel').val();
      email_sec = $('#email_sec').val();
      user_sec = $('#user_sec').val();
      pass_sec = $('#pass_sec').val();



      datos = {"id": id_sec, "nom": nom_sec, "ape": ape_sec, "tel": tel,
              "email": email_sec, "user": user_sec, "pass":pass_sec}

      $.ajax({
        url: 'panel/controladores/insertSecretaria.php',
        type: 'POST',
        data: datos,

        beforeSend: function(){
          alert("Cargando");
        },
        success: function(html){
          if(html == 'OK'){
            alert("bien");
            document.getElementById("form-reg-sec").reset();
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
