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
    function openConfirmation(){
      var txtError="";
      
      valor01 = new Date(document.getElementById("idFecha").value);
      if(valor01=="" || isNaN(valor01) ) {
        txtError="Ingrese una Fecha para el Ingreso.";
      }
      valorTxt = new Number(document.getElementById("idMonto").value);
      if(valorTxt==0 || isNaN(valorTxt)) {
        txtError="Ingrese un monto.";
      }
      indice = document.getElementById("idConcepto").selectedIndex;
      if( indice == null || indice == 0 ) {
        txtError="Seleccione un Concepto.";
      }
      if (txtError!="") {
        document.getElementById("textoError").innerHTML=txtError;
        $("#staticModalError").modal();
      }else{
        $("#staticModal").modal();
      }
    }

    function sendForm(){
      //$("#staticModal").modal('btnOK');
      document.getElementById("idBotonGenerarOrden").disabled = true;
      document.getElementById("btnOK").disabled = true;
      document.getElementById("formulario").submit();
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
                                                            <a href="registrarIngreso.php">Otros Ingresos</a>
                                                        </li>
                                                        <li>
                                                            <a href="registrarEgreso.php">Egresos</a>
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
                          <h2 class="title-1">Otros Ingresos</h2>

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
                                      <form action="saveRegistrarIngreso.php" id="formulario" method="POST">
                                        <div class="row">
                                          
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="card">
                                      <div class="card-header">
                                        <strong>Datos Ingreso</strong>
                                        <!-- <small> Form</small> -->
                                      </div>
                                      <div class="card-body card-block">

                                        <div class="form-group">
                                          <label for="company" class=" form-control-label">Concepto</label>
                                          <div class="col-12 col-md-9">
                                            <select name="idConcepto" id="idConcepto" class="form-control">
                                              <option value="0">Concepto</option>
                                              <?php

                                              $qry='SELECT * FROM concepto WHERE TIPO=1';
                                              $resultado = mysqli_query($conexion,$qry);
                                              if (!$resultado) {
                                                die('Consulta no válida: ' . mysql_error());
                                              }

                                              while (($fila = mysqli_fetch_array($resultado))!=NULL){

                                                echo '<option value="'.$fila['ID'].'">'.strtoupper($fila['DESCRIPCION']).'</option>';
                                              }

                                              mysqli_close($conn);
                                              ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="vat" class=" form-control-label">Fecha</label>
                                          <input type="date" name="idFecha" id="idFecha" placeholder="DE1234567890" class="form-control">
                                        </div>

                                        <div class="form-group">
                                          <label for="vat" class=" form-control-label">Monto</label>
                                          <input type="text" name="idMonto" id="idMonto" placeholder="Monto" class="form-control">
                                        </div>
                                        <div class="form-group">
                                          <label for="country" class=" form-control-label">Observación</label>
                                          <input type="text" name="idObservacion" id="idObservacion" placeholder="Indicar observacion breve" class="form-control">
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                </div>

                                <div>
                                  <button id="idBotonGenerarOrden" type="button" onclick="openConfirmation();" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Guardar Ingreso</span>
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
                        ¿Esta seguro de guardar el nuevo Ingreso?
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
