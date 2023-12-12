<?php
$q = $_REQUEST["q"];
    $conn = mysql_connect("localhost", "root", "");
    mysql_select_db("nahuil", $conn);

    if (!$conn) {
        echo "";
    }

    $resultado = mysql_query("SELECT * FROM chofer where rut='".$q."'" );
    if (!$resultado) {
        echo "";
    }

    $res = "";

     while (($fila = mysql_fetch_array($resultado))!=NULL){

         $res = $fila['TELEFONO'];
     }

     echo $res;
//echo $h ;
    mysql_close($conn);
?>