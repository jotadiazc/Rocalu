<!DOCTYPE html>

<?php
session_start();
require 'logica/conexion.php';
if (!isset($_SESSION['nombre'])) {
  // code...
  header("location: login.php");
}
$nombre = $_SESSION['nombre'];
?>

<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Nueva Orden</title>

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all">

  <script>
    function AgregarRuta(){

  }

    function sendForm(){
      //$("#staticModal").modal('btnOK');
      document.getElementById("idBotonGenerarOrden").disabled = true;
      document.getElementById("btnOK").disabled = true;
      document.getElementById("formulario").submit();
    }

    function showData(str) {
      if (str.length == 0) {
        document.getElementById("idDireccionCliente").value = "";
        document.getElementById("idTelefonoCliente").value = "";
        document.getElementById("idCiudadCliente").value = "";
        document.getElementById("idPaisCliente").value = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            $response = this.responseText.replace(/\r?\n/g,"").trim();
            if ($response!=""){
             $datoscliente = $response.split("|");
             document.getElementById("idDireccionCliente").value = $datoscliente[0].trim().toUpperCase();
             document.getElementById("idTelefonoCliente").value = $datoscliente[1].trim().toUpperCase();
             document.getElementById("idCiudadCliente").value = $datoscliente[2].trim().toUpperCase();
             document.getElementById("idPaisCliente").value = $datoscliente[3].trim().toUpperCase();
           }else{
            document.getElementById("idDireccionCliente").value = "";
            document.getElementById("idTelefonoCliente").value = "";
            document.getElementById("idCiudadCliente").value = "";
            document.getElementById("idPaisCliente").value = "";
          }
        }
      };
      xmlhttp.open("GET", "getCliente.php?q=" + str, true);
      xmlhttp.send();
    }
  }
</script>



</head>

