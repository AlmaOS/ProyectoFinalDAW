function ocultarPanelEstado(panelEstado) {
    document.getElementById("estado").style.display = "none";
}
function ocultarPanelEstado2(panelEstado) {
    document.getElementById("estado2").style.display = "none";
}

function isDOM(Obj) {
   return Obj instanceof Element;
}

function mostrarMensajes(estadosMensajes){
    partesMensaje = estadosMensajes.split("_");
    //alert("Mensase 1 es: "+ partesMensaje[0]+" "+ partesMensaje[1]);
    if (estadosMensajes != "") {
        switch (partesMensaje[1]) {
            case '1':
                document.getElementById("estado").style.display = "flex";
                panelEstado = document.getElementById("textoEstado");
                panelEstado.innerHTML+= "Campos vacios"
                setTimeout(ocultarPanelEstado, 3000);
              break;
            case '2':
                document.getElementById("estado").style.display = "flex";
                panelEstado = document.getElementById("textoEstado");
                panelEstado.innerHTML+= "Usuario o contrase&ntilde;a incorrectos";
                setTimeout(ocultarPanelEstado, 3000);
                break;
            case '3':
                crearFormRegistro();
                document.getElementById("estado").style.display = "flex";
                panelEstado = document.getElementById("textoEstado");
                panelEstado.innerHTML+= "Campos vacíos, no se pudo registrar";
                setTimeout(ocultarPanelEstado, 5000);
              break;
            case '4':
                crearFormRegistro();
                document.getElementById("estado").style.display = "flex";
                panelEstado = document.getElementById("textoEstado");
                panelEstado.innerHTML+= "La clave de registro no existe";
                setTimeout(ocultarPanelEstado, 5000);
                break;
            case '5':
                div = document.getElementById("estado2");
                if (isDOM(div)){
                    document.getElementById("estado2").style.display = "flex";
                    panelEstado = document.getElementById("textoEstado2");
                    panelEstado.innerHTML+= "Se ha registrado correctamente, inicie sesión";
                    setTimeout(ocultarPanelEstado2, 5000);
                }
                break;
            case '6':
                crearFormRegistro();
                document.getElementById("estado").style.display = "flex";
                panelEstado = document.getElementById("textoEstado");
                panelEstado.innerHTML+= "Este usuario ya ha sido registrado anteriormente, inicie sesión";
                setTimeout(ocultarPanelEstado, 5000);
            default:
          }
    }
}
    
window.onload = function (){
    const botonBarra = document.querySelector(".botonBarra");
    const navMenu = document.querySelector(".listaMenu");

    botonBarra.addEventListener("click",function(){
        navMenu.classList.toggle("menuDesplegable")
    });
    document.getElementById("estado").style.display = "none";
    div = document.getElementById("estado2");
    if (isDOM(div)){
        document.getElementById("estado2").style.display = "none";
    }
    mostrarMensajes(estado);

    div2 = document.getElementById("iniciarSesion");
    if (isDOM(div2)){
        document.getElementById("iniciarSesion").onclick = function (){
            if (document.getElementById("usuario").value === "" ) {
                document.getElementById("usuario").focus();
                alert("Usuario vacío");
                return false;
            }
    
            if (document.getElementById("contrasena").value === "" ) {
                document.getElementById("contrasena").focus();
                alert("Contraseña vacía");
                return false;
            }
            return true;
        }
    }

    div3 = document.getElementById("registroButton");
    if (isDOM(div3)){
        document.getElementById("registroButton").onclick = function (){
            crearFormRegistro();
            document.getElementById("estado").style.display = "none";
            //document.getElementById("estado2").style.display = "none";
            mostrarMensajes(estado);
            document.getElementById("Registro").onclick = function (){
    
                if (document.getElementById("claveUsuario").value === "") {
                    document.getElementById("claveUsuario").focus();
                    alert("Registro incorrecto, clave de usuario vacía");
                    return false;
                }
    
                if (document.getElementById("usuarioR").value === "" ) {
                    document.getElementById("usuarioR").focus();
                    alert("Registro incorrecto, debe ingresar su usuario");
                    return false;
                }
    
                if (document.getElementById("contrasenaR").value === "" ) {
                    document.getElementById("contrasenaR").focus();
                    alert("Registro incorrecto, debe ingresar su contraseña");
                    return false;
                }
                return true;
            }
        }
    }
    
}

function crearFormRegistro(){
    document.getElementById("formularioInicio").innerHTML =
        " <form class=\"formulario\" name=\"formularioRegistro\" method=\"post\" action=\"registrar.php\">\n" +
        "                <p>Clave:</p>\n" +
        "                <input type=\"text\" class=\"campoTexto\" id=\"claveUsuario\" name=\"clave\"><br><br><br>\n" +
        "                <p>Usuario:</p>\n" +
        "                <input type=\"text\" class=\"campoTexto\" id=\"usuario\" name=\"usuarioR\"><br><br><br>\n" +
        "                <p>Contraseña:</p>\n" +
        "                <input type=\"password\" class=\"campoTexto\" id=\"contrasena\" name=\"contrasenaR\"><br><br><br>\n" +
        "                <div id=\"estado\"> "+
        "                   <img src=\"../img/advertencia.png\" alt=\"ocurre error\">"+
        "                   <div id=textoEstado></div>"+
        "               </div>"+
        "                <p class=\"alinear\">\n" +
        "                    <input type=\"submit\" id=\"Registro\" class=\"btn\" value=\"Registrarse\">\n" +
        "                    <br><br><a class='hiper' href=\"redireccionar.php\"> <i class=\"fa-solid fa-arrow-left\"></i>Regresar</a>"+
        "                </p><br>\n" +
        "            </form>";
}