<?php
include('conexion.php');


$consultaMedicos2 = mysqli_query($conexion,"SELECT nombres_med
                                            FROM medico
                                            WHERE id_med = 1");

  $num = mysqli_num_rows($consultaMedicos2);
  $row = mysqli_fetch_assoc($consultaMedicos2);

  mysqli_close($conexion);
 ?>
