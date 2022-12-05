valoresGuardados = [];

function guardarCheckBox(){
    x = document.getElementsByClassName("check");
    for(i=0; i<x.length; i++){
        valoresGuardados.push(x[i].checked);
    } 
    localStorage.setItem("Inventario",JSON.stringify(valoresGuardados));
    valoresGuardados.length = 0;
}

function guardarFecha(){
    x = document.querySelector('input[type="date"]');
    valoresGuardados.push(x.value);
}

function repaldarDatos(){
    guardarFecha();
    guardarCheckBox();
}

function mostrarEnPantalla(){
    var arregloMemoriaGuardada = [];
    arregloMemoriaGuardada = JSON.parse(localStorage.getItem("Inventario"));
    x = document.querySelector('input[type="date"]');
    x.value = arregloMemoriaGuardada[0];
    checkBox = document.getElementsByClassName("check");
    for(i=1; i<arregloMemoriaGuardada.length; i++){
        checkBox[i-1].checked =  arregloMemoriaGuardada[i];
    }

}

function verificar(){
    if (localStorage.getItem("Inventario") === null) {
    } else {
        document.getElementById("estadoMemoria").style.display = "block";
    }
}

function ocultarPanelEstado(panelEstado) {
    document.getElementById("estado").style.display = "none";
}

function mostarMensaje(mensaje){
    document.getElementById("estado").style.display = "flex";
    panelEstado = document.getElementById("textoEstado");
    panelEstado.innerHTML+= mensaje;
    setTimeout(ocultarPanelEstado, 3000);
}

function mostrarMensajes(estadosMensajes){
    partesMensaje = estadosMensajes.split("_");
    //alert("Mensase 1 es: "+ partesMensaje[0]+" "+ partesMensaje[1]);
    if (estadosMensajes != "") {
        switch (partesMensaje[1]) {
            case '1':
                mostarMensaje("Fecha vacia");
              break;
            case '2':
                mostarMensaje("El formato de fecha no es el correcto");
              break;
            case '3':
                mostarMensaje("No hay servicio registrado");
            break;
            case '4':
                mostarMensaje("Ya se hizo el inventario");
            break;
            case '5':
                mostarMensaje("Error al guardar el inventario");
            break;
            default:
          }
    }
}

window.onload = function(){


    document.getElementById("estadoMemoria").style.display = "none";

    document.getElementById("registrosInventario").onclick=function(){
        mostrarEnPantalla();
    }

    document.getElementById("estado").style.display = "none";
    mostrarMensajes(estado);

    verificar();

    document.getElementById("guardar").onclick=function(){
        if(Finven.fecha.value==""){
            alert("No seleccionó la fecha");
            Finven.fecha.focus();
            return false;
        }
        repaldarDatos();
        return true;
    }

}