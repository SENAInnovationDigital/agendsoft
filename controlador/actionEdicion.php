<?php
//action.php
include 'crud.php';
$object = new Crud();
if(isset($_POST["action"]))
{
 if($_POST["action"] == "Load") //carga inicial
 {
  $record_per_page = 10;
  $page = '';

  if(isset($_POST["page"]))
  {
   $page = $_POST["page"];
  }
  else
  {
   $page = 1;
  }
  $start_from = ($page - 1) * $record_per_page;

  echo $object->get_data_in_table("SELECT id_pac,doc_pac,nombres_pac,apellidos_pac FROM paciente ORDER BY nombres_pac ASC  LIMIT $start_from, $record_per_page");
  echo '<br /><div align="center">';
  echo $object->make_pagination_link("SELECT id_pac,doc_pac,nombres_pac,apellidos_pac FROM Paciente ORDER by nombres_pac", $record_per_page);
  echo '</div><br />';
 }

//TRAER DATA INDIVIDUAL
 if($_POST["action"] == "Fetch Single Data")
 {
  $output = '';
  $query = "SELECT * FROM paciente WHERE id_pac = '".$_POST["user_id"]."'";
  $result = $object->execute_query($query);
  while($row = mysqli_fetch_array($result))
  {
    $output["user_id_H"] = $row['id_pac'];
    $output["cedula"] = $row['doc_pac'];
    $output["nombres"] = $row['nombres_pac'];
    $output["apellidos"] = $row['apellidos_pac'];
    $output["sexo"] = $row['sexo_pac'];
    $output["fechaNac"] = $row['fechaNacimiento_pac'];
    $output["sangre"] = $row['rh_pac'];
    $output["ciudad"] = $row['ciudad_pac'];
    $output["direccion"] = $row['direccion_pac'];
    $output["tel1"] = $row['telefono1_pac'];
    $output["tel2"] = $row['telefono2_pac'];
   $output["correo"] = $row['email_pac'];
  }
  echo json_encode($output);
 }


//EDITAR PACIENTE
 if($_POST["action"] == "Edit")
 {
  $nombres = $_POST["nombres"];
  $id_pac=  $_POST["user_id_H"];
  $cedula =  $_POST["cedula"];
  $apellidos =  $_POST["apellidos"];
  $sexo =  $_POST["sexo"];
  $fechaNac = $_POST["fechaNac"];
  $sangre = $_POST["sangre"];
  $ciudad =  $_POST["ciudad"];
  $direccion =  $_POST["direccion"];
  $tel1 =  $_POST["tel1"];
  $tel2 =  $_POST["tel2"];
  $correo =  $_POST["correo"];


 $query = "call editarPaciente('".$id_pac."','".$cedula."','".$nombres."','".$apellidos."','".$sexo."','".$fechaNac."',
  '".$sangre."','".$direccion."','".$ciudad."','".$tel1."','".$tel2."','".$correo."' )";
  //$query="UPDATE paciente set nombres_pac = '$nombres' where id_pac=1";//

  $object->execute_query($query);
  echo 'Data Updated';
  //echo $query;
 }


//BORRAR PACIENTE
 if($_POST["action"] == "Delete")
 {
  $query = "call eliminarPaciente('".$_POST["user_id"]."')";
  $object->execute_query($query);
  echo "Data Deleted";
 }

 if($_POST["action"] == "Search")
 {
  $search = mysqli_real_escape_string($object->connect, $_POST["query"]);
  $query = "SELECT * FROM paciente  WHERE nombres_pac LIKE '%".$search."%' OR doc_pac LIKE '%".$search."%'   ORDER BY nombres_pac DESC ";
  //echo $query;
  echo $object->get_data_in_table($query);
 }

}
?>
