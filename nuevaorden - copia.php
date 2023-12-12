<!DOCTYPE html>
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
        function showData(str) {
            if (str.length == 0) {
                document.getElementById("idDireccionCliente").innerHTML = "";
                document.getElementById("idTelefonocliente").innerHTML = "";
                document.getElementById("idCiudadCliente").innerHTML = "";
                document.getElementById("idPaisCliente").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        $datoscliente = this.responseText.split("|");
                        document.getElementById("idDireccionCliente").value = $datoscliente[0].trim();
                        document.getElementById("idTelefonoCliente").value = $datoscliente[1].trim();
                        document.getElementById("idCiudadCliente").value = $datoscliente[2].trim();
                        document.getElementById("idPaisCliente").value = $datoscliente[3].trim();
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
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="index.html">Dashboard 1</a>
                                    </li>
                                    <li>
                                        <a href="index2.html">Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="index3.html">Dashboard 3</a>
                                    </li>
                                    <li>
                                        <a href="index4.html">Dashboard 4</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="chart.html">
                                    <i class="fas fa-chart-bar"></i>jajaja</a>
                                </li>
                                <li>
                                    <a href="table.html">
                                        <i class="fas fa-table"></i>Tables</a>
                                    </li>
                                    <li>
                                        <a href="form.html">
                                            <i class="far fa-check-square"></i>Forms</a>
                                        </li>
                                        <li>
                                            <a href="calendar.html">
                                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                                            </li>
                                            <li>
                                                <a href="map.html">
                                                    <i class="fas fa-map-marker-alt"></i>Maps</a>
                                                </li>
                                                <li class="has-sub">
                                                    <a class="js-arrow" href="#">
                                                        <i class="fas fa-copy"></i>Pages</a>
                                                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                                            <li>
                                                                <a href="login.html">Login</a>
                                                            </li>
                                                            <li>
                                                                <a href="register.html">Register</a>
                                                            </li>
                                                            <li>
                                                                <a href="forget-pass.html">Forget Password</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-sub">
                                                        <a class="js-arrow" href="#">
                                                            <i class="fas fa-desktop"></i>UI Elements</a>
                                                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                                                <li>
                                                                    <a href="button.html">Button</a>
                                                                </li>
                                                                <li>
                                                                    <a href="badge.html">Badges</a>
                                                                </li>
                                                                <li>
                                                                    <a href="tab.html">Tabs</a>
                                                                </li>
                                                                <li>
                                                                    <a href="card.html">Cards</a>
                                                                </li>
                                                                <li>
                                                                    <a href="alert.html">Alerts</a>
                                                                </li>
                                                                <li>
                                                                    <a href="progress-bar.html">Progress Bars</a>
                                                                </li>
                                                                <li>
                                                                    <a href="modal.html">Modals</a>
                                                                </li>
                                                                <li>
                                                                    <a href="switch.html">Switchs</a>
                                                                </li>
                                                                <li>
                                                                    <a href="grid.html">Grids</a>
                                                                </li>
                                                                <li>
                                                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                                                </li>
                                                                <li>
                                                                    <a href="typo.html">Typography</a>
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
                                                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <!-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul> -->
                        </li>

                        <li class="active">
                            <a href="nuevaorden.php">
                                <i class="fas fa-chart-bar"></i>Nueva Orden</a>
                            </li>

                            <li>
                                <a href="chart.html">
                                    <i class="fas fa-chart-bar"></i>Charts</a>
                                </li>
                                <li>
                                    <a href="table.html">
                                        <i class="fas fa-table"></i>Tables</a>
                                    </li>
                                    <li>
                                        <a href="form.html">
                                            <i class="far fa-check-square"></i>Forms</a>
                                        </li>
                                        <li>
                                            <a href="calendar.html">
                                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                                            </li>
                                            <li>
                                                <a href="map.html">
                                                    <i class="fas fa-map-marker-alt"></i>Maps</a>
                                                </li>
                                                <li class="has-sub">
                                                    <a class="js-arrow" href="#">
                                                        <i class="fas fa-copy"></i>Pages</a>
                                                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                            <li>
                                                                <a href="login.html">Login</a>
                                                            </li>
                                                            <li>
                                                                <a href="register.html">Register</a>
                                                            </li>
                                                            <li>
                                                                <a href="forget-pass.html">Forget Password</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-sub">
                                                        <a class="js-arrow" href="#">
                                                            <i class="fas fa-desktop"></i>UI Elements</a>
                                                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                                <li>
                                                                    <a href="button.html">Button</a>
                                                                </li>
                                                                <li>
                                                                    <a href="badge.html">Badges</a>
                                                                </li>
                                                                <li>
                                                                    <a href="tab.html">Tabs</a>
                                                                </li>
                                                                <li>
                                                                    <a href="card.html">Cards</a>
                                                                </li>
                                                                <li>
                                                                    <a href="alert.html">Alerts</a>
                                                                </li>
                                                                <li>
                                                                    <a href="progress-bar.html">Progress Bars</a>
                                                                </li>
                                                                <li>
                                                                    <a href="modal.html">Modals</a>
                                                                </li>
                                                                <li>
                                                                    <a href="switch.html">Switchs</a>
                                                                </li>
                                                                <li>
                                                                    <a href="grid.html">Grids</a>
                                                                </li>
                                                                <li>
                                                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                                                </li>
                                                                <li>
                                                                    <a href="typo.html">Typography</a>
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
                                                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                                                <button class="au-btn--submit" type="submit">
                                                                    <i class="zmdi zmdi-search"></i>
                                                                </button>
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
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <!-- <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div> -->
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                    </div>


                                                    <div class="account-dropdown__footer">
                                                        <a href="#">
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
                                                  <strong>Seleccion Cliente</strong>
                                                  <!-- <small> Form</small> -->
                                              </div>
                                              <div class="card-body card-block">
                                                  <div class="form-group">
                                                      <label for="company" class=" form-control-label">Cliente</label>
                                                      <div class="col-12 col-md-9">
                                                          <select name="select" id="idSelectTipoCliente" class="form-control" onchange="showData(this.value)">

                                                            <?php
                                                            $conn = mysql_connect("localhost", "root", "");
                                                            mysql_select_db("nahuil", $conn);

                                                            if (!$conn) {
                                                                die("Connection failed: " . mysqli_connect_error());
                                                            }

                                                            $resultado = mysql_query('SELECT * FROM cliente');
                                                            if (!$resultado) {
                                                                die('Consulta no válida: ' . mysql_error());
                                                            }

                                                            while (($fila = mysql_fetch_array($resultado))!=NULL){

                                                                echo '<option value="'.$fila['RUT'].'">'.$fila['RUT'].' '.$fila['NOMBRE'].'</option>';


                                                            }



                                                            mysqli_close($conn);
                                                            ?>
                                                  <!-- <option value="0">Seleccionar Cliente</option>
                                                  <option value="1">Option #1</option>
                                                  <option value="2">Option #2</option>
                                                  <option value="3">Option #3</option> -->
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label for="street" class=" form-control-label">Direccion</label>
                                          <input type="text" id="idDireccionCliente" name="disabled-input" placeholder="Direccion cliente" disabled="" class="form-control">
                                      </div>
                                      <!-- <div class="row form-group">
                                          <div class="col-8">
                                              <div class="form-group">
                                                <label for="street" class=" form-control-label">Telefono</label>
                                                <input type="text" id="disabled-input" name="disabled-input" placeholder="Telefono cliente" disabled="" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="country" class=" form-control-label">Ciudad</label>
                                              <input type="text" id="disabled-input" name="disabled-input" placeholder="Ciudad cliente" disabled="" class="form-control">
                                          </div>
                                      </div> -->

                                      <div class="form-group">
                                          <label for="street" class=" form-control-label">Telefono</label>
                                          <input type="text" id="idTelefonoCliente" name="disabled-input" placeholder="Telefono cliente" disabled="" class="form-control">
                                      </div>

                                      <div class="form-group">
                                          <label for="street" class=" form-control-label">Ciudad</label>
                                          <input type="text" id="idCiudadCliente" name="disabled-input" placeholder="Ciudad cliente" disabled="" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <label for="country" class=" form-control-label">Pais</label>
                                          <input type="text" id="idPaisCliente" name="disabled-input" placeholder="Ciudad cliente" disabled="" class="form-control">
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Datos Viaje</strong>
                                    <!-- <small> Form</small> -->
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Tipo embarque</label>
                                        <div class="col-12 col-md-9">
                                            <select name="select" id="idSelectTipoEmbarque" class="form-control">
                                                <option value="0">Seleccionar Embarque</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Fecha Inicio</label>
                                        <input type="date" id="idFechaInicioViaje" placeholder="DE1234567890" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Fecha Llegada</label>
                                        <input type="date" id="idFechaTerminoViaje" placeholder="DE1234567890" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="country" class=" form-control-label">Salida</label>
                                        <input type="text" id="idSalidaViaje" placeholder="Lugar Salida" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="country" class=" form-control-label">Llegada</label>
                                        <input type="text" id="idLllegadaViaje" placeholder="Lugar Llegada" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="country" class=" form-control-label">Observacion</label>
                                        <input type="text" id="idObservacionviaje" placeholder="Indicar observacion breve" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Datos Chofer</strong>
                                    <!-- <small> Form</small> -->
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Ptofesional</label>
                                        <div class="col-12 col-md-9">
                                            <select name="select" id="idSelectProfesional" class="form-control">
                                                <option value="0">Seleccionar Ptofesional</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Codigo Profesional</label>
                                        <input type="text" id="idCodigoProfesional" name="disabled-input" placeholder="Codigo Profesional" disabled="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Telefono</label>
                                        <input type="text" id="idTelefonoProfesional" name="disabled-input" placeholder="Telefono Profesional" disabled="" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Datos Transporte</strong>
                                    <!-- <small> Form</small> -->
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Transporte</label>
                                        <div class="col-12 col-md-9">
                                            <select name="select" id="idSelectTransporte" class="form-control">
                                                <option value="0">Seleccionar Patente Camion</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Peso Maximo</label>
                                        <input type="text" id="idPesoMaximo" name="disabled-input" placeholder="Codigo Profesional" disabled="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Modelo</label>
                                        <input type="text" id="idModelo" name="disabled-input" placeholder="Telefono Profesional" disabled="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Marca</label>
                                        <input type="text" id="idMarca" name="disabled-input" placeholder="Telefono Profesional" disabled="" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                    <div>
                        <button id="idBotonGenerarOrden" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Genera Orden</span>
                            <!-- <span id="payment-button-sending" style="display:none;">Sending…</span> -->
                        </button>
                    </div>


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

</body>

</html>
<!-- end document-->
