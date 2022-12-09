<?php
if(isset($_REQUEST["error"])){
    switch ($_REQUEST["error"]) {
      case 1:
          $cadena = "Error_1";
          break;
      case 2:
          $cadena = "Error_2";
          break;
      case 3:
           $cadena = "Error_3";
           break;
      default:
        $cadena = "";
    }
  }else{
    isset($_REQUEST["correcto"])?$cadena = "Correcto_1":$cadena = "";
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Asistencia</title>
        <link rel="shortcut icon" href="img/logoIcono.ico">
        <link rel="stylesheet" href="css/formStyle.css">
        <script src="js/valAsist.js"></script>
        <script>
	        <?php echo "var estado = '" . $cadena . "';"; ?>
        </script>
    </head>

    <body>
        <div>
            <div class="header">
                <div class="logo"><a href="index.html"><img src="img/logoIglesiaBlanco.png"></a> </div>
                <div class="headTxt"><div class="titulo">Manantial de vida</div>
                <div class="subtitulo">Asistencia</div></div>
                <div class="regresar"><a href="Sesion/redireccionar.php">Regresar</a></div>
            </div>
            <div class="content">
                <div id="estado">
                <img src="" alt="ocurre error" id="imgEstado">
                <div id=textoEstado></div>
                </div>
                <div class="form">
                    <form name="Fasist" method="post" action="Asistencia/asistir.php">
                        Fecha de Servicio:
                        <input type="date" name="fecha"><br><br>
                        Asistencia:<br>
                        <input type="radio" name="presente" value="Presente">Presente<br><br>
                        <input type="radio" name="presente" value="NoPresente">No Presente<br><br>
                        Hora:
                        <input type="text" name="hora" placeholder="12:00">
                        <br>*Por favor, ingresa la hora en el formato del ejemplo en 24 horas.
                        <br><br><br><input type="submit" name="guardar" id="guardar" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>