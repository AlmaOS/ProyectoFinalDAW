<?php
include("../variables.php");
include("../funciones.php");

$sql = "SELECT ClvUsuario,NombreUsu,Rol,Nombre,APaterno,AMaterno,Celular,Ministerio FROM usuario";
$arrayResult=ConsultarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);

function mostrarInfoCuentas($array){
    echo "<table border><tr><th></th><th>CveUsuario</th><th>Usuario</th><th>Rol</th><th>Nombre</th><th>Apellidos</th><th>Celular</th><th>Ministerio</th></tr>";
    for ($i = 0; $i < count($array); $i++) {
        echo "<tr><td><input type='checkbox' name='cuentas[]' value='".$array[$i]["ClvUsuario"]."'></td>";
        echo "<td>" . $array[$i]["ClvUsuario"] . "</td><td>" . $array[$i]["NombreUsu"] . "</td><td>" . $array[$i]["Rol"] . "</td>";
        echo "<td>" . $array[$i]["Nombre"] . "</td><td>" .$array[$i]["APaterno"]." ".$array[$i]["AMaterno"]. "</td>";
        echo "<td>" . $array[$i]["Celular"] . "</td><td>".$array[$i]["Ministerio"]."</td>";
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
<div class="header">
    <div class="logo"><a href="index.html"><img src="img/logoIglesiaBlanco.png" alt="logo"></a></div>
    <div class="headTxt"><div class="titulo">Manantial de vida</div>
        <div class="subtitulo">Cuentas</div></div>
</div>
<div class="principal">
    <form action="eliminar.php" method="post">
        <?=mostrarInfoCuentas($arrayResult);?>
        <div>
            <div><a href="../cuentas.html">Nuevo</a></div>
            <div><input type="submit" name="eliminar" value="Eliminar"></div>
        </div>
    </form>
</div>
</body>
</html>
