<?php
 include("../variables.php");
 include("../funciones.php");

$sql = "SELECT Fecha from servicio";
$array= ConsultarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);

function llenarSeleccion($array){
    echo "<select name='fechaServs' id='fechaSelec'>";
    echo "<option value=''></option>";
    for ($i = 0; $i < count($array); $i++){
        echo "<option value='".$array[$i]["Fecha"]."'>".$array[$i]["Fecha"]."</option>";
    }
    echo "</select>";
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Recaudaciones</title>
    <link rel="shortcut icon" href="../img/logoIcono.ico">
    <link rel="stylesheet" href="../css/formStyle.css">
    <script src="../js/valModificacionServicio.js"></script>
  </head>
  <body>
    <div>
      <div class="header">
        <div class="logo"><a href="../index.html"><img src="../img/logoIglesiaBlanco.png" alt="logo"></a></div>
        <div class="headTxt"><div class="titulo">Manantial de vida</div>
          <div class="subtitulo">Recaudaciones</div></div>
          <div class="regresar"><a href="../Sesion/redireccionar.php">Regresar</a></div>
      </div>
      <div class="content">
        <div class="form">
          <form name="Frecauds" method="post" action="modificar.php">
              <input type="hidden" name="filtro" value="servicios">
            Fecha de Servicio:
            <?=llenarSeleccion($array);?>
            <br><br>
              Ofrendas: <input type="text" name="ofrendas"><br><br>
            Diezmo: <input type="text" name="diezmo">
            <br><br><br><input type="submit" id="guardar" value="Guardar">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>