<?php
  include('../../controlador/conexion.php');

    $id_sec = mysqli_real_escape_string($conexion, $_POST['id']);
    $nom_sec = mysqli_real_escape_string($conexion,$_POST['nom']);
    $ape_sec = mysqli_real_escape_string($conexion,$_POST['ape']);
    $tel = mysqli_real_escape_string($conexion,$_POST['tel']);
    $email_sec = mysqli_real_escape_string($conexion,$_POST['email']);
    $user_sec = mysqli_real_escape_string($conexion,$_POST['user']);
    $pass_sec = mysqli_real_escape_string($conexion,$_POST['pass']);

    if(isset($id_sec) && isset($nom_sec) && isset($user_sec) && isset($pass_sec)){

        if(!filter_var($email_sec, FILTER_VALIDATE_EMAIL)){
          echo "no";
          exit();
        }
        else{
          $sql_user = "SELECT * FROM secretaria WHERE user_sec ='$user_sec'";
          $result = mysqli_query($conexion, $sql_user);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0){
              echo "no";
              exit();
          }
          else{
              //haciendo el hash al password
              $hashedPass = password_hash($pass_sec, PASSWORD_DEFAULT);
              //consulta insert
              $sql = "call registroSecretaria('$id_sec', '$nom_sec', '$ape_sec', '$tel',
                                              '$email_sec', '$user_sec', '$hashedPass')";

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
