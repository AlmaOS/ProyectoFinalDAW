function ocultarPanelEstado(panelEstado) {
    document.getElementById("estado").style.display = "none";
}

function mostarMensaje(mensaje){
    document.getElementById("estado").style.display = "flex";
    panelEstado = document.getElementById("textoEstado");
    panelEstado.innerHTML+= mensaje;
    setTimeout(ocultarPanelEstado, 3000);
}

function mostrarMensajes(estadosMensajes){
    partesMensaje = estadosMensajes.split("_");
    //alert("Mensase 1 es: "+ partesMensaje[0]+" "+ partesMensaje[1]);
    if (estadosMensajes != "") {
        switch (partesMensaje[1]) {
            case '1':
                mostarMensaje("campos vacios");
              break;
            case '2':
                mostarMensaje("Formato incorrecto de fecha u hora");
              break;
            case '3':
                mostarMensaje("Ya hay una asistencia guardada");
            break;
            default:
          }
    }
}

window.onload=function(){

    document.getElementById("estado").style.display = "none";
    mostrarMensajes(estado);

    document.getElementById("guardar").onclick=function(){
        if(Fasist.fecha.value==""){
            alert("No seleccionó la fecha");
            Fasist.fecha.focus();
            return false;
        }
    
        for(i=0; i<Fasist.presente.length; i++){
            if(Fasist.presente[i].checked) break;
        }

        if(i == Fasist.presente.length) {
            alert("No seleccionó su asistencia");
            Fasist.presente[0].focus();
            return false;
        }
    
        if(Fasist.hora.value==""){
            alert("No escribió su hora");
            Fasist.hora.select();
            return false;
        }else{
            if(!Fasist.hora.value.indexOf(":")){
                alert("Por favor, escriba el formato de hora con ':' para separar horas y minutos");
                Fasist.hora.select();
                return false;
            }else{
                tiempo=Fasist.hora.value.split(":");
                if(tiempo.length!=2){
                    alert("La hora es inválida");
                    Fasist.hora.select();
                    return false;
                }
                if(tiempo[0]<=0 || tiempo[0]>24){
                    alert("La hora es inválida");
                    Fasist.hora.select();
                    return false;
                }
                if(tiempo[1]<0 || tiempo[1]>60){
                    alert("La hora es inválida");
                    Fasist.hora.select();
                    return false;
                }
                return true;
            }
        }
    }
}