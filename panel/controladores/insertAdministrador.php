<?php
  include('../../controlador/conexion.php');

    $nom = mysqli_real_escape_string($conexion, $_POST['nom']);
    $ape = mysqli_real_escape_string($conexion,$_POST['ape']);
    $email = mysqli_real_escape_string($conexion,$_POST['email']);
    $user = mysqli_real_escape_string($conexion,$_POST['user']);
    $pass = mysqli_real_escape_string($conexion,$_POST['pass']);

    if(isset($nom) && isset($ape) && isset($email) && isset($user)){

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          echo "no";
          exit();
        }
        else{
          $sql_user = "SELECT * FROM administrador WHERE user ='$user'";
          $result = mysqli_query($conexion, $sql_user);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0){
              echo "no";
              exit();
          }
          else{
              //haciendo el hash al password
              $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
              //consulta insert
              $sql = "INSERT INTO administrador (nombre, apellidos, email, user, pass) VALUES('$nom', '$ape','$email','$user','$hashedPass')";

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
