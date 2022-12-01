<?php
    if(empty($_REQUEST["fecha"])){
        header("location: ../archivo.html?error=1");
        exit();
    }

    $fechaAux = filter_var($_REQUEST["fecha"], FILTER_SANITIZE_STRING);

    if(!validarFecha($fechaAux)){
        header("location: ../archivo.html?error=2");
        exit();
    }

    //Se obtienen el nombre de los archivos que están en la ruta 
    $directorio = '../upload/';
    $ficheros1  = scandir($directorio);
    sort($ficheros1);

    // Se busca el archvio $fechaAux
    $fechaAux2 = $fechaAux.".xls";
    $clave = array_search("$fechaAux", $ficheros1);

    if(!$clave){
        //No hay archivos subidos
        generarArchivo($fechaAux);
    }else{
        //Sí hay archivos subidos
        include("buscar.php");
        descargarArchivo($fechaAux);
    }

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

    function generarArchivo($fechaServicio){
        echo "La fecha de entrada es $fechaServicio";
        include("../variables.php");

        $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
	    if (!$conexion) {
    	    die("Fallo: " . mysqli_connect_error());
	    }

        if (!($res = $conexion->query("CALL EncontrarServicio('$fechaServicio')"))) {
            mysqli_close($conexion);
            echo "Falló la llamada";
        }

        for ($registros = array (); $fila = mysqli_fetch_assoc($res); $registros[] = $fila);	
        mysqli_close($conexion);
        
        $nombreArchivo = $fechaServicio.".xls";
        generarXLS($registros,$nombreArchivo);
    }

    function generarXLS($array,$nombreArchivo) {
        $tabla='<html><body>';
        $tabla.='<table>';
        $tabla.='<tr><td>Fecha</td><td>Diezmo</td><td>Ofrenda</td><td>Clave articulo</td><td>Nombre Articulo</td></tr>';
        for ($i = 0; $i < count($array); $i++) {
            $fecha = $array[$i]['Fecha'];
            $diezmo = $array[$i]['Diezmo'];
            $ofrenda = $array[$i]['Ofrenda'];
            $clvArticuliu = $array[$i]['ClvArticulo'];
            $nombreArti = $array[$i]['NombreArticulo'];
            $tabla.="<tr><td>$fecha</td><td>$diezmo</td><td>$ofrenda</td><td>$clvArticuliu</td><td>$nombreArti</td></tr>";
        }
        
        $tabla.='</table>';
        $tabla.='</body></html>';

        $nombre = $nombreArchivo;
        header('Content-Type: application/force-download');
        header('Content-Disposition: attachment; filename="'."$nombre".'"');
        header('Content-Transfer-Encoding: binary');

        print $tabla;
    
    }
    /*
    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
	if (!$conexion) {
    	die("Fallo: " . mysqli_connect_error());
	}

    if (!($res = $conexion->query("CALL EncontrarServicio('2022-11-30')"))) {
        echo "Falló la llamada: (" . $mysqli->error . ") " . $mysqli->error;
    }
	for ($registros = array (); $fila = mysqli_fetch_assoc($res); $registros[] = $fila);	
    mysqli_close($conexion);
    echo $registros[0]['Fecha'];
    
    generarXLS($registros);
    
    */
?>