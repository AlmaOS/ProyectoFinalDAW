<?php
    include("../variables.php");
    include("../funciones.php");

    if (!isset($_REQUEST["fecha"])){
        header("location: ../inventario.php?error=1");
        exit();
    }

    if(empty($_REQUEST["fecha"])){
        header("location: ../inventario.php?error=1");
        exit();
    }

    $date = filter_var($_REQUEST["fecha"], FILTER_SANITIZE_STRING);

    if(!validarFecha($date)){
        header("location: ../inventario.php?error=2");
        exit();
    }

    $sentenciaSQL = "SELECT Fecha FROM servicio WHERE Fecha ='" . $date."'";
    $arrayResultado = ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);

    $numerosEntidades = count($arrayResultado);
    if(!$numerosEntidades>0){
        header("location: ../inventario.php?error=3");
        mysqli_close($conexion);
        exit();
    }

    $sentenciaSQL = "SELECT Fecha FROM articulos WHERE Fecha ='" . $date."'";
    $arrayResultado = ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);

    $numerosEntidades = count($arrayResultado);
    if($numerosEntidades>0){
        header("location: ../inventario.php?error=4");
        mysqli_close($conexion);
        exit();
    }

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
	if (!$conexion) {
    	die("Fallo: " . mysqli_connect_error());
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
            header("location: ../inventario.php?error=5?");
        }
    }

    mysqli_close($conexion);
    header("location: ../inventario.php?correcto=1?");
    exit();


?>