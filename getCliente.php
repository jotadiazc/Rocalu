    <?php
    $q = $_REQUEST["q"];
    $conn = mysql_connect("localhost", "root", "");
    mysql_select_db("nahuil", $conn);

    if (!$conn) {
        echo "";
    }

    $resultado = mysql_query("SELECT * FROM cliente LEFT JOIN pais ON cliente.ID_PAIS=pais.ID where rut='".$q."'" );
    if (!$resultado) {
        echo "";
    }

    $res = "";

     while (($fila = mysql_fetch_array($resultado))!=NULL){

         $res = $fila['DIRECCION'].'|'.$fila['TELEFONO'].'|'.$fila['CIUDAD'].'|'.$fila['DESCRIPCION'];
     }

     echo $res;
//echo $h ;
    mysql_close($conn);
    ?>

