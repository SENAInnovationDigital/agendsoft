$(document).ready(function(){
  var url = window.location.pathname;

  if (url =="/agendsoft2/agendsoft/registropaciente.php") {
      $("#icon-agregar").addClass( "icono-agregar" );
  }
  else if(url =="/agendsoft2/agendsoft/buscarpaciente.php"){
      $("#icon-buscar").addClass( "icono-buscar" );
  }
  else if(url =="/agendsoft2/agendsoft/editarpaciente.php"){
      $("#icono-editar").addClass( "icono-editar" );
  }

});
