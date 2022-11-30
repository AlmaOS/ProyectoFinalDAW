<?php
    /*
        Cuando el usuario quiere generar un archivo, se va ala base
        se revisa si hay ruta, si no hay, se genera y se descarga el archivo
        por otro lado si lo hay solo lo busca y descarga
    */ 
$fileimage = "../upload/Reporte(3).xls";
   header('Content-Description: File Transfer'); //

   header('Content-Type: application/octet-stream'); //tipomime, vas a tener que bajar el archivo

   header('Content-Disposition: attachment; filename='.basename($fileimage));

   header('Content-Transfer-Encoding: binary');// archivo binary, para que no haga algún cambio al archivo

   header('Expires: 0');// no quiero que se quede en caché

   header('Cache-Control: must-revalidate'); 

   header('Pragma: public'); //archivo publico

   header('Content-Length: ' . filesize($fileimage)); //tamaño de archivo

   ob_clean(); //borrar buffer de salida
   flush(); //descargo
   readfile($fileimage); //envio el archivo
   exit();
?>