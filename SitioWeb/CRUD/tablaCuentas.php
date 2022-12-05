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
        <title>Cuentas</title>
        <link rel="shortcut icon" href="../img/logoIcono.ico">
        <link rel="stylesheet" href="../css/formStyle.css">
    </head>

    <body>
        <div class="header">
            <div class="logo"><a href="../index.html"><img src="../img/logoIglesiaBlanco.png"></a> </div>
            <div class="headTxt"><div class="titulo">Manantial de vida</div>
            <div class="subtitulo">Cuentas</div></div>
            <div class="regresar"><a href="../Sesion/redireccionar.php">Regresar</a></div>
        </div>
        <div class="principal">
            <form action="eliminar.php" method="post">
                <input type="hidden" name="filtro" value="Cuentas">
                <?=mostrarInfoCuentas($arrayResult);?>
                <div class="opciones">
                    <div><a href="../cuentas.php" class="botonSubir">Nuevo</a></div>
                    <div><input type="submit" name="eliminar" value="Eliminar" class="botonSubir"></div>
                    <div><a href="infoCuentas.php" class="botonSubir">Modificar</a></div>
                </div>
            </form>
        </div>
    </body>
</html>
