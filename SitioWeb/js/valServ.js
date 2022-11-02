function validarServicios(form){
    if(form.fecha.value==""){
        alert("No seleccionó la fecha");
        form.fecha.focus();
        return false;
    }

    if(form.niños.value==""){
        alert("Cantidad de niños inválida");
        form.niños.select();
        return false;
    }
    if(isNaN(form.niños.value)){
        alert("Cantidad de niños inválida");
        form.niños.select();
        return false;
    }

    if(form.prejuveniles.value==""){
        alert("Cantidad de prejuveniles inválida");
        form.prejuveniles.select();
        return false;
    }
    if(isNaN(form.prejuveniles.value)){
        alert("Cantidad de prejuveniles inválida");
        form.prejuveniles.select();
        return false;
    }

    if(form.adultos.value==""){
        alert("Cantidad de adultos inválida");
        form.adultos.select();
        return false;
    }
    if(isNaN(form.adultos.value)){
        alert("Cantidad de adultos inválida");
        form.adultos.select();
        return false;
    }

    return true;
}

function sumarPersonas(form){
    suma=parseFloat(form.niños.value)+parseFloat(form.prejuveniles.value)+parseFloat(form.adultos.value);
    form.total.value=suma;
}

window.onload=function(){
    document.getElementById("guardar").onclick=function(){
        if(validarServicios(Fserv)){
            sumarPersonas(Fserv);
        }
    }
}