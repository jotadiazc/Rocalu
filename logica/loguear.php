<?php
require 'conexion.php';
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$q ="select * from usuarios where USUARIO = '$usuario' and CONTRASENA = '$clave'";
$consulta = mysqli_query($conexion,$q);
$array = mysqli_fetch_array($consulta);

if ($consulta->num_rows>0) {
  // code...
  $_SESSION['usarname']=$usuario;
  $_SESSION['nombre'] = $array['NOMBRE'];

  header("location: ../index.php");
}else {
  // code...
  $_SESSION['usarname']="";
  header("location: ../login.php");
}
 ?>
