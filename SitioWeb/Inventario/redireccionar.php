<?php
    include("../variables.php");
    include("../funciones.php");

    $fechaActual = date('y-m-d');

    $sentenciaSQL = "SELECT Fecha FROM servicio WHERE Fecha ='" . $fechaActual."'";
    $arrayResultado = ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);

    $numerosEntidades = count($arrayResultado);
    if($numerosEntidades>0){
        header("location: ../inventario.html?resultado=1");
    }else{
        header("location: ../lider.html?resultado=2");
    }

?>