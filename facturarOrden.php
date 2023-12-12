<!DOCTYPE html>
<?php
session_start();
require 'logica/conexion.php';
if (!isset($_SESSION['nombre'])) {
  // code...
  header("location: login.php");
}
$nombre = $_SESSION['nombre'];
$idTx = $_GET['id'];
$q = $_REQUEST["id"];

$sql = "select orden.*, estado.DESCRIPCION as std, chofer.NOMBRE as chfr, cliente.NOMBRE as clnt from orden left join chofer on orden.RUT_CHOFER=chofer.RUT left join cliente on orden.RUT_CLIENTE=cliente.RUT left join estado ON orden.ESTADO=estado.ID where estado=3 and orden.id=".$q;
$consulta = mysqli_query($conexion, $sql);
while ($fila = mysqli_fetch_array($consulta)) {
    $std=$fila['std'];
    $tsCreacion=$fila['TS_CREACION'];
    $tsAsignacion=$fila['TS_ASIGNACION'];
    $tsEntrega=$fila['TS_ENTREGA'];
    $fInicio=$fila['FECHA_INICIO_REQUERIDA'];
    $fFin=$fila['FECHA_LLEGADA_REQUERIDA'];
    $rutCliente=$fila['RUT_CLIENTE'];
    $patente=$fila['PATENTE'];
    $chfr=$fila['chfr'];
    $clnt=$fila['clnt'];
    $dSalida=$fila['DIRECCION_SALIDA'];
    $dLlegada=$fila['DIRECCION_LLEGADA'];
    $observacion=$fila['OBSERVACION'];
}
if (!isset($rutCliente)){
  header("location: login.php");
}
mysqli_close($conexion);
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
    <title>Facturar</title>

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

      valorTxt = document.getElementById("idFolio").value;
      if( valorTxt == null || valorTxt.length == 0 || /^\s+$/.test(valorTxt) ) {
        txtError="Ingrese un Folio.";
      }
      valorTxt = document.getElementById("idTotal").value;
      if( valorTxt == null || valorTxt.length == 0 || /^\s+$/.test(valorTxt) ) {
        txtError="Ingrese un Total.";
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
      //document.getElementById("idBotonGenerarOrden").disabled = true;
      document.getElementById("btnOK").disabled = true;
      document.getElementById("frmDatos").submit();
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

        </header>
        <!-- END HEADER MOBILE-->

        <?php
        
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
                                <td>Número Orden</td>
                                <td><?php echo $q; ?></td>
                            </tr>
                            <tr>
                                <td>Estado</td>
                                <td><?php echo $std; ?></td>
                            </tr>
                            <tr>
                                <td>Creación</td>
                                <td><?php echo $tsCreacion; ?></td>
                            </tr>
                            <tr>
                              <td>Asignación</td>
                              <td><?php echo $tsAsignacion; ?></td>
                          </tr>
                          <tr>
                              <td>Entrega</td>
                              <td><?php echo $tsEntrega; ?></td>
                          </tr>
                          <tr>
                              <td>Inicio</td>
                              <td><?php echo $fInicio; ?></td>
                          </tr>
                          <tr>
                              <td>Fin</td>
                              <td><?php echo $fFin; ?></td>
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
                          <h2 class="title-1">Facturar</h2>
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
                <form id="frmDatos" name="frmDatos" method="POST" action="saveFacturarOrden.php">
                    <input type="hidden" name="idTx" id="idTx" value="<?php echo $idTx;?>">
                    <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $rutCliente;?>">
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-lg-6">

                                      <div class="card">
                                          <div class="card-header">
                                              <strong>Datos Factura</strong>
                                              <!-- <small> Form</small> -->
                                          </div>
                                          <div class="card-body card-block">
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Folio Factura</label>
                                                <input type="text" id="idFolio" name="idFolio" placeholder="Folio Factura" class="form-control">
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
                                              <input type="text" id="idRutCliente" name="idRutCliente" placeholder="Codigo Cliente" disabled="" class="form-control" value="<?php echo $rutCliente;?>" >
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
                                              <textarea name="idcomentario" id="idcomentario" rows="9" placeholder="Comentario..." class="form-control"><?php echo $observacion?></textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>


                          <div class="col-lg-6">

                              <div class="card">
                                  <div class="card-header">
                                      <strong>Datos Factura</strong>
                                      <!-- <small> Form</small> -->
                                  </div>
                                  <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Total Factura</label>
                                        <input type="text" id="idTotal" name="idTotal" placeholder="Total Factura" class="form-control">
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
                    <a href="listadoOrdenes.php"><button type="button" class="btn btn-danger btn-sm">Cancelar</button></a>
                    <button type="button" onclick="openConfirmation();" class="btn btn-success btn-sm">Facturar</button>
                </div>
            </div>
        </div>
    </div>
</form>
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
                                    ¿Esta seguro de realizar la facturación de la Orden de Transporte?
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
