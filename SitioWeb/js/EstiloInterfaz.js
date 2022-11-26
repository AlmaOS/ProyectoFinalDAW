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

function verficiarFechaInicio(){
    var fechaAuxiliar = getCookie("INICIO");
    if(fechaAuxiliar == ""){
        fecha = new Date();
        SetCookie("INICIO",fecha.toLocaleDateString());
        insertarVersiculo();
    }else{
        fechaIngresoNuevo = new Date();
        var nuervaFechaIngre = fechaIngresoNuevo.toLocaleDateString();
        if(fechaAuxiliar != nuervaFechaIngre){
            fecha = new Date();
            SetCookie("INICIO","");
            SetCookie("INICIO",nuervaFechaIngre);
            insertarVersiculo();
        }else{
            insertarVersiculo();
        }
    }
}

function insertarVersiculo(){
    texttoEjemplo = '{"book":{"abbrev":{"pt":"sl","en":"ps"},"name":"Salmos","author":"David, Moisés, Salomão","group":"Poéticos","version":"rvr"},"chapter":117,"number":1,"text":"ALABAD á Jehová, naciones todas; Pueblos todos, alabadle."}';
    const obj = JSON.parse(texttoEjemplo);

    var elemento = document.getElementById("prueba");
    elemento.innerHTML = obj.text+"<br>"+"Salmos"+obj.chapter+":"+obj.number;
}

window.onload=function(){
    asignarModo();
    modo = document.getElementById("bModo").value;
    document.getElementById("bModo").onclick=function () {
        cambiarModo(modo);
    }

    verficiarFechaInicio();
}