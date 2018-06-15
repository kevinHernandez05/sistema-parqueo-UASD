<?php 
    
    session_start();//inicia variables de sesion!
        
    if(!$_SESSION['logged']){
        //Si no esta logeado...
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistema de Parqueo V0.1 - Lab. de Prog. III - Proyecto Final</title>
  <!-- Bootstrap core CSS-->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">

  <!--Validator del formulario-->
  <script type="text/javascript" src="assets/js/validador-formulario-registro.js"></script>

  <!--Validador de la cedula-->
  <script src="assets/js/cedula-validador.js"></script>

</head>

 <!--Sidebard-->
<body class="fixed-nav sticky-footer bg-light" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">SISTEMA DE PARQUEO v0.1</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"><strong>Inicio</strong></span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Entrada / Salida</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="registrar_automovil.html">Registrar entrada de automóvil</a>
            </li>
            <li>
              <a href="registrar_salida_automovil.php">Registrar salida de automóvil</a>
            </li>
           </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="historial_parqueos.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Historial de parqueos</span>
          </a>
        </li>
       </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Estudiantes
              
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Particiantes:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small">Kevin Hernandez - 100272754</a>
            <a class="dropdown-item small">Marilenny Soriano - 100358990</a>
            <a class="dropdown-item small">Daniel Arturo Paredes - 100101611</a>
            <a class="dropdown-item small">Warlyn Estrella Polanco - FD6824</a>
            <a class="dropdown-item small">Omar de Jesus Duran - 100004726</a>
            <a class="dropdown-item small">Julio Cesar Geraldino Nuñez - NULL</a>
            

          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alertas
              <span class="badge badge-pill badge-warning">1 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Nuevas entradas y salidas:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Bienvenido al sistema, usuario</strong>
              </span>

              <!--Obtener la hora actual de sistema-->
              <span class="small float-right text-muted"><?php echo date("h") .":". date("i") ." ". date("A");?></span>
              <div class="dropdown-message small">Espero que tenga un gran dia.</div>
            </a>
            
        <li class="nav-item">
          
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Cerrar sesion</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a>Panel de control</a>
        </li>
        
      </ol>
      <div class="row">
        <div class="col-12">
                    
          <!--
          CONTENIDO DE LA PAGINA A PARTIR DE AQUI
          -->

          <div align="center">
            <h1>BIENVENIDO AL SISTEMA DE PARQUEO</h1>
            <h3>Ulitice la barra de la izquierda para navegar por el sistema</h3>
          </div>
			

        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Todos los derechos reservados © Sistema de parqueo V0.1  - <?php echo date("Y")?></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Salir...</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Cerrar sesion" para iniciar sesion con otro usuario.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <form method="POST" action="login.php">
              <button type="submit" class="btn btn-primary" name="logout">Cerrar sesion</button>
            </form>
            
            <?php
              //Codigo para cerrar sesion.

              if(isset($_POST['logout'])){
                
                //no hay sesion iniciada
                $_SESSION['logged'] = false;

                //te devolvemos a la pantalla de inicio de sesion
                header("location:login.php");
              }
            
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin.min.js"></script>
  </div>
</body>

</html>
