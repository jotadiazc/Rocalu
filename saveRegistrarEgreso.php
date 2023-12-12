<?php
session_start();
require 'logica/conexion.php';
if (!isset($_SESSION['nombre'])) {
  // code...
	header("location: login.php");
}

$qry="INSERT INTO movimientos (TIPO,ID_CONCEPTO,FECHA,MONTO,RUT_CLIENTE,TIPO_DOC,FOLIO_DOC,TIPO_DOC_FACTURACION, FOLIO_DOC_FACTURACION, GLOSA, ESTADO) VALUES ";
$qry=$qry."(2,".$_POST['idConcepto'].",'".$_POST['idFecha']."',".$_POST['idMonto'].",'',0,0,2,0,'".$_POST['idObservacion']."',1)";
$resultado = mysqli_query($conexion,$qry);
if (!$resultado) {
	die('Consulta no válida: ' . mysqli_error());
}else
{
	header("location: index.php");
}
mysqli_close($conexion);
?>