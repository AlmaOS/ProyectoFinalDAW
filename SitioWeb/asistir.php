<?php
    session_start();
    include("variables.php");

    $fecha = $_REQUEST["fecha"];
    $presente = $_REQUEST["presente"];
    $hora = $_REQUEST["hora"];
    $ClvUsuario = $_SESSION["ClvUsuario"];

    echo $fecha, $presente,$hora,$ClvUsuario;
    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
    if (!$conexion) {
        die("Fallo: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO	asistencia (ClvUsuario, Fecha, Hora) VALUES ('" . $ClvUsuario . "', '" . $fecha . "', '" . $hora . "')";
    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);

?>