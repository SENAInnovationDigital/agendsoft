<?php
session_start();

include('controlador/medicos.php');
 ?>

<nav class="navbar navbar-default  navbar-fixed-top">
    <div class="container navbar-all">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="main.php"><i class="fa fa-home" aria-hidden="true"></i>
          Agend Soft</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      </ul>

   <!-- Slider consulta, ingreso y edición de pacientess-->


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-md" aria-hidden="true"></i>
               Medicos<span class="caret"></span></a>
            <div class="dropdown-menu mega-dropdown-menu">
                    <div class="container-fluid">
                <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active">
                            <ul class="nav-list list-inline">
                              <?php
                                while ($medicos = mysqli_fetch_assoc($consultaMedicos))
                                 {
                                   echo'<li id="icon-busca"><a href="variableMedico?id_medico='.$medicos['doc_med'].'"><img class="img-med" height="80px;"src="'.$medicos['foto'].'" alt="">
                                         <span>'.$medicos['nombres_med'].'</span></a></li>';
                                  }
                               ?>
                                </ul>
                          </div>

                        </div>
                    </div>
                  <!-- Nav tabs -->
             </div>
       </li>
        <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i>
              Pacientes<span class="caret"></span></a>
            <div class="dropdown-menu mega-dropdown-menu">
                    <div class="container-fluid">
                <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active">
                            <ul class="nav-list list-inline">
                                <li id="icon-agregar"><a href="registropaciente.php"><i class="fa fa-user-plus fa-5x" aria-hidden="true"></i>
                                      <span>Agregar</span></a></li>
                                <li id="icon-editar"><a href="edicionpaciente.php"><i class="fa fa-user fa-5x" aria-hidden="true"></i>
                                  <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                      <span>Editar/Borrar</span></a></li>
                                </ul>
                          </div>

                        </div>
                    </div>
                  <!-- Nav tabs -->
             </div>
       </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
              if(isset($_SESSION['doc_sec']))
                {
                  echo '<i class="fa fa-user-circle-o" aria-hidden="true"></i>';
                  echo ' '.$_SESSION['nombres_sec'];
                }
              else if(isset($_SESSION['doc_med']))
                {
                  echo '<i class="fa fa-user-md" aria-hidden="true"></i>';
                  echo ' '.$_SESSION['nombres_med'];
                }
              elseif(isset($_SESSION['user_admin']))
                {
                  echo '<i class="fa fa-cogs" aria-hidden="true"></i>';
                  echo ' '.$_SESSION['nombre_admin'];
                }
              ?>
                  <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="/user/preferences">
                  <?php
                  if(isset($_SESSION['doc_med']))
                    {
                      echo '<img class="img-fluid rounded-circle" style="border-radius:50%"src="'.$_SESSION['foto_med'].'" height="80px" width="80px">';
                    }
                   ?>
                </a></li>
                <li><a href="/help/support"><i class="icon-envelope"></i> Contacto o id</a></li>
                <li class="divider"></li>
                <?php
                if(isset($_SESSION['user_admin']))
                  {
                echo '<li><a href=" logout.php"><i class="icon-off"></i>Agregar Médico</a></li>
                      <li><a href=" logout.php"><i class="icon-off"></i>Agregar Secretaria</a></li>
                      <li><a href=" logout.php"><i class="icon-off"></i>Cambiar Contraseña</a></li>';
                  }
                ?>
                <li class="divider"></li>
                <li><a href=" logout.php"><i class="icon-off"></i> Cerrar Sesión</a></li>
            </ul>
        </li>
     </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
