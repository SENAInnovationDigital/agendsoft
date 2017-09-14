$(document).ready(function (){
  validate1();
  $('#ModalUserEdit2').on('keyup mousedown', validate2);
});

function validate2(){
  //$('#ModalUserEdit').keyup( function(){
  var a=0;
  $("#ModalUserEdit2 input[type=text],select,input[type=date]").each (function()
  {
    //if($('#ModalUserEdit').hasClass('in'))    document.getElementById($(this).attr("id")).style.backgroundColor = "White";
    if($(this).val().length > 0)
    {
      document.getElementById($(this).attr("id")).style.backgroundColor = "White";
      a+=1;
    }
    else
    {
      document.getElementById($(this).attr("id")).style.backgroundColor = "#ffa3a3";
    }

    if (a>=10)
    {
      $("#button_action").prop("disabled", false);
    }
    else
    {
      $("#button_action").prop("disabled", true);
    }
  });
};

function validate1(){
  $("#ModalUserEdit2 input[type=text],select,input[type=date]").each (function()
  {
    document.getElementById($(this).attr("id")).style.backgroundColor = "White";
  });
}
