function validarInven(form){
    if(form.fecha.value==""){
        alert("No seleccionó la fecha");
        form.fecha.focus();
        return false;
    }
}

window.onload=function(){
    document.getElementById("guardar").onclick=function(){
        validarInven(Finven);
    }
}