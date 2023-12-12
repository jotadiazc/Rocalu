    <?php
    $q = $_REQUEST["q"];
    $conn = mysql_connect("localhost", "root", "");
    mysql_select_db("nahuil", $conn);

    if (!$conn) {
        echo "";
    }

    $resultado = mysql_query("SELECT * FROM transporte where PATENTE='".$q."'" );
    if (!$resultado) {
        echo "";
    }

    $res = "";

     while (($fila = mysql_fetch_array($resultado))!=NULL){

         $res = $fila['CARGA_MAXIMA'].'|'.$fila['MODELO'];
     }

     echo $res;
//echo $h ;
    mysql_close($conn);
    ?>