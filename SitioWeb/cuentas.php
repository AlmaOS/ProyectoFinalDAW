<?php
$error=(isset($_REQUEST["error"]))? $_REQUEST["error"]:0;
if($error==1){
    switch ($error) {
        case 1:
            $cadena = "alert('Alguno de los campos no se llenó correctamente')";
            break;
        case 2:
            $cadena = "alert('Alguno de los campos está vacío')";
            break;
        case 3:
            $cadena = "alert('El celular dado es inválido')";
            break;
        case 4:
            $cadena = "alert('Falló la conexión a la base de datos');";
            break;
        default:
            $cadena = "";
    }
}
?>
<html lang="en" xmlns:for="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Cuentas</title>
    <link rel="shortcut icon" href="img/logoIcono.ico">
    <link rel="stylesheet" href="css/formStyle.css">
    <script src="js/valCuenta.js"></script>
    <script>
      <?php 
        if(isset($cadena))
          echo "$cadena;";
      ?>
    </script>
</head>
<body>
  <div>
    <div class="header">
      <div class="logo"><a href="index.html"><img src="img/logoIglesiaBlanco.png" alt="logo"></a></div>
      <div class="headTxt"><div class="titulo">Manantial de vida</div>
        <div class="subtitulo">Cuentas</div></div>
        <div class="regresar"><a href="CRUD/tablaCuentas.php">Regresar</a></div>
    </div>
    <div class="content">
      <div class="form">                               <!-- Cuenta/registrar.php-->
        <form name="Fcuenta" method="post" action="Cuenta/registrar.php">
          Nombre:<input type="text" name="nombre">
          <br>*Si se tienen dos nombres, ingresar ambos<br><br>
          <label class="ModificaUsuario">
          Apellido paterno: <input type="text" name="apellidoP"><br><br>
          </label>
          <label class="ModificaUsuario">
          Apellido materno: <input type="text" name="apellidoM"><br><br>
          </label>
          Celular: <input type="text" name="celular"><br><br>
          Grupo: <select name="grupos" id="grupoSelec">
                    <option value=""></option>
                    <option value="Iglekids">Iglekids</option>
                    <option value="Matrimonios">Matrimonios</option>
                    <option value="Jovenes">Jóvenes</option>
                    <option value="Mujeres">Mujeres</option>
                    <option value="Cofradia">Cofradia</option>
                    <option value="Nosotras craft">Nosotras craft</option>
                 </select>
          <br><br>Posición:<br><br>
          <input type="radio" name="posicion" value="lider">Líder<br><br>
          <input type="radio" name="posicion" value="integrante">Integrante<br>
            <br><br>Ministerio: <br><br>
            <input type="radio" name="ministerio" value="Alabanza">Alabanza<br><br>
            <input type="radio" name="ministerio" value="Voluntariado">Voluntariado
          <br><br><br><input type="submit" id="guardar" value="Guardar">
        </form>
      </div>
    </div>
  </div>
</body>
</html>