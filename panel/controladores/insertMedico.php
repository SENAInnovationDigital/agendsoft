<?php
  include('../../controlador/conexion.php');

    $id_med = mysqli_real_escape_string($conexion, $_POST['id_med']);
    $nom_med = mysqli_real_escape_string($conexion,$_POST['nom_med']);
    $ape_med = mysqli_real_escape_string($conexion,$_POST['ape_med']);
    $esp_med = mysqli_real_escape_string($conexion,$_POST['esp_med']);

    $tel = mysqli_real_escape_string($conexion,$_POST['tel']);
    $email_med = mysqli_real_escape_string($conexion,$_POST['email_med']);
    $user_med = mysqli_real_escape_string($conexion,$_POST['user_med']);
    $pass_med = mysqli_real_escape_string($conexion,$_POST['pass_med']);

    $foto = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino = "../fotos/medicos/".$foto;
    $destino2 = "panel/fotos/medicos/".$foto;
    copy($ruta, $destino);

    if(isset($id_med) && isset($nom_med) && isset($user_med) && isset($pass_med)){

        if(!filter_var($email_med, FILTER_VALIDATE_EMAIL)){
          echo "no";
          exit();
        }
        else{
          $sql_user = "SELECT * FROM medico WHERE user_med ='$user_med'";
          $result = mysqli_query($conexion, $sql_user);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0){
              echo "no";
              exit();
          }
          else{
              //haciendo el hash al password
              $hashedPass = password_hash($pass_med, PASSWORD_DEFAULT);
              //consulta insert
              $sql = "call RegistroMedico('$id_med', '$nom_med', '$ape_med', '$esp_med', '$tel',
                                              '$email_med', '$user_med', '$hashedPass', '$destino2')";

              $consulta = mysqli_query($conexion, $sql);
              if($consulta){
                echo "OK";
                exit();
              }
              else{
                echo "no";
                exit();
              }
           }
        }
     }
?>
