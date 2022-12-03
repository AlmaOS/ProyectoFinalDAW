<?php
    session_start();
    include("../variables.php");

    if (empty($_REQUEST["fecha"]) || empty($_REQUEST["presente"]) || empty($_REQUEST["hora"])) {
        header("location: ../asistencia.php?error=1");
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

    if (empty($fecha) || empty($hora)) {
        header("location: ../asistencia.php?error=2");
        exit();
    }

    if(!validarFecha($fecha) && !validarHora($hora)){
        header("location: ../asistencia.php?error=2");
        exit();
    }

    $sql = "INSERT INTO	asistencia (ClvUsuario, Fecha, Hora) VALUES ('" . $ClvUsuario . "', '" . $fecha . "', '" . $hora . "')";
    
    try {
        $resultado = mysqli_query($conexion, $sql);
    } catch(Exception $e) {
        mysqli_close($conexion);
        header("location: ../asistencia.php?error=3");
        exit();
    }

	mysqli_close($conexion);
    header("location: ../asistencia.php?correcto=1");
    exit();

    function validarFecha($fecha){
        //Año - mes - dia
        //parametros de checkDate
        // mes, dia y año
        $valores = explode('-', $fecha);
        if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])){
            return true;
        }
        return false;
    }

    function validarHora($hora){
        if(strrpos($hora, ":") === false){
            return false;
        }
        $porciones = explode(":", $hora);
        if(count(($porciones))!= 2){
            return false;
        }
        if($porciones[0]<=0 || $porciones[0]>24){
            return false;
        }
        if($porciones[1]<0 || $porciones[1]>60){
            return false;
        }
        return true;
    }
?>