<?php
  if(isset($_REQUEST["error"])){
    switch ($_REQUEST["error"]) {
      case 1:
          $cadena = "Error._1";
          break;
      case 2:
          $cadena = "Error._2";
          break;
      case 3:
           $cadena = "Error._3";
           break;
      case 4:
        $cadena = "Error._4";
        break;
      case 5:
        $cadena = "Error._5";
        break;
      case 6:
        $cadena = "Error._6";
        break;
      default:
        $cadena = "";
    }
  }else{
    $cadena = "";
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Reportes</title>
        <link rel="shortcut icon" href="img/logoIcono.ico">
        <link rel="stylesheet" href="css/formStyle.css">
        <script src="js/valArchivo.js"></script>
        <script>
	        <?php echo "var estado = '" . $cadena . "';"; ?>
        </script>
    </head>
    <body>
        <div>
            <div class="header">
                <div class="logo"><a href="index.html"><img src="img/logoIglesiaBlanco.png"></a> </div>
                <div class="headTxt"><div class="titulo">Manantial de vida</div>
                <div class="subtitulo">Reportes</div></div>
                <div class="regresar"><a href="Sesion/redireccionar.php">Regresar</a></div>
            </div>
            <div class="content">

                <div id="estado">
                    <img src="img/advertencia.png" alt="ocurre error">
                    <div id=textoEstado></div>
                </div>

                <div class="form">
                    <form name="FArchivoB" method="get" action="Archivo/descargar.php">
                        Generar reporte<br>
                        Fecha de Servicio:
                        <input type="date" name="fecha"><br><br>
                        <br><br><br><input type="submit" name="guardar" id="descargarArchivo" value="Descargar">
                    </form>
                </div>
                <br>
                <div class="form">
                    <form name="formu2" method="post" action="Archivo/subir.php" enctype="multipart/form-data">
                        Subir reporte<br>
                        Fecha de Servicio:
                        <input type="date" name="fecha"><br><br>
                        Archivo:<br>
                        <input type="file" name="upfile" id="file" accept=".xls">
                        <br><br><br><input type="submit" name="guardar" id="guardarArchivo" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>