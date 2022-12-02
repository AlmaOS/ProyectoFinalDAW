function ocultarPanelEstado(panelEstado) {
    document.getElementById("estado").style.display = "none";
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

    mostrarMensajes(estado);

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