<?php
    include("../variables.php");
    include("../funciones.php");
    date_default_timezone_set('America/Mexico_City');
    $fechaActual = date('y-m-d');
    $sentenciaSQL = "SELECT Fecha FROM servicio WHERE Fecha ='" . $fechaActual."'";
    $arrayResultado = ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
    $numerosEntidades = count($arrayResultado);
    if($numerosEntidades>0){
        header("location: ../inventario.php");
    }else{
        header("location: ../lider.html?resultado=2");
    }

?>