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
      case 4:
        $cadena = "Error_4";
        break;
      case 5:
        $cadena = "Error_5";
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
        <title>Servicios</title>
        <link rel="shortcut icon" href="img/logoIcono.ico">
        <link rel="stylesheet" href="css/formStyle.css">
        <script src="js/estadosResultados.js"></script>
        <script src="js/valRecaudacion.js"></script>
        <script>
	        <?php echo "var estado = '" . $cadena . "';"; ?>
        </script>
    </head>
    <body>
        <div>
            <div class="header">
                <div class="logo"><a href="index.html"><img src="img/logoIglesiaBlanco.png" alt="logo"></a></div>
                <div class="headTxt"><div class="titulo">Manantial de vida</div>
                    <div class="subtitulo">Servicios</div></div>
                    <div class="regresar"><a href="Sesion/redireccionar.php">Regresar</a></div>
            </div>
            <div class="content">
                <div id="estado">
                    <img src="" alt="ocurre error" id="imgEstado">
                    <div id=textoEstado></div>
                </div>
                <div class="form">
                    <form name="Frecauds" method="post" action="Servicio/guardar.php">
                        Fecha de Servicio:
                        <input type="date" name="fecha"><br><br>
                        Niños:<input type="text" name="ninios"><br><br>
                        Pre-juveniles<input type="text" name="prejuveniles"><br><br>
                        Adultos:<input type="text" name="adultos"><br><br>
                        Ofrendas: <input type="text" name="ofrendas"><br><br>
                        Diezmo: <input type="text" name="diezmo"><br><br>
                        Total: <input type="text" name="total" disabled>
                        <br><br><br><input type="submit" id="guardar" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>