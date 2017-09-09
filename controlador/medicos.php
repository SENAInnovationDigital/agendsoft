<?php
  include("conexion.php");

  $consultaMedicos = mysqli_query($conexion,"SELECT *
                            FROM medico");
  mysqli_close($conexion);
?>
