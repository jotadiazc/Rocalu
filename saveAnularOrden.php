<?php
session_start();
require 'logica/conexion.php';
if (!isset($_SESSION['nombre'])) {
  // code...
	header("location: login.php");
}

$qry="UPDATE orden SET TS_ANULACION=NOW(), ESTADO=5 WHERE ID=".$_GET['id'];

$resultado = mysqli_query($conexion,$qry);
if (!$resultado) {
	die('Consulta no válida: ' . mysqli_error());
}else
{
	header("location: listadoOrdenes.php");
}
mysqli_close($conexion);
?>