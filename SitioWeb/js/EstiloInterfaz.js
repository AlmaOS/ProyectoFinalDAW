function asignarModo() {
    var cadena;
    var estilo = getCookie("estilo");
    if ( estilo == "") {
        cadena = "<link rel='stylesheet' href='css/interfazSesionesClaro"+".css"+"?cambio="+Math.floor(Math.random() * 10)+"'"+">"
        document.getElementById("bModo").value="Oscuro"
    } else {
        cadena = "<link rel='stylesheet' href='css/interfazSesiones"+estilo+".css?cambio="+Math.floor(Math.random() * 10)+"'"+">";
        if(estilo=="Oscuro"){
            document.getElementById("bModo").value="Claro";
        }else{
            document.getElementById("bModo").value="Oscuro";
        }
    }
    document.head.innerHTML+=cadena;
}

function cambiarModo(estilo){
    SetCookie("estilo",estilo);
    window.location.reload();
}

function SetCookie(name, value, expires) {
    if(expires) {
        var date = new Date();
        date.setTime(date.getTime()+(numDays*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }else
        var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(name) {
    if(document.cookie){
        var busca;
        var lista = document.cookie.split(";");
            for (i in lista) {
                busca = lista[i].search(name);
                if (busca > -1) {micookie=lista[i]}
            }
            if(busca>-1){
                var igual = micookie.indexOf("=");
                var valor = micookie.substring(igual+1);
                return valor;
            }else{
                return "";
            }
            
    }else{
        return "";
    }
}

window.onload=function(){
    asignarModo();
    modo = document.getElementById("bModo").value;
    document.getElementById("bModo").onclick=function () {
        cambiarModo(modo);
    }
}