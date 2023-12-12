<?php
session_start();
require 'logica/conexion.php';
if (!isset($_SESSION['nombre'])) {
  // code...
	header("location: login.php");
}

$qry="INSERT INTO orden (ESTADO, RUT_CLIENTE, ID_RUTA, FECHA_INICIO_REQUERIDA, FECHA_LLEGADA_REQUERIDA, TS_CREACION, DIRECCION_SALIDA, DIRECCION_LLEGADA, ID_EMBARQUE, OBSERVACION)";
$qry=$qry." VALUES(1,'".$_POST['idSelectCliente']."',".$_POST['idRuta'].",'".$_POST['idFechaInicioViaje']."','".$_POST['idFechaTerminoViaje']."',now(),'".$_POST['idSalidaViaje']."','".$_POST['idLlegadaViaje']."',".$_POST['idTipoEmbarque'].",'".$_POST['idObservacionViaje']."')";

$resultado = mysqli_query($conexion,$qry);
if (!$resultado) {
	die('Consulta no válida: ' . mysqli_error());
}else
{
	header("location: listadoOrdenes.php");
}
mysqli_close($conexion);
?>