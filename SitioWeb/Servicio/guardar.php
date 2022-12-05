<?php
    include("../variables.php");

    validarEntradas();

    $date = filter_var($_REQUEST["fecha"], FILTER_SANITIZE_STRING);
    $ofrend = filter_var($_REQUEST["ofrendas"], FILTER_SANITIZE_STRING);
    $diez = filter_var($_REQUEST["diezmo"], FILTER_SANITIZE_STRING);

    $ninios = filter_var($_REQUEST["ninios"], FILTER_SANITIZE_STRING);
    $prejus = filter_var($_REQUEST["prejuveniles"], FILTER_SANITIZE_STRING);
    $adulto = filter_var($_REQUEST["adultos"], FILTER_SANITIZE_STRING);

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
	if (!$conexion) {
    	die("Fallo: " . mysqli_connect_error());
	}

    $fecha = mysqli_real_escape_string($conexion, $date);
    $ofrendas = mysqli_real_escape_string($conexion, $ofrend);
    $diezmo = mysqli_real_escape_string($conexion, $diez);

    $ninieos = mysqli_real_escape_string($conexion, $ninios);
    $prejuveniles = mysqli_real_escape_string($conexion, $prejus);
    $adultos = mysqli_real_escape_string($conexion, $adulto);

    if (empty($fecha) || validarNumeros($ofrendas) || validarNumeros($diezmo) || validarNumeros($ninieos) || validarNumeros($prejuveniles) || validarNumeros($adultos)) {
        header("location: ../servicios.php?error=3");
        exit();
    }

    if(!validarFecha($fecha)){
        header("location: ../servicios.php?error=4");
        echo $fecha;
        exit();
    }
    
    $tipoServicio = calcularTipoServicio($fecha);
    $totalRecaudaciones = $ofrendas + $diezmo;

    $sql = "INSERT INTO	servicio (Fecha, Ofrenda, Diezmo, TotalRecaudaciones, Tipo, AsisNinios, AsisPrejus, AsisAdultos) VALUES ('" . $fecha . "', '" . $ofrendas . "', '" . $diezmo . "', '".$totalRecaudaciones."', '".$tipoServicio."', '".$ninieos."', '".$prejuveniles."', '".$adultos."')";
    
    try {
        $resultado = mysqli_query($conexion, $sql);
    } catch(Exception $e) {
        mysqli_close($conexion);
        header("location: ../servicios.php?error=5");
        exit();
    }

	mysqli_close($conexion);

    header("location: ../servicios.php?correcto=1");
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

    function calcularTipoServicio($fecha){
        $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
        $dia = $dias[(date('N', strtotime($fecha))) - 1];

        if (strcmp($dia, "Martes") == 0) {
            return "o";
        }else{
            if (strcmp($dia, "Domingo") == 0) {
                return "d";
            }else{
                return "x";
            }
        }
    }

    function validarNumeros($Numero){
        if(empty($Numero)){
            if($Numero == 0){
                return false;
            }
            else{
                return true;
            }
        }
    }

    function validarEntradas(){
        if (!isset($_REQUEST["fecha"]) || !isset($_REQUEST["ofrendas"]) || !isset($_REQUEST["diezmo"]) 
        || !isset($_REQUEST["ninios"]) || !isset($_REQUEST["prejuveniles"]) || !isset($_REQUEST["adultos"])) 
        {
            header("location: ../servicios.php?error=1");
            exit();
        }


        if (validarNumeros($_REQUEST["fecha"]) || validarNumeros($_REQUEST["ofrendas"]) || validarNumeros($_REQUEST["diezmo"]) 
        || validarNumeros($_REQUEST["ninios"]) || validarNumeros($_REQUEST["prejuveniles"]) || validarNumeros($_REQUEST["adultos"])) 
        {
            header("location: ../servicios.php?error=1");
            exit();
        }
    
        if(!is_numeric($_REQUEST["ofrendas"]) || !is_numeric($_REQUEST["diezmo"]) ||!is_numeric($_REQUEST["ninios"])
        || !is_numeric($_REQUEST["prejuveniles"]) || !is_numeric($_REQUEST["adultos"])){
            header("location: ../servicios.php?error=2");
            exit();
        }
    }
?>