<?php
  include("conexion.php");

  $consultaTratamientos = mysqli_query($conexion,"SELECT id_trata, descripcion_tra
                            FROM tratamiento");
  mysqli_close($conexion);
?>
