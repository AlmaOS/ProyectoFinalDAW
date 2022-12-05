<?php
    include("../variables.php");
    include("../funciones.php");

    $sql = "SELECT Fecha from servicio";
    $array= ConsultarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);

    function llenarSeleccion($array){
        echo "<select name='fechaServs'>";
        echo "<option value=''></option>";
        for ($i = 0; $i < count($array); $i++){
            echo "<option value='".$array[$i]["Fecha"]."'>".$array[$i]["Fecha"]."</option>";
        }
        echo "</select>";
    }

    function mostrarAsistencias($array){
        echo "<table border><tr><th>Fecha</th><th>Nombre</th><th>Apellido</th><th>Rol</th><th>Ministerio</th></tr>";
        for ($i = 0; $i < count($array); $i++) {
            echo "<tr>";
            echo "<td>" . $array[$i]["Fecha"] . "</td><td>" . $array[$i]["Nombre"] . "</td><td>" . $array[$i]["APaterno"] . "</td>";
            echo "<td>" . $array[$i]["Rol"] . "</td><td>" .$array[$i]["Ministerio"]. "</td>";
            echo "</tr>";
        }
        echo "</table><br>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Asistencia</title>
    <link rel="shortcut icon" href="../img/logoIcono.ico">
    <link rel="stylesheet" href="../css/formStyle.css">
</head>
<body>
    <div>
        <div class="header">
            <div class="logo"><a href="../index.html"><img src="../img/logoIglesiaBlanco.png"></a> </div>
            <div class="headTxt"><div class="titulo">Manantial de vida</div>
            <div class="subtitulo">Asistencia</div></div>
            <div class="regresar"><a href="../Sesion/redireccionar.php">Regresar</a></div>
        </div>
        <div class="content">
            <div class="form">
                <form name="Frecauds" method="post" action="tablaAsistencias.php">
                Fecha de Servicio:
                <?=llenarSeleccion($array);?>
                <br><br><br><input type="submit" id="guardar" value="Mostrar">
                </form>
            </div>
            <div id=inforAsistencias>
                <?php
                        if (isset($_REQUEST["fechaServs"]) || !empty($_REQUEST["fechaServs"])) {
                            $fecha = filter_var($_REQUEST["fechaServs"], FILTER_SANITIZE_STRING);
                            if(validarFecha($fecha)){
                                $sentenciaSQL = "CALL GenerarAsistencia('$fecha')";
                                $registros = ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
                                if(!empty($registros)){
                                    mostrarAsistencias($registros);
                                }
                            }
                        }
                ?>
            </div>
        </div>
    </div>
</body>
</html>