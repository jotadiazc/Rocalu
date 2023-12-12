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
<script>
    function sample() {
            var x = document.getElementById('txt').value;
            window.open('imprimirOrden.php?id=3');
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
    <title>Listado Ordenes</title>
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
                                                      <h2 class="title-1">Listado de Ordenes</h2>

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

                    <!-- MAIN CONTENT-->
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- DATA TABLE -->
                                        <h3 class="title-5 m-b-35"></h3>
                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left">
                                                <div class="rs-select2--light rs-select2--md">
                                                    <select class="js-select2" name="property">
                                                        <option selected="selected">Filtro</option>
                                                        <option value="">Pendientes</option>
                                                        <option value="">Terminadas</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>

                                            </div>
                                            <div class="table-data__tool-right">


                                              <button type="submit" class="btn btn-primary btn-sm">
                                                  <i class="fa fa-dot-circle-o"></i> Exportar Excel
                                              </button>


                                          </div>
                                      </div>


                                      <!-- DATA TABLE-->
                                      <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                  <th>Opciones</th>
                                                  <th>Estado</th>
                                                  <th>Orden</th>
                                                  <th>Inicio</th>
                                                  <th>Llegada</th>
                                                  <th>Cliente</th>
                                                  <th>Conductor</th>

                                                  <th>Salida</th>
                                                  <th>Llegada</th>
                                                  <th>Observación</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                            <?php

                                            $qry = "SELECT orden.ID, orden.ESTADO, estado.DESCRIPCION as est, concat(cliente.RUT, '  ', cliente.NOMBRE) as clte, chofer.NOMBRE as chfer, orden.FECHA_INICIO_REQUERIDA, orden.FECHA_LLEGADA_REQUERIDA, orden.DIRECCION_SALIDA, orden.DIRECCION_LLEGADA, orden.OBSERVACION FROM orden LEFT JOIN cliente ON orden.RUT_CLIENTE=cliente.RUT LEFT JOIN chofer ON orden.RUT_CHOFER=chofer.RUT LEFT JOIN estado on estado.ID=orden.ESTADO";
                                            $resultado = mysqli_query($conexion,$qry);
                                            if (!$resultado) {
                                                die('Consulta no válida: ' . mysql_error());
                                            }

                                            while (($fila = mysqli_fetch_array($resultado))!=NULL){

                                                echo '<tr class="tr-shadow">';

                                                echo '<td><div class="table-data-feature">';


                                                        //INICIO BOTON
                                                if ($fila['ESTADO']==1) {
                                                            # code...

                                                            echo '<a href="imprimirOrden.php?id='.$fila['ID'].'"><button class="item" data-toggle="tooltip" data-placement="top" title="Ver Orden">
                                                            <i class="zmdi zmdi-eye"></i>
                                                            </button></a>';

                                                            echo '<a href="app/reportes/ImpresionOrden.php?id='.$fila['ID'].'"><button class="item" data-toggle="tooltip" data-placement="top" title="Imprimir">
                                                            <i class="zmdi zmdi-print"></i>
                                                            </button></a>';

                                                    echo '<a href="asignarOrden.php?id='.$fila['ID'].'"><button class="item" data-toggle="tooltip" data-placement="top" title="Asignar">
                                                    <i class="zmdi zmdi-mail-send"></i>
                                                    </button></a>';
                                                }

                                                if ($fila['ESTADO']==2) {
                                                            # code...

                                                            echo '<a href="imprimirOrden.php?id='.$fila['ID'].'"><button class="item" data-toggle="tooltip" data-placement="top" title="Ver Orden">
                                                            <i class="zmdi zmdi-eye"></i>
                                                            </button></a>';

                                                            echo '<a href="app/reportes/ImpresionOrden.php?id='.$fila['ID'].'"><button class="item" data-toggle="tooltip" data-placement="top" title="Imprimir">
                                                            <i class="zmdi zmdi-print"></i>
                                                            </button></a>';

                                                    echo '<a href="entregarOrden.php?id='.$fila['ID'].'"><button class="item" data-toggle="tooltip" data-placement="top" title="Entregar">
                                                    <i class="zmdi zmdi-truck" ></i>
                                                    </button></a>';


                                                }

                                                if ($fila['ESTADO']==3) {
                                                            # code...

                                                            echo '<a href="imprimirOrden.php?id='.$fila['ID'].'"><button class="item" data-toggle="tooltip" data-placement="top" title="Ver Orden">
                                                            <i class="zmdi zmdi-eye"></i>
                                                            </button></a>';

                                                            echo '<a href="app/reportes/ImpresionOrden.php?id='.$fila['ID'].'"><button class="item" data-toggle="tooltip" data-placement="top" title="Imprimir">
                                                            <i class="zmdi zmdi-print"></i>
                                                            </button></a>';

                                                    echo '<a href="facturarOrden.php?id='.$fila['ID'].'"><button class="item" data-toggle="tooltip" data-placement="top" title="Facturar">
                                                    <i class="zmdi zmdi-money"></i>
                                                    </button></a>';

                                                }


                                                echo '</div></td>';
                                                        //FIN BOTON

                                                echo '<td>'.$fila['est'].'</td>';
                                                echo '<td>'.$fila['ID'].'</td>';
                                                echo '<td>'.$fila['FECHA_INICIO_REQUERIDA'].'</td>';
                                                echo '<td>'.$fila['FECHA_LLEGADA_REQUERIDA'].'</td>';
                                                echo '<td>'.$fila['clte'].'</td>';
                                                echo '<td>'.$fila['chfer'].'</td>';

                                                echo '<td>'.$fila['DIRECCION_SALIDA'].'</td>';
                                                echo '<td>'.$fila['DIRECCION_LLEGADA'].'</td>';
                                                echo '<td>'.$fila['OBSERVACION'].'</td>';
                                                echo '</tr>';
                                            }

                                            mysqli_close($conexion);
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">

                            </div>
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
