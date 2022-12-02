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

window.onload = function(){
    document.getElementById("estadoMemoria").style.display = "none";

    document.getElementById("registrosInventario").onclick=function(){
        mostrarEnPantalla();
    }

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