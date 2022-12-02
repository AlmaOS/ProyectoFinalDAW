<?php
    include("../variables.php");
    include("../funciones.php");

    if(empty($_REQUEST["fecha"])){
        header("location: ../inventario.html?error=1");
        exit();
    }

    $date = filter_var($_REQUEST["fecha"], FILTER_SANITIZE_STRING);

    if(!validarFecha($date)){
        header("location: ../inventario.html?error=2");
        exit();
    }

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
	if (!$conexion) {
    	die("Fallo: " . mysqli_connect_error());
	}

    $sentenciaSQL = "SELECT Fecha FROM servicio WHERE Fecha ='" . $date."'";
    $arrayResultado = ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);

    $numerosEntidades = count($arrayResultado);
    if(!$numerosEntidades>0){
        header("location: ../inventario.html?error=40");
        mysqli_close($conexion);
        exit();
    }

    $sentenciaSQL = "SELECT Fecha FROM articulos WHERE Fecha ='" . $date."'";
    $arrayResultado = ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);

    $numerosEntidades = count($arrayResultado);
    if($numerosEntidades>0){
        header("location: ../inventario.html?error=30");
        mysqli_close($conexion);
        exit();
    }

    $contador = count($_REQUEST["inventario"]);
    for ($i = 0; $i < $contador; $i++) {
        $aux = $_REQUEST["inventario"][$i];    
        $valores = explode('_', $aux);

        $clave = mysqli_real_escape_string($conexion, $valores[0]);
        $articulo = mysqli_real_escape_string($conexion, $valores[1]);

        $sql = "INSERT INTO	articulos (Fecha, ClvArticulo, NombreArticulo) VALUES ('" . $date . "', '" . $clave . "', '" . $articulo . "')";
        $resultado = mysqli_query($conexion, $sql);
        if (!$resultado) {
            header("location: ../inventario.html?error=3?");
        }
    }

    mysqli_close($conexion);
    header("location: ../inventario.html?correcto=1?");
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

?>