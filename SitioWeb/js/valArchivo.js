window.onload = function(){
    document.getElementById("descargarArchivo").onclick=function(){
        if(FArchivoB.fecha.value==""){
            alert("No seleccionó la fecha");
            FArchivoB.fecha.focus();
            return false;
        }
        return true;
    }

    document.getElementById("guardarArchivo").onclick=function(){
        if(formu2.fecha.value==""){
            alert("No seleccionó la fecha");
            formu2.fecha.focus();
            return false;
        }
        return true;
    }

}