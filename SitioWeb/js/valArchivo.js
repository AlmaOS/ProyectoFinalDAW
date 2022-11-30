window.onload = function(){
    document.getElementById("descargarArchivo").onclick=function(){
        if(FArchivoB.fecha.value==""){
            alert("No seleccionó la fecha");
            FArchivoB.fecha.focus();
            return false;
        }
        return true;
    }

}