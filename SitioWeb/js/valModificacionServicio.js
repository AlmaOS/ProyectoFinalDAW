window.onload = function(){
    document.getElementById("guardar").onclick=function(){
        return validarModificacion(Frecauds);
    }
}

function validarModificacion(Frecauds){
    x = document.getElementById("fechaSelec");
    opcion =  x.options[x.selectedIndex].text;
    if(opcion == ""){
        alert("No seleccionó una fecha");
        form.fechaServs.focus();
        return false;
    }

    if(Frecauds.ofrendas.value==""){
        return confirm("Las ofrendas no se cambiarán, ¿es correcto?");
    }else{
        if(isNaN(Frecauds.ofrendas.value)) {
            alert("Cantidad de ofrendas inválida");
            Frecauds.ofrendas.select();
            return false;
        }
    }

    if(Frecauds.diezmo.value==""){
        return confirm("El diezmo no se cambiará, ¿es correcto?");
    }else {
        if (isNaN(Frecauds.diezmo.value)) {
            alert("Cantidad de diezmo inválida");
            Frecauds.diezmo.select();
            return false;
        }
    }
}