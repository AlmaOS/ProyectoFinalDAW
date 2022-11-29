window.onload = function (){
    const botonBarra = document.querySelector(".botonBarra");
    const navMenu = document.querySelector(".listaMenu");

    botonBarra.addEventListener("click",function(){
        navMenu.classList.toggle("menuDesplegable")
    });

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

    document.getElementById("registroButton").onclick = function (){
        crearFormRegistro();
    }

}

function crearFormRegistro(){
    document.getElementById("formularioInicio").innerHTML =
        " <form class=\"formulario\" name=\"formularioRegistro\" method=\"post\" action=\"registrar.php\">\n" +
        "                <p>Clave:</p>\n" +
        "                <input type=\"text\" class=\"campoTexto\" id=\"claveUsuario\" name=\"clave\"><br><br><br>\n" +
        "                <p>Usuario:</p>\n" +
        "                <input type=\"text\" class=\"campoTexto\" id=\"usuario\" name=\"usuario\"><br><br><br>\n" +
        "                <p>Contraseña:</p>\n" +
        "                <input type=\"password\" class=\"campoTexto\" id=\"contrasena\" name=\"contrasena\"><br><br><br>\n" +
        "                <p class=\"alinear\">\n" +
        "                    <input type=\"submit\" id=\"Registrar\" class=\"btn\" value=\"Registrarse\">\n" +
        "                </p><br>\n" +
        "            </form>";
}