<?php
session_start();
require 'logica/conexion.php';
if (!isset($_SESSION['nombre'])) {
  // code...
	header("location: login.php");
}

$qry="UPDATE orden SET TS_ASIGNACION=NOW(), ESTADO=2, PATENTE='".$_POST['idSelectTransporte']."', PATENTE_ENGANCHE='".$_POST['idSelectTransporteEnganche']."', RUT_CHOFER='".$_POST['idSelectProfesional']."' WHERE ESTADO=1 AND ID=".$_POST['idTx'];

$resultado = mysqli_query($conexion,$qry);
if (!$resultado) {
	die('Consulta no válida: ' . mysqli_error());
}else
{
	header("location: listadoOrdenes.php");
}
mysqli_close($conexion);
?>