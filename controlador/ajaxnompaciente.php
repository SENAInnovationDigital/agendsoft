<?php
include("conexion.php");

$id_pac = $_POST['id_pac'];

 $consulta = mysqli_query($conexion,"SELECT doc_pac, nombres_pac FROM paciente WHERE doc_pac = '$id_pac'");

 mysqli_data_seek($consulta, 0);

 $codigo = "";

 while($ext = mysqli_fetch_array($consulta)){
   $id = $ext['doc_pac'];

   $nombre = $ext['nombres_pac'];
   if($nombre){
     $validacion = "Paciente registrado";
   }
   else{
   $validacion = "Ingresa el documento";
 }
   $codigo =  $id;

   echo json_encode(array("nombre"=>"$nombre","validacion"=>"$validacion"));
 }

 if($_POST['id_pac']!= "$codigo"){
      $error= "Paciente no registrado";
      echo json_encode(array("nombre"=>"","validacion"=>"$error"));

    }

?>
