<?php
    $conexion = mysqli_connect("localhost","root","root") or die("no se estableció conexion con la base de datos");
    mysqli_select_db($conexion,"agendsoft");
?>
