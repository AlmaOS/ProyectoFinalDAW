window.onload=function(){
    document.getElementById("guardar").onclick=function(){
        if(Frecauds.fecha.value==""){
            alert("No seleccionó la fecha");
            Frecauds.fecha.focus();
            return false;
        }
    
        if(Frecauds.ofrendas.value==""){
            alert("Cantidad de ofrendas inválida");
            Frecauds.ofrendas.select();
            return false;
        }
        if(isNaN(Frecauds.ofrendas.value)){
            alert("Cantidad de ofrendas inválida");
            Frecauds.ofrendas.select();
            return false;
        }
    
        if(Frecauds.diezmo.value==""){
            alert("Cantidad de diezmo inválida");
            Frecauds.diezmo.select();
            return false;
        }
        if(isNaN(Frecauds.diezmo.value)){
            alert("Cantidad de diezmo inválida");
            Frecauds.diezmo.select();
            return false;
        }
        return true;
    }
}