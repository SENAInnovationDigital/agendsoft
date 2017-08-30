<?php
include("conexion.php");

$id_pac = $_POST['id_pac'];

 $consulta = mysqli_query($conexion,"SELECT doc_pac, nombres_pac, apellidos_pac, telefono1_pac FROM paciente WHERE doc_pac = '$id_pac'");

 mysqli_data_seek($consulta, 0);

 $codigo = "";

 while($ext = mysqli_fetch_array($consulta)){
   $id = $ext['doc_pac'];
   $nombre = $ext['nombres_pac'];
   $apellido = $ext['apellidos_pac'];
   $tel1 = $ext['telefono1_pac'];
   if($nombre){
     $validacion = "Paciente registrado";
   }
   else{
   $validacion = "Ingresa el documento";
 }
   $codigo =  $id;

   echo json_encode(array("nombre"=>utf8_encode("$nombre"),"apellido"=>utf8_encode("$apellido"),"tel1"=>"$tel1","validacion"=>"$validacion"));
 }
 if($_POST['id_pac']!= "$codigo"){
      $error= "Paciente no registrado";
      echo json_encode(array("nombre"=>"","validacion"=>"$error"));

    }

?>
