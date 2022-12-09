function ocultarPanelEstado(panelEstado) {
    document.getElementById("estado").style.display = "none";
}

function mostarMensaje(mensaje,estado){
    if(estado == 1){
        document.getElementById("imgEstado").src = "img/advertencia.png";
    }else{
        document.getElementById("imgEstado").src = "img/registrado.png";
    }
    document.getElementById("estado").style.display = "flex";
    panelEstado = document.getElementById("textoEstado");
    panelEstado.innerHTML+= mensaje;
    setTimeout(ocultarPanelEstado, 3000);
}

function mostrarMensajes(estadosMensajes){
    partesMensaje = estadosMensajes.split("_");
    //alert("Mensase 1 es: "+ partesMensaje[0]+" "+ partesMensaje[1]);
    if (estadosMensajes != "" && partesMensaje[0] == "Error") {
        switch (partesMensaje[1]) {
            case '1':
                mostarMensaje("campos vacios",1);
              break;
            case '2':
                mostarMensaje("Recaudaciones deben ser números",1);
              break;
            case '3':
                mostarMensaje("Se ingresó un código maligno",1);
            break;
            case '4':
                mostarMensaje("Formato fecha incorrecta",1);
            break;
            case '5':
                mostarMensaje("Ya se ha registrado un servicio con la misma fecha",1);
            break;
            default:
          }
    }else{
        if (estadosMensajes != "" && partesMensaje[0] == "Correcto"){
            mostarMensaje("Datos registrados correctamente",2);
        }
    }
}