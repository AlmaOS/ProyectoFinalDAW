function asignarModo() {
    var cadena;
    var estilo = getCookie("estilo");

    if ( estilo == "") {
        cadena = "<link rel='stylesheet' href='css/interfazSesionesClaro.css'>"
        document.getElementById("bModo").value="Oscuro"
    } else {
        cadena = "<link rel='stylesheet' href='css/interfazSesiones"+estilo+".css'>"
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
        var nameEQ = name + "=";
        var ca = document.cookie.split(";");
        for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while(c.charAt(0)=="")
                c = c.substring(1,c.length);
            if( c.indexOf(nameEQ) == 0)
                return c.substring(nameEQ.length, c.length);
        }
        return "";
    }else{
        return "";
    }

}

window.onload=function(){
    asignarModo();
    modo=document.getElementById("bModo").value;
    document.getElementById("bModo").onclick=function () {
        cambiarModo(modo);
    }
}

