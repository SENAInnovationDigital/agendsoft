<?php
  include("conexion.php");

  $consultaTratamientos2 = mysqli_query($conexion,"SELECT id_trata, descripcion_tra
                            FROM tratamiento");
  mysqli_close($conexion);
?>
