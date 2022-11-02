function validarRecauds(form){
    if(form.fecha.value==""){
        alert("No seleccionó la fecha");
        form.fecha.focus();
        return false;
    }

    if(form.ofrendas.value==""){
        alert("Cantidad de ofrendas inválida");
        form.ofrendas.select();
        return false;
    }
    if(isNaN(form.ofrendas.value)){
        alert("Cantidad de ofrendas inválida");
        form.ofrendas.select();
        return false;
    }

    if(form.diezmo.value==""){
        alert("Cantidad de diezmo inválida");
        form.diezmo.select();
        return false;
    }
    if(isNaN(form.diezmo.value)){
        alert("Cantidad de diezmo inválida");
        form.diezmo.select();
        return false;
    }
}

window.onload=function(){
    document.getElementById("guardar").onclick=function(){
        validarRecauds(Frecauds);
    }
}