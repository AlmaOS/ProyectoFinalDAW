window.onload = function (){
    document.getElementById("iniciarSesion").onclick = function (){
        if (document.getElementById("usuario").value === "" ) {
            document.getElementById("usuario").focus();
            return false;
        }

        if (document.getElementById("contrasena").value === "" ) {
            document.getElementById("contrasena").focus();
            return false;
        }

    }
}