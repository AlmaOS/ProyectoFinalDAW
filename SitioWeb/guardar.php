<?php
    include("variables.php");

    if (empty($_REQUEST["fecha"]) || empty($_REQUEST["ofrendas"]) || empty($_REQUEST["diezmo"])) {
        header("location: recaudaciones.html");
        exit();
    }

    $date = filter_var($_REQUEST["fecha"], FILTER_SANITIZE_STRING);
    $ofrend = filter_var($_REQUEST["ofrendas"], FILTER_SANITIZE_STRING);
    $diez = filter_var($_REQUEST["diezmo"], FILTER_SANITIZE_STRING);

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
	if (!$conexion) {
    	die("Fallo: " . mysqli_connect_error());
	}

    $fecha = mysqli_real_escape_string($conexion, $date);
    $ofrendas = mysqli_real_escape_string($conexion, $ofrend);
    $diezmo = mysqli_real_escape_string($conexion, $diez);

    /**
     * 
     * OJO
     * 
     * 
     * Como tenemos todo en una tabla, asistencias y recaudaciones
     * Falta validar, si la fecha ya se usó antes para las asistencias de las personas, entonces debemos 
     * buscar la fecha y modificar 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     */
    if (empty($fecha) || empty($ofrendas) || empty($diezmo)) {
        header("location: recaudaciones.html");
        exit();
    }

    $valoresTemporales = 10;
    $valoresTe = "o";

    $sql = "INSERT INTO	servicio (Fecha, Ofrenda, Diezmo, TotalRecaudaciones, Tipo, AsisNinios, AsisPrejus, AsisAdultos) VALUES ('" . $fecha . "', '" . $ofrendas . "', '" . $diezmo . "', '".$valoresTemporales."', '".$valoresTe."', '".$valoresTemporales."', '".$valoresTemporales."', '".$valoresTemporales."')";
    echo $sql;
    $resultado = mysqli_query($conexion, $sql);
	mysqli_close($conexion);

    header("location: recaudaciones.html");
    exit();


?>