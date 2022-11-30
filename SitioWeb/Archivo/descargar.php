<?php
    include("../variables.php");
    
    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
	if (!$conexion) {
    	die("Fallo: " . mysqli_connect_error());
	}

    if (!($res = $conexion->query("CALL EncontrarServicio('2022-11-30')"))) {
        echo "Falló la llamada: (" . $mysqli->error . ") " . $mysqli->error;
    }
	for ($registros = array (); $fila = mysqli_fetch_assoc($res); $registros[] = $fila);	
    mysqli_close($conexion);
    generarXLS($registros);
    

    function generarXLS($array) {
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

        header('Content-Type: application/force-download');
        header('Content-Disposition: attachment; filename="Reporte.xls"');
        header('Content-Transfer-Encoding: binary');

        print $tabla;
    
    }

?>