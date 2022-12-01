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

        document.getElementById("Registro").onclick = function (){

            if (document.getElementById("claveUsuario").value === "" || document.getElementById("usuarioR").value === ""  || document.getElementById("contrasenaR").value === "" ) {
                //document.getElementById("claveUsuario").focus();
                alert("Registro incorrecto, algún elemento vacío");
                //return false;
            }

            /*if (document.getElementById("usuarioR").value === "" ) {
                document.getElementById("usuarioR").focus();
                alert("Debe ingresar su usuario");
                return false;
            }

            if (document.getElementById("contrasenaR").value === "" ) {
                document.getElementById("contrasenaR").focus();
                alert("Debe ingresar su contraseña");
                return false;
            }*/
            //return true;
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
        "                <p class=\"alinear\">\n" +
        "                    <input type=\"submit\" id=\"Registro\" class=\"btn\" value=\"Registrarse\">\n" +
        "                    <br><br><a class='hiper' href=\"redireccionar.php\"> <i class=\"fa-solid fa-arrow-left\"></i>Regresar</a>"+
        "                </p><br>\n" +
        "            </form>";
}