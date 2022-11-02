function validarRecauds(form){
    if(form.fecha.value==""){
        alert("No seleccionó la fecha");
        form.fecha.focus();
        return false;
    }

    if(form.ofrendas.value==""){
        alert("Cantidad de ofrendas inválida");
        form.ofrendas.focus();
        return false;
    }
    if(isNaN(form.ofrendas.value)){
        alert("Cantidad de ofrendas inválida");
        form.ofrendas.focus();
        return false;
    }

    if(form.diezmo.value==""){
        alert("Cantidad de diezmo inválida");
        form.diezmo.focus();
        return false;
    }
    if(isNaN(form.diezmo.value)){
        alert("Cantidad de diezmo inválida");
        form.diezmo.focus();
        return false;
    }
}

window.onload=function(){
    document.getElementById("guardar").onclick=function(){
        validarRecauds(Frecauds);
    }
}