<?php
include("../variables.php");
include("../funciones.php");

$sql = "SELECT NombreUsu from usuario";
$array= ConsultarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);

function llenarSeleccion($array){
    echo "<select name='usuario' id='usuarioSelect'>";
    echo "<option value=''></option>";
    for ($i = 0; $i < count($array); $i++){
        echo "<option value='".$array[$i]["NombreUsu"]."'>".$array[$i]["NombreUsu"]."</option>";
    }
    echo "</select>";
}

    $sql = "SELECT NombreUsu, Nombre, APaterno, AMaterno, Celular from usuario";
    $arrayUsuarios= ConsultarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
    $arreglo = json_encode($arrayUsuarios);
?>
<html lang="en" xmlns:for="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Cuentas</title>
    <link rel="shortcut icon" href="../img/logoIcono.ico">
    <link rel="stylesheet" href="../css/formStyle.css">
    <script src="../js/valModificacionCuenta.js"></script>
    
    <script>
	        <?php echo "var usuarioJSON = '" . $arreglo . "';"; ?>
            <?php echo "var arregloUsuario = JSON.parse(usuarioJSON);"; ?>
    </script>
    
</head>
<body>
<div>
    <div class="header">
        <div class="logo"><a href="../index.html"><img src="../img/logoIglesiaBlanco.png" alt="logo"></a></div>
        <div class="headTxt"><div class="titulo">Manantial de vida</div>
            <div class="subtitulo">Cuentas</div></div>
            <div class="regresar"><a href="tablaCuentas.php">Regresar</a></div>
    </div>
    <div class="content">
        <div class="form">                         <!--modificar.php-->
            <form name="info" method="post" action="modificar.php">
                <input type="hidden" name="filtro" value="cuentas">
                Usuario: <?=llenarSeleccion($array)?>
                <br><br>Nombre:<input type="text" name="nombre">
                <br>*Si se tienen dos nombres, ingresar ambos<br><br>
                <label class="ModificaUsuario">
                Apellido paterno: <input type="text" name="apellidoP"><br><br>
                </label>
                <label class="ModificaUsuario">
                Apellido materno: <input type="text" name="apellidoM"><br><br>
                </label>
                Celular: <input type="text" name="celular"><br><br>
                <br><br><br><input type="submit" id="guardar" value="Guardar">
            </form>
        </div>
    </div>
</div>
</body>
</html>
