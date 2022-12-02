<?php
    function descargarArchivo($nombreArchivo){
        $fileimage = "../upload/".$nombreArchivo;
        header('Content-Description: File Transfer'); 

        header('Content-Type: application/octet-stream'); 

        header('Content-Disposition: attachment; filename='.basename($fileimage));

        header('Content-Transfer-Encoding: binary');

        header('Expires: 0');

        header('Cache-Control: must-revalidate'); 

        header('Pragma: public');

        header('Content-Length: ' . filesize($fileimage));

        ob_clean(); 
        flush(); 
        readfile($fileimage); 
        exit();
    }
?>