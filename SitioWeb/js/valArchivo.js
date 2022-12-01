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