<?php
session_start();
require 'logica/conexion.php';
if (!isset($_SESSION['nombre'])) {
  // code...
	header("location: login.php");
}

$qry="UPDATE orden SET OBSERVACION='".$_POST['idcomentario']."', TS_FACTURACION=NOW(), ESTADO=4 WHERE ESTADO=3 AND ID=".$_POST['idTx'];

$resultado = mysqli_query($conexion,$qry);
if (!$resultado) {
	die('Consulta no válida: ' . mysqli_error());
}

$qry="INSERT INTO movimientos (TIPO,ID_CONCEPTO,FECHA,MONTO,RUT_CLIENTE,TIPO_DOC,FOLIO_DOC,TIPO_DOC_FACTURACION, FOLIO_DOC_FACTURACION, GLOSA, ESTADO) VALUES ";
$qry=$qry."(1,1,NOW(),".$_POST['idTotal'].",'".$_POST['idCliente']."',1,".$_POST['idTx'].",2,".$_POST['idFolio'].",'".$_POST['idcomentario']."',1)";
$resultado = mysqli_query($conexion,$qry);
if (!$resultado) {
	die('Consulta no válida: ' . mysqli_error());
}else
{
	header("location: listadoOrdenes.php");
}

mysqli_close($conexion);
?>