<body class="animsition">
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
      <div class="header-mobile__bar">
        <div class="container-fluid">
          <div class="header-mobile-inner">
            <a class="logo" href="index.html">
              <img src="images/icon/logo.png" alt="CoolAdmin" />
            </a>
            <button class="hamburger hamburger--slider" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <nav class="navbar-mobile">
        <div class="container-fluid">
          <ul class="navbar-mobile__list list-unstyled">
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i>Inicio</a>
              </li>

              <li class="has-sub">
                <a class="js-arrow" href="#">
                  <i class="fas fa-copy"></i>Nueva Orden</a>
                  <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                      <a href="nuevaorden.php">Propios</a>
                    </li>
                    <li>
                      <a href="crearConductor.html">Para Terceros</a>
                    </li>
                    <li>
                      <a href="crearTransporte.html">De terceros</a>
                    </li>
                  </ul>
                </li>


                <li>
                  <a href="listadoOrdenes.php">
                    <i class="fas fa-table "></i>Listado Ordenes</a>
                  </li>
                  <li class="has-sub">
                      <a class="js-arrow" href="#">
                          <i class="fas fa-copy"></i>Registrar</a>
                      <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                          <li>
                              <a href="crearCliente.html">Otros Ingresos</a>
                          </li>
                          <li>
                              <a href="crearConductor.html">Egresos</a>
                          </li>
                      </ul>
                  </li>

                  <li class="has-sub">
                      <a class="js-arrow" href="#">
                          <i class="fas fa-copy"></i>Crear</a>
                      <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                          <li>
                              <a href="crearCliente.html">Cliente</a>
                          </li>
                          <li>
                              <a href="crearConductor.html">Conductor</a>
                          </li>
                          <li>
                              <a href="crearTransporte.html">Transporte</a>
                          </li>
                      </ul>
                  </li>

                </ul>
              </div>
            </nav>
          </header>
          <!-- END HEADER MOBILE-->

          <!-- MENU SIDEBAR-->
          <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
              <a href="#">
                <img src="images/icon/logo.png" alt="Cool Admin" />
              </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
              <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                  <li class="has-sub">
                    <a class="js-arrow" href="#">
                      <i class="fas fa-tachometer-alt"></i>Inicio</a>

                    </li>

                    <li class="has-sub">
                      <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Nueva Orden</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                          <li>
                            <a href="nuevaorden.php">Propios</a>
                          </li>
                          <li>
                            <a href="crearConductor.html">Para Terceros</a>
                          </li>
                          <li>
                            <a href="crearTransporte.html">De terceros</a>
                          </li>
                        </ul>
                      </li>

                      <li>
                        <a href="listadoOrdenes.php">
                          <i class="fas fa-table"></i>Listado Ordenes</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Registrar</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="crearCliente.html">Otros Ingresos</a>
                                </li>
                                <li>
                                    <a href="crearConductor.html">Egresos</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Crear</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="crearCliente.html">Cliente</a>
                                </li>
                                <li>
                                    <a href="crearConductor.html">Conductor</a>
                                </li>
                                <li>
                                    <a href="crearTransporte.html">Transporte</a>
                                </li>
                            </ul>
                        </li>

                      </ul>
                    </nav>
                  </div>
                </aside>
                <!-- END MENU SIDEBAR-->

                <!-- PAGE CONTAINER-->
                <div class="page-container">
                  <!-- HEADER DESKTOP-->
                  <header class="header-desktop">
                    <div class="section__content section__content--p30">
                      <div class="container-fluid">
                        <div class="header-wrap">
                         <form class="form-header" action="" method="POST">
                          <h2 class="title-1">Crear Rutas</h2>

                        </form>
                        <div class="header-button">
                          <div class="noti-wrap">



                          </div>
                          <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                        <!-- <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                          </div> -->
                                          <div class="content">
                                            <?php

                                            echo '<a class="js-acc-btn" href="#">'.$nombre.'</a>';

                                            ?>
                                          </div>
                                          <div class="account-dropdown js-dropdown">

                                            <div class="account-dropdown__body">

                                              <div class="account-dropdown__footer">
                                                <a href="logica/salir.php">
                                                  <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </header>
                                <!-- HEADER DESKTOP-->

                                <!-- MAIN CONTENT-->
                                <div class="main-content">
                                  <div class="section__content section__content--p30">
                                    <div class="container-fluid">
                                      <form action="saveOrden.php" id="formulario" method="POST">
                                        <div class="row">
                                          <div class="col-lg-6">
                                              <div class="card">
                                                  <div class="card-header">Rutas</div>
                                                  <div class="card-body">
                                                      <div class="card-title">
                                                          <h3 class="text-center title-2">Desde - Hasta</h3>
                                                      </div>
                                                      <hr>
                                                      <form action="" method="post" novalidate="novalidate">
                                                        <div class="form-group">
                                                          <label for="company" class=" form-control-label">Pais Origen</label>
                                                          <div class="col-12 col-md-9">
                                                            <select name="idSelectCliente" id="idSelectCliente" class="form-control" onchange="showData(this.value)">
                                                              <option value="0">Seleccionar Pais</option>
                                                              <?php

                                                              $qry = 'SELECT * FROM pais';
                                                              $resultado = mysqli_query($conexion,$qry);
                                                              if (!$resultado) {
                                                                die('Consulta no válida: ' . mysql_error());
                                                              }

                                                              while (($fila = mysqli_fetch_array($resultado))!=NULL){

                                                                echo '<option value="'.$fila['ID'].'">'.strtoupper($fila['ID'].' '.$fila['DESCRIPCION']).'</option>';


                                                              }

                                                              ?>
                                                        </select>
                                                      </div>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="company" class=" form-control-label">Pais Destino</label>
                                                      <div class="col-12 col-md-9">
                                                        <select name="idSelectCliente" id="idSelectCliente" class="form-control" onchange="showData(this.value)">
                                                          <option value="0">Seleccionar Pasi</option>
                                                          <?php

                                                          $qry = 'SELECT * FROM pais';
                                                          $resultado = mysqli_query($conexion,$qry);
                                                          if (!$resultado) {
                                                            die('Consulta no válida: ' . mysql_error());
                                                          }

                                                          while (($fila = mysqli_fetch_array($resultado))!=NULL){

                                                            echo '<option value="'.$fila['ID'].'">'.strtoupper($fila['ID'].' '.$fila['PAIS']).'</option>';


                                                          }

                                                          ?>
                                                    </select>
                                                  </div>
                                                </div>



                                                      </form>
                                                  </div>
                                              </div>
                                          </div>


                                  <div class="col-lg-6">
                                      <div class="card">
                                          <div class="card-header">Rutas</div>
                                          <div class="card-body">
                                              <div class="card-title">
                                                  <h3 class="text-center title-2">Puntos </h3>
                                              </div>
                                              <hr>
                                              <form action="" method="post" novalidate="novalidate">
                                                <div class="form-group">
                                                  <label for="company" class=" form-control-label">Puntos</label>
                                                  <div class="col-12 col-md-9">
                                                    <select name="idSelectCliente" id="idSelectCliente" class="form-control" onchange="showData(this.value)">
                                                      <option value="0">Seleccionar Punto</option>
                                                      <?php

                                                      $qry = 'SELECT punto_ruta.DESCRIPCION as descripcion_ruta , pais.DESCRIPCION as descripcion_pasi from punto_ruta left join pais on punto_ruta.ID_PAIS = pais.ID';

                                                      $resultado = mysqli_query($conexion,$qry);
                                                      if (!$resultado) {
                                                        die('Consulta no válida: ' . mysql_error());
                                                      }

                                                      while (($fila = mysqli_fetch_array($resultado))!=NULL){

                                                        echo '<option value="'.$fila['RUT'].'">'.strtoupper($fila['descripcion_ruta'].'-'.$fila['descripcion_pasi']).'</option>';


                                                      }

                                                      ?>
                                                </select>
                                              </div>
                                            </div>
                                            <br/>




                                                  <div>
                                                      <button id="idBotonAgrgarRuta" type="button" onclick="AgregarRuta();" class="btn btn-lg btn-info btn-block">
                                                          <i class="fa fa-check fa-lg"></i>&nbsp;
                                                          <span id="payment-button-amount">Agregar Rutas</span>

                                                      </button>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>


                                </div>


                                                                      <!-- DATA TABLE-->
                                                                      <div class="table-responsive m-b-40">
                                                                        <table class="table table-borderless table-striped table-earning">
                                                                            <thead>
                                                                                <tr>
                                                                                  <th>Opciones</th>
                                                                                  <th>Pais</th>
                                                                                  <th>Nombre Punto</th>
                                                                              </tr>
                                                                          </thead>

                                                                          <tbody>
                                                                            <tr>
                                                                                <td>algo1</td>
                                                                                <td>100398</td>
                                                                                <td>iPhone X 64Gb Grey00000000000000000000000000000</td>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                <div>
                                  <button id="idBotonGenerarOrden" type="button" onclick="openConfirmation();" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-file fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Genera Orden</span>
                                    <!-- <span id="payment-button-sending" style="display:none;">Sending…</span> -->
                                  </button>
                                </div>

                                <form>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- Jquery JS-->
                <script src="vendor/jquery-3.2.1.min.js"></script>
                <!-- Bootstrap JS-->
                <script src="vendor/bootstrap-4.1/popper.min.js"></script>
                <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
                <!-- Vendor JS       -->
                <script src="vendor/slick/slick.min.js">
                </script>
                <script src="vendor/wow/wow.min.js"></script>
                <script src="vendor/animsition/animsition.min.js"></script>
                <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
                </script>
                <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
                <script src="vendor/counter-up/jquery.counterup.min.js">
                </script>
                <script src="vendor/circle-progress/circle-progress.min.js"></script>
                <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
                <script src="vendor/chartjs/Chart.bundle.min.js"></script>
                <script src="vendor/select2/select2.min.js">
                </script>

                <!-- Main JS-->
                <script src="js/main.js"></script>


                <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
                data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticModalLabel">Confirmación</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>
                        ¿Esta seguro de crear una nueva Orden de Transporte?
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <button type="button" id="btnOK" onclick="sendForm();" class="btn btn-primary">Si</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="staticModalError" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
              data-backdrop="static">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Error de Datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p id="textoError">

                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                  </div>
                </div>
              </div>
            </div>
          </body>

          </html>
          <!-- end document-->
