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
    <title>Asignar Orden</title>

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
            indice = document.getElementById("idSelectProfesional").selectedIndex;
            if( indice == null || indice == 0 ) {
                txtError="Seleccione un Conductor.";
            }
            indice = document.getElementById("idSelectTransporte").selectedIndex;
            if( indice == null || indice == 0 ) {
                txtError="Seleccione un Transporte.";
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

  function loadCamion(str) {
    if (str.length == 0) {
        document.getElementById("idPesoMaximo").value = "";
        document.getElementById("idModelo").value = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $response = this.responseText.replace(/\r?\n/g,"").trim();
                if ($response!=""){
                   $datoscliente = $response.split("|");
                   document.getElementById("idPesoMaximo").value = $datoscliente[0].trim().toUpperCase();
                   document.getElementById("idModelo").value = $datoscliente[1].trim().toUpperCase();
               }else{
                document.getElementById("idPesoMaximo").value = "";
                document.getElementById("idModelo").value = "";
            }
        }
    };
    xmlhttp.open("GET", "getCamion.php?q=" + str, true);
    xmlhttp.send();
}
}

function loadConductor(str) {
    if (str.length == 0) {
        document.getElementById("idTelefonoProfesional").value = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $response = this.responseText.replace(/\r?\n/g,"").trim();
                if ($response!=""){
                   $datoscliente = $response.split("|");
                   document.getElementById("idTelefonoProfesional").value = $datoscliente[0].trim().toUpperCase();
               }else{
                document.getElementById("idTelefonoProfesional").value = "";
            }
        }
    };
    xmlhttp.open("GET", "getConductor.php?q=" + str, true);
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

        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>

            <?php
            $idcliente = $_GET['id'];

            $qry = "SELECT orden.ID, orden.ESTADO, estado.DESCRIPCION as est, concat(cliente.RUT, '  ', cliente.NOMBRE) as clte, chofer.NOMBRE as chfer, orden.FECHA_INICIO_REQUERIDA, orden.FECHA_LLEGADA_REQUERIDA, orden.DIRECCION_SALIDA, orden.DIRECCION_LLEGADA, orden.OBSERVACION FROM orden LEFT JOIN cliente ON orden.RUT_CLIENTE=cliente.RUT LEFT JOIN chofer ON orden.RUT_CHOFER=chofer.RUT LEFT JOIN estado on estado.ID=orden.ESTADO where orden.ID = '". $idcliente."'";
            $resultado = mysqli_query($conexion,$qry);
            if (!$resultado) {
                die('Consulta no válida: ' . mysql_error());
            }

            while (($fila = mysqli_fetch_array($resultado))!=NULL){
               echo '<div class="card">';
               echo '<div class="card-header">';
               echo'<strong>Nº Orden: '.$fila["ID"].'</strong>';
               echo'</div>';

               echo'<div class="card-body card-block">';
               echo'<div class="form-group">';
               echo'<label for="company" class=" form-control-label">Nombre cliente</label>';
               echo'<input type="text" id="idNombreCliente" name="disabled-input" placeholder="'.$fila["clte"].'" disabled="" class="form-control">';
               echo'</div>';

               echo'<div class="form-group">';
               echo'<label for="vat" class=" form-control-label">Lugar Salida</label>';
               echo'<input type="text" id="idLugarSalida" name="disabled-input" placeholder="'.$fila["DIRECCION_SALIDA"].'" disabled="" class="form-control">';
               echo' </div>';

               echo'<div class="form-group">';
               echo'<label for="street" class=" form-control-label">Lugar Llegada</label>';
               echo'<input type="text" id="idLugarLlegada" name="disabled-input" placeholder="'.$fila["DIRECCION_LLEGADA"].'" disabled="" class="form-control">';
               echo'</div>';

               echo'<div class="form-group">';
               echo' <label for="street" class=" form-control-label">Fecha Inicio</label>';
               echo'<input type="text" id="idFechaInicio" name="disabled-input" placeholder="'.$fila["FECHA_INICIO_REQUERIDA"].'" disabled="" class="form-control">';
               echo'</div>';
               echo'<div class="form-group">';
               echo'<label for="street" class=" form-control-label">Fecha Llegada</label>';
               echo'<input type="text" id="idFecchaFin" name="disabled-input" placeholder="'.$fila["FECHA_LLEGADA_REQUERIDA"].'" disabled="" class="form-control">';
               echo'</div>';
               echo'</div>';
               echo'</div>';
           }

           ?>
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
                      <h2 class="title-1">Asignar Orden</h2>

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
                <form name="frmDatos" id="frmDatos" method="POST" action="saveAsignarOrden.php">
                    <input type="hidden" name="idTx" id="idTx" value="<?php echo $idTx;?>">
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Conductor</strong>
                                                <!-- <small> Form</small> -->
                                            </div>
                                            <div class="card-body card-block">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Conductor</label>
                                                    <div class="col-12 col-md-9">
                                                        <select id="idSelectProfesional" name="idSelectProfesional" class="form-control" onchange="loadConductor(this.value);">
                                                            <option value="0">Seleccionar Conductor</option>
                                                            <?php

                                                            $qry='SELECT * FROM chofer';
                                                            $resultado = mysqli_query($conexion,$qry);
                                                            if (!$resultado) {
                                                                die('Consulta no válida: ' . mysql_error());
                                                            }

                                                            while (($fila = mysqli_fetch_array($resultado))!=NULL){

                                                                echo '<option value="'.$fila['RUT'].'">'.strtoupper($fila['RUT'].' '. $fila['NOMBRE']).'</option>';
                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Teléfono</label>
                                                    <input type="text" id="idTelefonoProfesional" name="disabled-input" placeholder="Telefono Conductor" disabled="" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Transporte</strong>
                                                <!-- <small> Form</small> -->
                                            </div>
                                            <div class="card-body card-block">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Transporte</label>
                                                    <div class="col-12 col-md-9">
                                                        <select id="idSelectTransporte" name="idSelectTransporte" class="form-control" onchange="loadCamion(this.value);">
                                                            <option value="0">Seleccionar Camión</option>
                                                            <?php
                                                            $qry='SELECT * FROM transporte WHERE ID_TIPO_TRANSPORTE=1 AND ESTADO=1';

                                                            $resultado = mysqli_query($conexion,$qry);
                                                            if (!$resultado) {
                                                                die('Consulta no válida: ' . mysql_error());
                                                            }

                                                            while (($fila = mysqli_fetch_array($resultado))!=NULL){

                                                                echo '<option value="'.$fila['PATENTE'].'">'.strtoupper($fila['PATENTE'].' '. $fila['MARCA']).'</option>';
                                                            }

                                                            mysqli_close($conexion);
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Peso Máximo</label>
                                                    <input type="text" id="idPesoMaximo" name="disabled-input" placeholder="Peso Máximo" disabled="" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Modelo</label>
                                                    <input type="text" id="idModelo" name="disabled-input" placeholder="Modelo" disabled="" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer">
                                    <a href="listadoOrdenes.php"><button type="button" class="btn btn-danger btn-sm">Cancelar</button></a>

                                    <button type="button" onclick="openConfirmation();" class="btn btn-success btn-sm">Asignar</button>
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
            ¿Esta seguro de asignar la Orden de Transporte?
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
