function validarCuenta(form){
    if(form.nombre.value==""){
        alert("Nombre inválido");
        form.nombre.select();
        return false;
    }
    if(form.apellidoP.value==""){
        alert("Apellido paterno inválido");
        form.apellidoP.select();
        return false;
    }
    if(form.apellidoM.value==""){
        alert("Apellido materno inválido");
        form.apellidoM.select();
        return false;
    }
    if(form.celular.value==""){
        alert("Celular inválido");
        form.celular.select();
        return false;
    }
    if(isNaN(form.celular.value)){
        alert("Celular inválido");
        form.celular.select();
        return false;
    }
    if(isNaN(form.edad.value)){
        alert("Edad inválida");
        form.edad.select();
        return false;
    }
    if(form.grupos.value==""){
        alert("No seleccionó un grupo");
        form.edad.focus();
        return false;
    }

    for(i=0; i<form.posicion.length; i++){
        if(form.posicion[i].checked) break;
    }
    if(i==form.posicion.length) {
        alert("No seleccionó su posición");
        form.posicion[0].focus();
        return false;
    }
}

window.onload=function(){
    document.getElementById("guardar").onclick=function(){
        validarCuenta(Fcuenta);
    }
}