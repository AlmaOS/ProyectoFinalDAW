<?php
    //$valores = explode('-', $fecha);
    //if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])){
    //    return true;
    //}
    $contador = count($_REQUEST["inventario"]);
    for ($i = 0; $i < $contador; $i++) {
        $aux = $_REQUEST["inventario"][$i];
        $valores = explode('_', $aux);
        echo "intentario clave es  $valores[0] y nombre es $valores[1] <br>";
    }


?>