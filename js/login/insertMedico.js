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
          alert("Cargando");
        },
        success: function(html){
          if(html == 'OK'){
            alert("bien");
            document.getElementById("form-reg-med").reset();
          }
          else{
            alert("error interno");
          }
        },
        error: function(){
          alert("error externo");
        }
      });
      return false;
});
