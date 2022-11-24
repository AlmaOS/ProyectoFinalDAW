<?php
 include("../variables.php");
 include("../funciones.php");

$sql = "SELECT Fecha,Ofrenda,Diezmo,TotalRecaudaciones,AsisNinios,AsisPrejus,AsisAdultos FROM servicio";
$arrayResult=ConsultarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);

 function mostrarInfoServicios($array){
     echo "<table border><tr><th rowspan='2'></th><th rowspan='2'>Fecha</th><th colspan='3'>Recaudaciones</th><th colspan='3'>Asistencia</th></tr>";
     echo "<tr><th>Ofrenda</th><th>Diezmo</th><th>Total</th><th>Niños</th><th>Prejóvenes</th><th>Adultos</th></tr>";
     for ($i = 0; $i < count($array); $i++) {
         echo "<tr><td><input type='checkbox'></td>";
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
 <link rel="shortcut icon" href="img/logoIcono.ico">
 <script src="js/EstiloInterfaz.js"></script>
 <script src="https://kit.fontawesome.com/c3722043f9.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="principal">
    <?=mostrarInfoServicios($arrayResult);?>
    <div>
        <div><a href="../servicios.html">Nuevo</a></div>
        <div><a href="eliminar.php">Eliminar</a></div>
    </div>
</div>
</body>
</html>
