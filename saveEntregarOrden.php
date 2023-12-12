<?php
session_start();
require 'logica/conexion.php';
if (!isset($_SESSION['nombre'])) {
  // code...
	header("location: login.php");
}

$qry="UPDATE orden SET OBSERVACION='".$_POST['idcomentario']."', TS_ENTREGA=NOW(), ESTADO=3, FECHA_ENTREGA='".$_POST['idFechaEntrega']."', RUT_RECEPTOR='".$_POST['idRutRecibe']."', NOMBRE_RECEPTOR='".$_POST['idNombreRecibe']."' WHERE ESTADO=2 AND ID=".$_POST['idTx'];

$resultado = mysqli_query($conexion,$qry);
if (!$resultado) {
	die('Consulta no válida: ' . mysqli_error());
}else
{
	header("location: listadoOrdenes.php");
}
mysqli_close($conexion);
?>