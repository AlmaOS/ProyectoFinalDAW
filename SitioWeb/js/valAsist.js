function validarAsistencia(form){
    if(form.fecha.value==""){
        alert("No seleccionó la fecha");
        form.fecha.focus();
        return false;
    }

    for(i=0; i<form.presente.length; i++){
        if(form.presente[i].checked) break;
    }
    if(i==form.presente.length) {
        alert("No seleccionó su asistencia");
        form.presente[0].focus();
        return false;
    }

    if(form.hora.value==""){
        alert("No escribió su hora");
        form.hora.select();
        return false;
    }else{
        if(!form.hora.value.indexOf(":")){
            alert("Por favor, escriba el formato de hora con ':' para separar horas y minutos");
            form.hora.select();
            return false;
        }
        else{
            tiempo=form.hora.value.split(":");
            if(tiempo.length!=2){
                alert("La hora es inválida");
                form.hora.select();
                return false;
            }
            if(tiempo[0]>=0||tiempo[0]<24){
                alert("La hora es inválida");
                form.hora.select();
                return false;
            }
            if(tiempo[1]>=0||tiempo[1]<60){
                alert("La hora es inválida");
                form.hora.select();
                return false;
            }
        }
    }
}

window.onload=function(){
    document.getElementById("guardar").onclick=function(){
        validarAsistencia(Fasist);
    }
}