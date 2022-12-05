function ocultarPanelEstado(panelEstado) {
    document.getElementById("estado").style.display = "none";
}

function mostarMensaje(mensaje){
    document.getElementById("estado").style.display = "flex";
    panelEstado = document.getElementById("textoEstado");
    panelEstado.innerHTML+= mensaje;
    setTimeout(ocultarPanelEstado, 3000);
}

function mostrarMensajes(estadosMensajes){
    partesMensaje = estadosMensajes.split("_");
    //alert("Mensase 1 es: "+ partesMensaje[0]+" "+ partesMensaje[1]);
    if (estadosMensajes != "") {
        switch (partesMensaje[1]) {
            case '1':
                mostarMensaje("Fecha vacia");
              break;
            case '2':
                mostarMensaje("Formato de fecha incorrecto");
              break;
            case '3':
                mostarMensaje("El servicio no ha sido creado o no se ha pasado inventario");
            break;
            case '4':
                mostarMensaje("Sucedi&oacute; un error con la subida del archivo");
            break;
            case '5':
                mostarMensaje("Archivo demsiado pesado");
            break;
            case '6':
                mostarMensaje("No es correcto el tipo de archivo");
            break;
            default:
          }
    }
}

window.onload = function(){
    document.getElementById("estado").style.display = "none";
    mostrarMensajes(estado);

    document.getElementById("descargarArchivo").onclick=function(){
        if(FArchivoB.fecha.value==""){
            alert("No seleccionó la fecha");
            FArchivoB.fecha.focus();
            return false;
        }
        return true;
    }

    document.getElementById("guardarArchivo").onclick=function(){
        extensiones_permitidas = new Array(".xls");

        if(formu2.fecha.value==""){
            alert("No seleccionó la fecha");
            formu2.fecha.focus();
            return false;
        }
        if(!formu2.file.value){
            alert("No seleccionó el archivo");
            formu2.file.focus();
            return false;
        }

        // Obtener nombre de archivo
        let archivo = formu2.file.value;
        // Obtener extensión del archivo
            extension =  (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
        // Si la extensión obtenida no está incluida en la lista de valores
        // del atributo "accept", mostrar un error.
        permitida = false;
      for (var i = 0; i < extensiones_permitidas.length; i++) {
         if (extensiones_permitidas[i] == extension) {
         permitida = true;
         break;
         }
      }

        if(!permitida) {
            alert('Archivo inválido. No se permite la extensión ' + extension);
            return false;
        }
        return true;
    }

}