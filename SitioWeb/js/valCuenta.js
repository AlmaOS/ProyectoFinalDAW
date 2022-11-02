function validarCuenta(form){
    if(form.nombre.value==""){
        alert("Nombre inválido");
        form.nombre.focus();
        return false;
    }
    if(form.apellidoP.value==""){
        alert("Apellido paterno inválido");
        form.apellidoP.focus();
        return false;
    }
    if(form.apellidoM.value==""){
        alert("Apellido materno inválido");
        form.apellidoM.focus();
        return false;
    }
    if(form.celular.value==""){
        alert("Celular inválido");
        form.celular.focus();
        return false;
    }
    if(isNaN(form.celular.value)){
        alert("Celular inválido");
        form.celular.focus();
        return false;
    }
    if(form.edad.value==""){
        alert("Edad inválida");
        form.edad.focus();
        return false;
    }
    if(isNaN(form.edad.value)){
        alert("Edad inválida");
        form.edad.focus();
        return false;
    }else{
        if(form.edad.value>90||form.edad.value<1){
            alert("Edad inválida");
            form.edad.focus();
            return false;
        }
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