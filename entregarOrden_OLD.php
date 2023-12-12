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
    <title>Entregar Orden</title>

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

        </header>
        <!-- END HEADER MOBILE-->

        <?php
        $q = $_REQUEST["id"];

        $sql = "select orden.*, chofer.NOMBRE as chfr, cliente.NOMBRE as clnt from orden left join chofer on orden.RUT_CHOFER=chofer.RUT left join cliente on orden.RUT_CLIENTE=cliente.RUT where estado=3 and id=".$q;
        $consulta = mysqli_query($conexion, $sql);
        while ($fila = mysqli_fetch_array($consulta)) {
        	$rutCliente=$fila['RUT_CLIENTE'];
        	$patente=$fila['PATENTE'];
        	$chfr=$fila['chfr'];
        	$clnt=$fila['clnt'];
        	$dSalida=$fila['DIRECCION_SALIDA'];
        	$dLlegada=$fila['DIRECCION_LLEGADA'];
        	$observacion=$fila['OBSERVACION'];
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


                <!-- TOP CAMPAIGN-->
                <div class="top-campaign">
                    <h3 class="title-3 m-b-30">Datos Orden</h3>
                    <div class="table-responsive">
                        <table class="table table-top-campaign">
                            <tbody>
                                <tr>
                                    <td>Numero Orden</td>
                                    <td>12345677</td>
                                </tr>
                                <tr>
                                    <td>Estado</td>
                                    <td>Enviado</td>
                                </tr>
                                <tr>
                                    <td>Creacion</td>
                                    <td>2019-09-09</td>
                                </tr>
                                <tr>
                                  <td>Asignacion</td>
                                  <td>2019-09-09</td>
                                </tr>
                                <tr>
                                  <td>Entrega</td>
                                  <td>2019-09-09</td>
                                </tr>
                                <tr>
                                  <td>Inicio</td>
                                  <td>2019-09-09</td>
                                </tr>
                                <tr>
                                  <td>Fin</td>
                                  <td>2019-09-09</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--  END TOP CAMPAIGN-->

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
                              <h2 class="title-1">Entregar Orden</h2>
                                <!-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." /> -->
                                <!-- <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button> -->
                            </form>
                            <div class="header-button">

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
                        <div class="row">

                            <div class="col-lg-6">

                              <div class="card">
                                <div class="card-header">
                                    <strong>Datos Entrega</strong>
                                    <!-- <small> Form</small> -->
                                </div>
                                <div class="card-body card-block">
                                  <div class="form-group">
                                      <label for="vat" class=" form-control-label">Fecha Entrega</label>
                                      <input type="date" id="idCodigoProfesional" name="disabled-input" placeholder="Fecha Entrega" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="vat" class=" form-control-label">Hora Entrega</label>
                                      <input type="time" id="idCodigoProfesional" name="disabled-input" placeholder="Hora Entrega" class="form-control">
                                  </div>
                                </div>
                              </div>

                                <div class="card">

                                    <div class="card-header">
                                        <strong>Datos Cliente</strong>
                                        <!-- <small> Form</small> -->
                                    </div>
                                    <div class="card-body card-block">
                                      <div class="form-group">
                                          <label for="vat" class=" form-control-label">RUT</label>
                                          <input type="text" id="idCodigoProfesional" name="disabled-input" placeholder="Codigo Cliente" disabled="" class="form-control" value="<?php echo $rutCliente;?>" >
                                      </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Nombre</label>
                                            <input type="text" id="idCodigoProfesional" name="disabled-input" placeholder="Nombre Cliente" disabled="" class="form-control" value="<?php echo $clnt; ?>">
                                        </div>

                                    </div>
                                </div>

                                <div class="card">

                                    <div class="card-header">
                                        <strong>Observacion</strong>
                                        <!-- <small> Form</small> -->
                                    </div>
                                    <div class="card-body card-block">
                                      <div class="row form-group">

                                          <div class="col-12 col-md-9">
                                              <textarea name="textarea-input" id="idcomentario" rows="9"  disabled="" placeholder="Comentario..." class="form-control"><?php echo $observacion?></textarea>
                                          </div>
                                      </div>
                                    </div>
                                </div>

                            </div>


                            <div class="col-lg-6">

                              <div class="card">
                                <div class="card-header">
                                    <strong>Datos Quien Recibe</strong>
                                    <!-- <small> Form</small> -->
                                </div>
                                <div class="card-body card-block">
                                  <div class="form-group">
                                      <label for="vat" class=" form-control-label">Nombre Recibe</label>
                                      <input type="text" id="idCodigoProfesional" name="disabled-input" placeholder="Nombre quien recibe" class="form-control">
                                  </div>

                                  <div class="form-group">
                                      <label for="vat" class=" form-control-label">Rut Recibe</label>
                                      <input type="text" id="idCodigoProfesional" name="disabled-input" placeholder="Rut quien Recibe" class="form-control">
                                      <!-- <script src="validarRUT.js"></script> -->
                                  </div>

                                </div>
                              </div>

                                <div class="card">
                                    <div class="card-header">
                                        <strong>Datos Transporte</strong>
                                        <!-- <small> Form</small> -->
                                    </div>
                                    <div class="card-body card-block">
                                      <div class="form-group">
                                          <label for="vat" class=" form-control-label">Patente</label>
                                          <input type="text" id="idPatente" name="disabled-input" placeholder="Patente" disabled="" class="form-control" value="<?php echo $patente; ?>">
                                      </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Conductor</label>
                                            <input type="text" id="idConductor" name="disabled-input" placeholder="Conductor" disabled="" class="form-control" value="<?php echo $chfr; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Direccion Salida</label>
                                            <input type="text" id="idDireccionSalida" name="disabled-input" placeholder="Direccion Salida" disabled="" class="form-control"  value="<?php echo $dSalida?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Direccion Llegada</label>
                                            <input type="text" id="idDireccionLlegada" name="disabled-input" placeholder="Direccion Llegada" disabled="" class="form-control" value="<?php echo $dLlegada?>">
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card-footer">
                            <a href="listadoOrdenes.php"><button type="submit" class="btn btn-danger btn-sm">Cancelar</button></a>
                            <button type="submit" class="btn btn-success btn-sm">Facturar</button>
                        </div>
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