<?php
include('conexion.php');
$name="";

if (isset( $_COOKIE['variable'] ))
{
  $name =$_COOKIE['variable'];
}

  else
  {
      $name =1;
  }


$consultaMedicos2 = mysqli_query($conexion,"SELECT nombres_med
                                            FROM medico
                                            WHERE id_med = '$name'");

  $num = mysqli_num_rows($consultaMedicos2);
  $row = mysqli_fetch_assoc($consultaMedicos2);

  mysqli_close($conexion);
 ?>
