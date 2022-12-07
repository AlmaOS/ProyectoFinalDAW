function validarCuenta(form){
    x = document.getElementById("usuarioSelect");
    opcion =  x.options[x.selectedIndex].text;
    if(opcion == ""){
        alert("No seleccionó un Usuario");
        form.usuario.focus();
        return false;
    }

    if(form.nombre.value==""){
        alert("Nombre inválido");
        form.nombre.select();
        return false;
    }
    if(form.apellidoP.value==""){
        alert("Apellido paterno inválido");
        form.apellidoP.select();
        return false;
    }
    if(form.apellidoM.value==""){
        alert("Apellido materno inválido");
        form.apellidoM.select();
        return false;
    }
    if(form.celular.value==""){
        alert("Celular inválido");
        form.celular.select();
        return false;
    }
    if(isNaN(form.celular.value)){
        alert("Celular inválido");
        form.celular.select();
        return false;
    }

    cel = form.celular.value;
    if(cel.length >10 || cel.length<10){
        alert("Celular inválido por longitud");
        form.celular.select();
        return false;
    }
}

function mostrarPantalla(arregloUsuario, form){
    auxArray = [].concat(arregloUsuario)
    var x = document.getElementById("usuarioSelect");
    opcion =  x.options[x.selectedIndex].text;
    if(opcion!= ""){
        const resultado = auxArray.find( element => element.NombreUsu === opcion );
        form.nombre.value = resultado.Nombre;
        form.apellidoP.value = resultado.APaterno;
        form.apellidoM.value = resultado.AMaterno;
        form.celular.value = resultado.Celular;
    }
    
}

window.onload=function(){
    document.getElementById("guardar").onclick=function(){
        return validarCuenta(info);
    }

    document.getElementById("usuarioSelect").onchange = function(){ 
        mostrarPantalla(arregloUsuario, info);
    }
}