<?php
 include("../variables.php");
 include("../funciones.php");

$sql = "SELECT Fecha,Ofrenda,Diezmo,TotalRecaudaciones,AsisNinios,AsisPrejus,AsisAdultos FROM servicio";
$arrayResult=ConsultarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);

 function mostrarInfoServicios($array){
     echo "<table border><tr><th rowspan='2'></th><th rowspan='2'>Fecha</th><th colspan='3'>Recaudaciones</th><th colspan='3'>Asistencia</th></tr>";
     echo "<tr><th>Ofrenda</th><th>Diezmo</th><th>Total</th><th>Niños</th><th>Prejóvenes</th><th>Adultos</th></tr>";
     for ($i = 0; $i < count($array); $i++) {
         echo "<tr><td><input type='checkbox' name='servicios[]' value='".$array[$i]["Fecha"]."'></td>";
         echo "<td>" . $array[$i]["Fecha"] . "</td><td>" . $array[$i]["Ofrenda"] . "</td><td>" . $array[$i]["Diezmo"] . "</td>";
         echo "<td>" . $array[$i]["TotalRecaudaciones"] . "</td><td>" . $array[$i]["AsisNinios"] . "</td><td>" . $array[$i]["AsisPrejus"] . "</td><td>" . $array[$i]["AsisAdultos"] . "</td>";
         echo "</tr>";
     }
     echo "</table><br>";
 }

?>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width">
 <title>Inicio</title>
 <link rel="shortcut icon" href="../img/logoIcono.ico">
</head>
<body>
<div class="header">
    <div class="logo"><a href="../index.html"><img src="../img/logoIglesiaBlanco.png" alt="logo"></a></div>
    <div class="headTxt"><div class="titulo">Manantial de vida</div>
        <div class="subtitulo">Servicios</div></div>
</div>
<div class="principal">
    <form action="eliminar.php" method="post">
        <input type="hidden" name="filtro" value="Servicios">
        <?=mostrarInfoServicios($arrayResult);?>
    <div>
        <div><a href="../servicios.php">Nuevo</a></div>
        <div><input type="submit" name="eliminar" value="Eliminar"></div>
        <div><a href="recaudaciones.php">Modificar</a></div>
    </div>
    </form>
</div>
</body>
</html>
