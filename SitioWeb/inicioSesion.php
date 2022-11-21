<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Inicio de Sesión</title>
    <link rel="shortcut icon" href="img/logoIcono.ico">
    <link rel="stylesheet" href="css/inicioSesion.css">
    <link rel="stylesheet" href="css/barraPie.css">
    <script src="https://kit.fontawesome.com/32587f35af.js" crossorigin="anonymous"></script>
    <script src="js/inicioSesion.js"></script>
  </head>
  <body>
    <nav class="barraNavegacion">
      <div id="primerDivConLogo">
        <a href="index.html" class="logoIglesiaMenu">MANANTIAL DE VIDA</a>
        <a href="#"><img src="img/logoIglesiaBlanco.png" alt="logo provisional" width="70px" height="70px"></a>
      </div>
      <button class="botonBarra">
        <i class="fa-solid fa-bars"></i>
      </button>
      <div class="listaMenu">
        <!--li.nav-menu-item*4>a.nav-menu-link-->
        <ul>
          <li><a href="sobreNosotros.html" class="menuIteam">Sobre Nosotros</a></li>
          <li><a href="contacto.html" class="menuIteam">Contacto</a></li>
          <li><a href="grupos.html" class="menuIteam">Grupos</a></li>
          <li><a href="inicioSesion.html" class="menuIteam resaltable">Inicio de Sesión</a></li>
        </ul>
      </div>
    </nav>

    <main style="background-color: white;">
      <div class="contenedorPrincipal">
        <aside id="logoInicio">
          <img class="logo-aside" src="img/logoAzul.jpeg" alt="logo de manantial de vida">
        </aside>

        <div id="formularioInicio">
          <form class="formulario" name="formularioInicioSesion" method="post" action="validar.php">
            <p>Usuario:</p>
            <input type="text" class="campoTexto" id="usuario" name="usuario"><br><br><br>
            <p>Contraseña:</p>
            <input type="password" class="campoTexto" id="contrasena" name="contrasena"><br><br><br>
            <p class="alinear">
              <input type="submit" id="iniciarSesion" class="btn" value="Iniciar Sesión">
            </p><br>
            <p class="alinear">
              <a href="#" class="hiper">Registrarse </a> &nbsp; si aún no tiene cuenta
            </p>
          </form>
        </div>

      </div>
    </main>

    <div class="piePagina">
      <div class="gap">qqqq</div>
      <div class="logo"><img id="imgLogo" src="img/logoIglesiaBlanco.png"></div>
      <div class="borderEsp"><p class="pieSubt">Sedes:</p><ul class="direcciones">
        <li><a class="pieLista" href="#">Iglesia Manantial de vida</a></li>
        <li><a class="pieLista" href="#">Iglesia Manantial de vida. Campus Mérida</a></li>
      </ul></div>
      <div class="borderEsp"><ul class="navPie">
        <li><a class="pieLista" href="sobreNosotros.html" class="">Sobre Nosotros</a></li>
        <li><a class="pieLista" href="contacto.html" class="">Contacto</a></li>
        <li><a class="pieLista" href="grupos.html" class="">Grupos</a></li>
        <li><a class="pieLista" href="inicioSesion.html" class="">Inicio de Sesión</a></li>
      </ul></div>
      <div class="gap">qqq</div>
    </div>
  </body>
</html>