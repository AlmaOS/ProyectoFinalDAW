<?php
    session_start();
    include("../variables.php");

    if (empty($_REQUEST["fecha"]) || empty($_REQUEST["presente"]) || empty($_REQUEST["hora"])) {
        header("location: ../asistencia.html");
        exit();
    }

    $date = filter_var($_REQUEST["fecha"], FILTER_SANITIZE_STRING);
    $hour = filter_var($_REQUEST["hora"], FILTER_SANITIZE_STRING);

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
	if (!$conexion) {
    	die("Fallo: " . mysqli_connect_error());
	}

    $fecha = mysqli_real_escape_string($conexion, $date);
    $hora = mysqli_real_escape_string($conexion, $hour);
    $ClvUsuario = $_SESSION["ClvUsuario"];

    echo "LA fehca es $fecha  y la hora   $hora";

    if (empty($fecha) || empty($hora)) {
        header("location: ../asistencia.html");
        exit();
    }

    $sql = "INSERT INTO	asistencia (ClvUsuario, Fecha, Hora) VALUES ('" . $ClvUsuario . "', '" . $fecha . "', '" . $hora . "')";
    $resultado = mysqli_query($conexion, $sql);
	mysqli_close($conexion);

    header("location: ../asistencia.html");
    exit();

?>