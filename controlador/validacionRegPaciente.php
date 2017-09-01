<?php
  include("conexion.php");

  $id_pac = $_POST['id_pac'];

  $consulta = mysqli_query($conexion,"SELECT * FROM paciente WHERE doc_pac = '$id_pac'");

   mysqli_data_seek($consulta, 0);

   $cod = "";

   while($ext = mysqli_fetch_array($consulta))
   {
     $doc = $ext['doc_pac'];
     $nombre = $ext['nombres_pac'];
     $apellido = $ext['apellidos_pac'];
     $sexo = $ext['sexo_pac'];
     $fechaNac = $ext['fechaNacimiento_pac'];
     $rh_pac = $ext['rh_pac'];
     $direccion_pac = $ext['direccion_pac'];
     $ciudad_pac = $ext['ciudad_pac'];
     $tel1 = $ext['telefono1_pac'];
     $tel2 = $ext['telefono2_pac'];
     $email = $ext['email_pac'];

     if($nombre)
     {
       $validacion = "Paciente registrado";
     }
     else
     {
       $validacion = "Ingresa el documento";
     }
     $cod =  $doc;

     echo json_encode(array("nombre"=>utf8_encode("$nombre"),"apellido"=>utf8_encode("$apellido"),
                            "sexo"=>"$sexo","fecha"=>"$fechaNac","rh"=>"$rh_pac","ciudad"=>utf8_encode("$ciudad_pac"),"direccion"=>utf8_encode("$direccion_pac"),
                            "tel1"=>"$tel1","tel2"=>"$tel2","email"=>utf8_encode("$email"),"validacion"=>"$validacion"));
   }

   if($_POST['id_pac']!= "$cod")
   {
        $error= "Paciente no registrado";
        echo json_encode(array("nombre"=>"","apellido"=>"","sexo"=> "","fecha"=>"","rh"=>"","ciudad"=>"","direccion"=>"","tel1"=>"",
                              "tel2"=>"","email"=>"","validacion"=>"$error"));
  }

?>
