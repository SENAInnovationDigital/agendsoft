<?php
  header('Access-Control-Allow-Origin: *');
  session_start();
  include('../controlador/conexion.php');

  $tipo = mysqli_real_escape_string($conexion, $_POST['tipo']);
  $username = mysqli_real_escape_string($conexion, $_POST['username']);
  $password = mysqli_real_escape_string($conexion, $_POST['password']);


  if(isset($tipo) && isset($username) && isset($password)){

    if($tipo == '1'){
      $query ="SELECT * FROM secretaria WHERE user_sec = '$username'";
      $resultado = mysqli_query($conexion, $query);
      $num = mysqli_num_rows($resultado);

      if($num == 1){
        if($row = mysqli_fetch_assoc($resultado)){
            //que el password coincida con el hash
            $hashedPass = password_verify($password, $row['pass_sec']);
            if($hashedPass == false){
              echo "false1";
              exit();
            }
            elseif($hashedPass == true){
              $_SESSION['doc_sec'] = $row['doc_sec'];
              $_SESSION['nombres_sec'] = $row['nombres_sec'];
              $_SESSION['apellidos_sec'] = $row['apellidos_sec'];
              $_SESSION['tel_sec'] = $row['telefono'];
              $_SESSION['email_sec'] = $row['email_sec'];
              $_SESSION['user_sec'] = $row['user_sec'];
              echo "OK";
              exit();
            }
        }
      }
      else{
        echo 'false1';
        exit();
      }
    }
    elseif($tipo == '2'){
      $query ="SELECT * FROM medico WHERE user_med = '$username'";
      $resultado = mysqli_query($conexion, $query);
      $num = mysqli_num_rows($resultado);

      if($num == 1){
        if($row = mysqli_fetch_assoc($resultado)){
            //que el password coincida con el hash
            $hashedPass = password_verify($password, $row['pass_med']);
            if($hashedPass == false){
              echo "false2";
              exit();
            }
            elseif($hashedPass == true){
              $_SESSION['id_med'] = $row['id_med'];
              $_SESSION['doc_med'] = $row['doc_med'];
              $_SESSION['nombres_med'] = $row['nombres_med'];
              $_SESSION['apellidos_med'] = $row['apellidos_med'];
              $_SESSION['especialidad_med'] = $row['especialidad_med'];
              $_SESSION['telefono_med'] = $row['telefono_med'];
              $_SESSION['email_med'] = $row['email_med'];
              $_SESSION['user_med'] = $row['user_med'];
              $_SESSION['foto_med'] = $row['foto'];
              echo "OK";
              exit();
            }
        }
      }
      else{
        echo 'false2';
      }
    }
    elseif($tipo == '3'){
        $query ="SELECT * FROM administrador WHERE user = '$username'";
        $resultado = mysqli_query($conexion, $query);
        $num = mysqli_num_rows($resultado);

        if($num == 1){
          if($row = mysqli_fetch_assoc($resultado)){
              //que el password coincida con el hash
              $hashedPass = password_verify($password, $row['pass']);
              if($hashedPass == false){
                echo "false3";
                exit();
              }
              elseif($hashedPass == true){
                $_SESSION['nombre_admin'] = $row['nombre'];
                $_SESSION['user_admin'] = $row['user'];
                echo "OK";
                exit();
              }
          }
        }
        else{
          echo 'false3';
        }
      }
    }
  else{
    echo "error";
    exit();
  }
?>
