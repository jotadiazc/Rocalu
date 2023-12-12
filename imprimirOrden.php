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


<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Imprimir orden</title>

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
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
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
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>

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

                            <li class="active">
                                <a href="listadoOrdenes.php">
                                    <i class="fas fa-table"></i>Listado Ordenes</a>
                                </li>


                        </ul>
                    </div>
                </nav>
            </header>
        <!-- END HEADER MOBILE-->



        <?php
        $q = $_REQUEST["id"];

        $sql = "select orden.*, chofer.RUT as chrut, chofer.NOMBRE as chfr, cliente.NOMBRE as clnt, transporte.MARCA as camMarca, transporte.MODELO as camModel, transporte.ANO as camAno, transporte.N_CHASIS as camChasis, transporte.N_MOTOR as camMotor
        , transporte.VENC_CHILE as camVencimientoChile, transporte.VENC_SEGURO as camVenSeguro,seguro.DESCRIPCION as seguro, t2.ID_TIPO_TRANSPORTE as engancheMarca, t2.MODELO as engancheModelo, t2.ANO as engancheAno, t2.PATENTE as enganchePatente, t2.N_CHASIS as engancheChasis, t2.FOLIO_SEGURO as enganchePoliza, t2.VENC_CHILE as engancheVencimientoChile, s2.DESCRIPCION as engancheSeguro from orden left join chofer on orden.RUT_CHOFER=chofer.RUT left join cliente on orden.RUT_CLIENTE=cliente.RUT  LEFT JOIN transporte on orden.PATENTE = transporte.PATENTE LEFT join seguro on seguro.ID = transporte.ID_ASEGURADORA LEFT JOIN transporte t2 on orden.PATENTE_ENGANCHE = t2.PATENTE
        LEFT JOIN seguro s2 on transporte.ID_ASEGURADORA = s2.ID where orden.ID=".$q;
        $consulta = mysqli_query($conexion, $sql);

        if (!$consulta) {
            die('Consulta no válida: ' . mysql_error());
        }
        while (($fila = mysqli_fetch_array($consulta))!=null) {
        	$rutCliente=$fila['RUT_CLIENTE'];
        	$patente=$fila['PATENTE'];
        	$chfr=$fila['chfr'];
        	$clnt=$fila['clnt'];
        	$dSalida=$fila['DIRECCION_SALIDA'];
        	$dLlegada=$fila['DIRECCION_LLEGADA'];
        	$observacion=$fila['OBSERVACION'];
          $chrut=$fila['chrut'];
          $camionMarca=$fila['camMarca'];
          $camionModelo=$fila['camModel'];
          $camionAno=$fila['camAno'];
          $camionChase=$fila['camChasis'];
          $camionMotor=$fila['camMotor'];
          $camionVenChile=$fila['camVencimientoChile'];
          $camionVenSeguro=$fila['camVenSeguro'];
          $seguro=$fila['seguro'];

          $engancheMarca=$fila['engancheMarca'];
          $engancheModelo=$fila['engancheModelo'];
          $engancheAno=$fila['engancheAno'];
          $enganchepatente=$fila['enganchePatente'];
          $engancheChasis=$fila['engancheChasis'];
          $engancheSeguro=$fila['engancheSeguro'];
          $enganchePoliza=$fila['enganchePoliza'];

          $engancheVencimientoChile=$fila['engancheVencimientoChile'];

          echo $rutCliente.'#'.$patente;

        }
        mysqli_close($conexion);
        ?>

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
                                <i href="index.html" class="fas fa-tachometer-alt"></i>Inicio</a>

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

                                <li class="active">
                                    <a href="listadoOrdenes.php">
                                        <i class="fas fa-chart-bar"></i>Listado Ordenes</a>
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
                                    <h2 class="title-1">Visualizar Ordenes</h2>

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
  <!-- END HEADER DESKTOP-->

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-6">


                              <div class="card">
                                  <div class="card-header">
                                      Datos Nahuil

                                  </div>
                                  <div class="card-body card-block">
                                      <form action="" method="post" class="form-horizontal">
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Razon Social</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="Transportes Nihuil ltda" class="input-sm form-control-sm form-control">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">CUIT</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="76.119.920-k" class="input-sm form-control-sm form-control">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label  for="input-small" class=" form-control-label">Direccion Fiscal</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="Av. Cinco 4300 block Q dpto A11" class="input-sm form-control-sm form-control">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">PAUIT</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="51720" class="input-sm form-control-sm form-control">
                                              </div>
                                          </div>


                                      </form>
                                  </div>

                              </div>


                              <div class="card">
                                  <div class="card-header">
                                      Datos Cliente

                                  </div>
                                  <div class="card-body card-block">
                                      <form action="" method="post" class="form-horizontal">
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Nombre</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $clnt;?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Identificador</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $rutCliente; ?>">
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>

                              <div class="card">
                                  <div class="card-header">
                                      Datos Conductor
                                  </div>
                                  <div class="card-body card-block">
                                      <form action="" method="post" class="form-horizontal">
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Nombre</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $chfr; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Identificador</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $chrut; ?>">
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>

                            </div>


                            <div class="col-lg-6">


                              <div class="card">
                                  <div class="card-header">
                                      Datos Transporte
                                  </div>
                                  <div class="card-body card-block">
                                      <form action="" method="post" class="form-horizontal">
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Marca</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $camionMarca; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Modelo</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $camionModelo; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Año</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $camionAno; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Patente</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $patente; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Chasis</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $camionChase; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Motor</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $camionMotor; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Seguro</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $seguro; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Vencimiento Seguro</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $camionVenSeguro; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Resolucion</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $chrut; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Vencimiento Permiso Chile</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $camionVenChile; ?>">
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>

                              <div class="card">
                                  <div class="card-header">
                                      Datos Enganche
                                  </div>
                                  <div class="card-body card-block">
                                      <form action="" method="post" class="form-horizontal">
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Marca</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $engancheMarca; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Modelo</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $engancheModelo; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Año</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $engancheAno; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Patente</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $enganchepatente; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Chasis</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $engancheChasis; ?>">
                                              </div>
                                          </div>

                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Seguro</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $engancheSeguro; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Poliza</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $enganchePoliza; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Resolucion</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $chrut; ?>">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-sm-5">
                                                  <label for="input-small" class=" form-control-label">Vencimiento Permiso Chile</label>
                                              </div>
                                              <div class="col col-sm-6">
                                                  <input disabled=""  type="text" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control" value="<?php echo $engancheVencimientoChile; ?>">
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>

                            </div>

                        </div>
                    </div>
                    <?php echo '<a href="app/reportes/ImpresionOrden.php?id='.$q.'" class="btn btn-lg btn-info btn-block" role="button" aria-pressed="true">Imprimir Orden</a>' ?>
                    <b>Seleccionar para Anular Orden</b>
                    <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />

                    <div id="content" style="display: none;">
                       <?php echo '<a href="saveAnularOrden.php?id='.$q.'" class="btn btn-lg btn-danger btn-block" role="button" aria-pressed="true">Anular Orden</a>' ?>
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

</body>

</html>
<!-- end document-->
