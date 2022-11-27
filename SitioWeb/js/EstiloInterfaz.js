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

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

function verficiarFechaInicio(){
    var fechaAuxiliar = getCookie("INICIO");
    if(fechaAuxiliar == ""){
        fecha = new Date();
        SetCookie("INICIO",fecha.toLocaleDateString());
        makeRequest("https://www.abibliadigital.com.br/api/verses/rvr/prv/random")
        insertarVersiculo();
        console.log("Se inicio por primera vez");
    }else{
        fechaIngresoNuevo = new Date();
        var nuervaFechaIngre = fechaIngresoNuevo.toLocaleDateString();
        if(fechaAuxiliar != nuervaFechaIngre){
            fecha = new Date();
            SetCookie("INICIO","");
            SetCookie("INICIO",nuervaFechaIngre);
            makeRequest("https://www.abibliadigital.com.br/api/verses/rvr/prv/random")
            insertarVersiculo();
            console.log("Se inicio en diferente dia");
        }else{
            console.log("Se inicio el mismo dia");
            insertarVersiculo();
        }
    }
}

function insertarVersiculo(){
    //Lee del localStorable
    //texttoEjemplo = '{"booook":{"abbrev":{"pt":"sl","en":"ps"},"name":"Salmos","author":"David, Moisés, Salomão","group":"Poéticos","version":"rvr"},"chapter":117,"number":1,"text":"ALABAD á Jehová, naciones todas; Pueblos todos, alabadle."}';
    aux = localStorage.getItem("Versi");
    console.log(aux+"imprime");
    if(aux == null){
        texttoEjemplo = '{"book": { "abbrev": {"pt": "pv","en": "prv"}, "name": "Provérbios", "author": "Salomão","group": "Poéticos","version": "rvr"},"chapter": 27,"number": 6, "text": "Son más confiables las heridas del que ama, que los falsos besos del que aborrece."}';
        console.log("no entra aquíiiiiii");
    }else{
        texttoEjemplo = localStorage.getItem("Versi");
        console.log("no entra aquí");
    }
    const obj = JSON.parse(texttoEjemplo);
    var elemento = document.getElementById("prueba");
    elemento.innerHTML = obj.text+"<br>"+"Proverbios "+obj.chapter+":"+obj.number;
}

var http_request = false;
    function makeRequest(url) {

        http_request = false;

        if (window.XMLHttpRequest) { // Mozilla, Safari,...
            http_request = new XMLHttpRequest();
            if (http_request.overrideMimeType) {
                http_request.overrideMimeType('text/xml');
                // Ver nota sobre esta linea al final
            }
        } else if (window.ActiveXObject) { // IE
            try {
                http_request = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    http_request = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {}
            }
        }

        if (!http_request) {
            alert('Falla :( No es posible crear una instancia XMLHTTP');
            return false;
        }
        http_request.onreadystatechange = alertContents;
        http_request.open('GET', url, true);
        http_request.send();

    }

    function alertContents() {
        if (http_request.readyState == 4) {
            if (http_request.status == 200) {
                localStorage.setItem("Versi", http_request.responseText);
            } else {
                alert('Hubo problemas con la petición.');
                localStorage.setItem("Versi", '{"book": { "abbrev": {"pt": "pv","en": "prv"}, "name": "Provérbios", "author": "Salomão","group": "Poéticos","version": "rvr"},"chapter": 27,"number": 6, "text": "Son más confiables las heridas del que ama, que los falsos besos del que aborrece."}');
                console.log("Se llegó al limite de peticiones");
            }
        }

    }

window.onload=function(){
    asignarModo();
    modo = document.getElementById("bModo").value;
    verficiarFechaInicio();
    document.getElementById("bModo").onclick=function () {
        cambiarModo(modo);
    }
}