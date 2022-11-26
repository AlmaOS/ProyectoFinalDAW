function sumarPersonas(form){
    suma = parseFloat(form.niños.value)+parseFloat(form.prejuveniles.value)+parseFloat(form.adultos.value);
    form.total.value = suma;
    alert(suma);
}

window.onload = function(){
    var detener = true;

    document.Frecauds.onsubmit = function () {
        return confirm("El total de  asistencias son "+ sumarPersonas(Frecauds)+" ¿Desea continuar?");
    }

    document.getElementById("guardar").onclick=function(){
        if(Frecauds.fecha.value==""){
            alert("No seleccionó la fecha");
            Frecauds.fecha.focus();
            return false;
        }

        if(Frecauds.niños.value==""){
            alert("Cantidad de niños inválida");
            Frecauds.niños.select();
            return false;
        }
        if(isNaN(Frecauds.niños.value)){
            alert("Cantidad de niños inválida");
            Frecauds.niños.select();
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