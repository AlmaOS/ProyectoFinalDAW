window.onload = function (){
    const botonBarra = document.querySelector(".botonBarra");
    const navMenu = document.querySelector(".listaMenu");

    botonBarra.addEventListener("click",function(){
        navMenu.classList.toggle("menuDesplegable")
    });

    document.getElementById("iniciarSesion").onclick = function (){
        if (document.getElementById("usuario").value === "" ) {
            document.getElementById("usuario").focus();
            return false;
        }

        if (document.getElementById("contrasena").value === "" ) {
            document.getElementById("contrasena").focus();
            return false;
        }
        return true;
    }

}