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
        case 6:
            $cadena = "Error_6";
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
    <title>Inventario</title>
    <link rel="shortcut icon" href="img/logoIcono.ico">
    <link rel="stylesheet" href="css/formStyle.css">
    <script src="js/valInventario.js"></script>
    <script>
	        <?php echo "var estado = '" . $cadena . "';"; ?>
    </script>
  </head>
  <body>
    <div>

      <div class="header">
        <div class="logo"><a href="index.html"><img src="img/logoIglesiaBlanco.png" alt="logo"></a></div>
        <div class="headTxt"><div class="titulo">Manantial de vida</div>
          <div class="subtitulo">Inventario</div></div>
          <div class="regresar"><a href="Sesion/redireccionar.php">Regresar</a></div>
      </div>

      <div class="content">
        <div id="estadoMemoria">
          Hay registro del último servicio ¿Desea verlos?
          <input type="button" value="Ver" id="registrosInventario">
        </div>
        <div class="form">
                <div id="estado">
                    <img src="" alt="ocurre error" id="imgEstado">
                    <div id=textoEstado></div>
                </div>

          <form name="Finven" class="finven" method="get" action="Inventario/inventariar.php">
            Fecha de Servicio:
            <input type="date" name="fecha"><br><br>
            Artículos:<br>
            <div class="checkConte">
              <label>
                <input type="checkbox" name="inventario[]" value="At1_Pulpo" class="check">Pulpito
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At2_Agua" class="check">Agua
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At3_Mentas" class="check">Mentas
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At4_Aceite" class="check">Aceite
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At5_Kleenex" class="check">Kleenex
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At6_Alfoli" class="check">Alfolí
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At7_Sobres" class="check">Sobres
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At8_Plumas" class="check">Plumas
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At9_FormatConso" class="check">Formatos consolid
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At10_Stickers" class="check">Stickers
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At11_Gel Antibacterial" class="check">Gel Antibacterial
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At12_Termometro" class="check">Termómetro
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At13_Cubrebocas" class="check">Cubrebocas
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At14_Manteles" class="check">Manteles
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At15_Mantillas" class="check">Mantillas
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At16_Banios" class="check">Baños
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At17_BombaTapete" class="check">Bomba y tapete
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At18_Conos" class="check">Conos
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At19_Basura" class="check">Basura
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At20_Letreros" class="check">Letreros
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At21_Sombrilla" class="check">Sombrilla
              </label>
              <label>
                <input type="checkbox" name="inventario[]" value="At22_MesasSillas" class="check">Mesas y sillas
              </label>
            </div>
            <br><br><br><input type="submit" id="guardar" value="Guardar">
          </form>
        </div>
      </div>

    </div>
  </body>
</html>