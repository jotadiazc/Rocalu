<?php
$host = "localhost";
$usuario ="root";
$clave="J5414650as";
$bd= "rocalu";

$conexion = mysqli_connect($host,$usuario,$clave,$bd);

if ($conexion) {
  // code...

}else {
  // code...
  header("location: ../error.php");
}

 ?>
