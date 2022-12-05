
<html lang="en" xmlns:for="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Cuentas</title>
    <link rel="shortcut icon" href="img/logoIcono.ico">
    <link rel="stylesheet" href="css/formStyle.css">
    <script src="js/valCuenta.js"></script>
</head>
<body>
  <div>
    <div class="header">
      <div class="logo"><a href="index.html"><img src="img/logoIglesiaBlanco.png" alt="logo"></a></div>
      <div class="headTxt"><div class="titulo">Manantial de vida</div>
        <div class="subtitulo">Cuentas</div></div>
    </div>
    <div class="content">
      <div class="form">
        <form name="Fcuenta" method=post action="Cuenta/registrar.php">
          Nombre:<input type="text" name="nombre">
          <br>*Si se tienen dos nombres, ingresar ambos<br><br>
          Apellido paterno: <input type="text" name="apellidoP"><br><br>
          Apellido materno: <input type="text" name="apellidoM"><br><br>
          Celular: <input type="text" name="celular"><br><br>
          Grupo: <select name="grupos">
                    <option value=""></option>
                    <option value="Iglekids">Iglekids</option>
                    <option value="Matrimonios">Matrimonios</option>
                    <option value="Jovenes">Jóvenes</option>
                    <option value="Mujeres">Mujeres</option>
                    <option value="Cofradia">Cofradia</option>
                    <option value="Nosotras craft">Nosotras craft</option>
                 </select>
          <br><br>Posición:
          <input type="radio" name="posicion" value="lider">Líder
          <input type="radio" name="posicion" value="integrante">Integrante
            <br><br>Ministerio:
            <input type="radio" name="ministerio" value="Alabanza">Alabanza
            <input type="radio" name="ministerio" value="Voluntariado">Voluntariado
          <br><br><br><input type="submit" id="guardar" value="Guardar">
        </form>
      </div>
    </div>
  </div>
</body>
</html>