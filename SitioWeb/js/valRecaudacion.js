function sumarRecaudaciones(form){
    suma = parseFloat(form.ofrendas.value)+parseFloat(form.diezmo.value);
    form.total.value = suma;
    return suma;
}

window.onload = function(){
    document.getElementById("estado").style.display = "none";
    mostrarMensajes(estado);

    var detener = true;

    document.Frecauds.onsubmit = function () {
        var resultadoRecaudaciones = sumarRecaudaciones(Frecauds);
        return confirm("El total de recaudaciones son "+ resultadoRecaudaciones+" ¿Desea continuar?");
    }

    document.getElementById("guardar").onclick=function(){
        if(Frecauds.fecha.value==""){
            alert("No seleccionó la fecha");
            Frecauds.fecha.focus();
            return false;
        }

        if(Frecauds.ninios.value==""){
            alert("Cantidad de niños inválida");
            Frecauds.ninios.select();
            return false;
        }
        if(isNaN(Frecauds.ninios.value)){
            alert("Cantidad de niños inválida");
            Frecauds.ninios.select();
            return false;
        }
    
        if(Frecauds.prejuveniles.value==""){
            alert("Cantidad de prejuveniles inválida");
            Frecauds.prejuveniles.select();
            return false;
        }
        if(isNaN(Frecauds.prejuveniles.value)){
            alert("Cantidad de prejuveniles inválida");
            Frecauds.prejuveniles.select();
            return false;
        }
    
        if(Frecauds.adultos.value==""){
            alert("Cantidad de adultos inválida");
            Frecauds.adultos.select();
            return false;
        }
        if(isNaN(Frecauds.adultos.value)){
            alert("Cantidad de adultos inválida");
            Frecauds.adultos.select();
            return false;
        }
    
        if(Frecauds.ofrendas.value==""){
            alert("Cantidad de ofrendas inválida");
            Frecauds.ofrendas.select();
            return false;
        }
        if(isNaN(Frecauds.ofrendas.value)){
            alert("Cantidad de ofrendas inválida");
            Frecauds.ofrendas.select();
            return false;
        }
    
        if(Frecauds.diezmo.value==""){
            alert("Cantidad de diezmo inválida");
            Frecauds.diezmo.select();
            return false;
        }
        if(isNaN(Frecauds.diezmo.value)){
            alert("Cantidad de diezmo inválida");
            Frecauds.diezmo.select();
            return false;
        }
        return true;
    }
}