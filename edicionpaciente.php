<?php
//index.php
include 'controlador/crud.php';
$object = new Crud();
?>
<html>
<head>
  <title>Agend Soft</title>
  <script src="js/libraries/jquery.js"></script>
  <script src="js/libraries/bootstrap.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="css/toastr.min.css">
  <link rel="stylesheet" href="css/bootstrapValidator.min.css">

  <style>
  .box{
    height: 100%;
  }
  </style>

</head>
<body>
  <?php
  include("estructura/navbar.php");
  ?>
  <div class="container box">
    <div class="well well-sm">
      <legend class="text-center headercontact">Consulta, Edicion y Eliminacion de Pacientes</legend>

      <div class="col-md-4">
        <input type="text" name="search" id="search" placeholder="Buscar Paciente" class="form-control" />
      </div>
      <br />
      <br />

      <div class="modal fade" id="ModalUserEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content" id="ModalUserEdit2" >
            <form method="post" id="user_form" class="form-horizontal">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Paciente</h4>
              </div>
              <div class="modal-body" >
                <div class="form-group">
                  <label class="col-sm-2 control-label">Cedula  </label>
                  <div class="col-sm-10">
                    <input type="text" name="cedula" id="cedula" class="form-control" placeholder="cedula" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nombres  </label>
                  <div class="col-sm-10">
                    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Apellidos  </label>
                  <div class="col-sm-10">
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Sexo  </label>
                  <div class="col-sm-10">
                    <select name="sexo" class="form-control form-vali" id="sexo">
                      <option style="" value="M">Masculino</option>
                      <option style="" value="F">Femenino</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Fecha nacimiento  </label>
                  <div class="col-sm-10">
                    <input type="date" name="fechaNac" id="fechaNac" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tipo Sangre  </label>
                  <div class="col-sm-10">
                    <select name="sangre" class="form-control form-vali" id="sangre">
                      <option style="" value="A+">A+</option>
                      <option style="" value="A-">A-</option>
                      <option style="" value="O+">O+</option>
                      <option style="" value="O-">O-</option>
                      <option style="" value="B+">B+</option>
                      <option style="" value="B-">B-</option>
                      <option style="" value="AB+">AB+</option>
                      <option style="" value="AB-">AB-</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Ciudad  </label>
                  <div class="col-sm-10">
                    <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Direccion  </label>
                  <div class="col-sm-10">
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono  </label>
                  <div class="col-sm-10">
                    <input type="text" name="tel1" id="tel1" class="form-control" placeholder="Telefono">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefono alternativo </label>
                  <div class="col-sm-10">
                    <input  name="tel2" id="tel2" class="form-control" placeholder="Telefono Alternativo">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Correo </label>
                  <div class="col-sm-10">
                    <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo">
                  </div>
                </div>

                <div >
                  <input type="hidden" name="action" id="action" >
                  <input type="hidden" name="user_id_H" id="user_id_H" >

                  <input type="button" name="button_action" id="button_action" class="btn btn-default" value="" />
                  <input type="button" name="button_cancel" id="button_cancel" class="btn btn-default" value="Cancel Update" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div id="user_table" class="table-responsive">
      </div>
    </div>
  </div>
  <?php
  include("estructura/footer.php");
  ?>
  <script src="js/libraries/bootbox.min.js"></script>
  <script type="text/javascript" src="js/libraries/toastr.min.js"></script>
  <script src="js/libraries/jquery.loading.block.js"></script>
  <script src="js/validarEdicion.js"></script>



</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  load_data(1);

  function load_data(page)
  {
    var action = "Load";
    $.ajax({
      url:"controlador/actionEdicion.php",
      method:"POST",
      data:{action:action, page:page},
      success:function(data)
      {
        $('#user_table').html(data);
      },
      complete:function()
      {
      }
    });
  }

  $(document).on('click', '.pagination_link', function(){
    var page = $(this).attr("id");
    var subpage=page.substring(3);
    load_data(subpage);
  });


  //Boton EDITAR
  $('#user_form #button_action').click(function(){
    //  event.preventDefault();
    bootbox.confirm("esta seguro de editar la informacion del paciente?", function(result2){
      if(result2)
      {
        $.ajax({
          url:"controlador/actionEdicion.php",
          data:new FormData(user_form),
          contentType:false,
          processData:false,
          type:"POST",
          beforeSend: function(){
            $.loadingBlockShow({
              style: {
                position: 'fixed',
                width: '100%',
                height: '100%',
                background: 'rgba(255, 255, 255, .5)',
                left: 0,
                top: 0,
                zIndex: 10000
              }
            });
          },
          success:function(data)
          {
            $('#ModalUserEdit').modal("hide");
            load_data();
          },
          complete:function()
          {
            $.loadingBlockHide();
            toastr.info("la informacion del Paciente ha sido Editada ", "EDITADO!!");
          }
        })
      }
    });
  });


  //ACTUALIZAR PACIENTE
  $(document).on('click', '.update', function(){

    $.getScript("js/validarEdicion.js");

    var user_id = $(this).attr("id");
    var action = "Fetch";

    $.ajax({
      url:"controlador/actionEdicion.php",
      type: "POST",
      dataType: "json",
      data:{user_id:user_id, action:action},

      success:function(data)
      {
        console.log(JSON.stringify(data));
        alert(data.cedula);

        $('#ModalUserEdit').modal("show");
        $("#button_action").prop("disabled", true);

        $('#user_id_H').val(data.user_id_H);
        $('#cedula').val(data.cedula);

        $('#nombres').val(data.nombre);
        $('#apellidos').val(data.apellidos);
        $('#sexo').val(data.sexo);
        $('#fechaNac').val(data.fechaNac);
        $('#sangre').val(data.sangre);
        $('#ciudad').val(data.ciudad);
        $('#direccion').val(data.direccion);
        $('#tel1').val(data.tel1);
        $('#tel2').val(data.tel2);
        $('#correo').val(data.correo);

        $('#button_action').val("editar");
        $('#action').val("Edit");


        $('#button_cancel').click(function(){
          $('#ModalUserEdit').modal("hide");
        });
      },
      error: function(){
        alert("Hubo un error");
      },
    });

  });


  //BORAR PACIENTE
  $(document).on('click', '.delete', function(){
    var user_id = $(this).attr("id");

    var nombres = $(this).attr("data-nom");
    var action = "Delete";
    bootbox.confirm("Esta seguro de eliminar al paciente "+nombres+
    " de la base de datos? <br>Tener en cuenta que esta operacion es IRREVERSIBLE!!!", function(result2){
      if(result2)
      {
        $.ajax({
          url:"controlador/actionEdicion.php",
          method:"POST",
          data:{user_id:user_id, action:action},
          beforeSend: function(){
            $.loadingBlockShow({
              style: {
                position: 'fixed',
                width: '100%',
                height: '100%',
                background: 'rgba(255, 255, 255, .5)',
                left: 0,
                top: 0,
                zIndex: 10000
              }
            });
          },
          success:function(data)
          {
            load_data();
          },
          complete:function()
          {
            $.loadingBlockHide();
            toastr.error("Paciente Eliminado de la  base  de datos", "ELIMINADO");
          }
        });
      }
    });
  });


  //BUSQUEDA
  $('#search').keyup(function(){
    var query = $('#search').val();
    var action = "Search";
    if(query != '')
    {
      $.ajax({
        url:"controlador/actionEdicion.php",
        method:"POST",
        data:{query:query, action:action},
        success:function(data)
        {
          $('#user_table').html(data);
        }
      });
    }
    else
    {
      load_data();
    }
  });

});
</script>
