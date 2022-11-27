valoresGuardados = [];

function guardarDatos(){
    x = document.getElementsByClassName("check");
    console.log(x);
    //console.log(JSON.stringify(x));
    for(i=0; i<x.length; i++){
        //console.log(x[i].value);
        console.log(x[i].checked);
    }
    x[1].checked = true; 
}

function guardarFehca(){
    //https://developer.mozilla.org/es/docs/Web/HTML/Element/input/date
    //x = document.getElementsByName("fecha");
    x = document.querySelector('input[type="date"]');
    //console.log(x[0].value);
    //x[0].value = "2017-06-01";
    x.value = "2030-06-01";
    //y = new Date(2014, 11, 11);
    //x = y;
}

// https://www.w3schools.com/JSREF/prop_checkbox_checked.asp
window.onload=function(){
    document.getElementById("guardar").onclick=function(){
        if(Finven.fecha.value==""){
            alert("No seleccionó la fecha");
            Finven.fecha.focus();
            return false;
        }
        guardarDatos();
        guardarFehca()
        return false;
    }
}