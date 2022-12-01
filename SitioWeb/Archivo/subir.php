<?php
    //https://code.tutsplus.com/es/tutorials/how-to-upload-a-file-in-php-with-example--cms-31763
    //https://www.php.net/manual/es/features.file-upload.php

    if(empty($_REQUEST["fecha"])){
        header("location: ../archivo.html?error=1");
        exit();
    }

    $fechaAux = filter_var($_REQUEST["fecha"], FILTER_SANITIZE_STRING);

    if(!validarFecha($fechaAux)){
        header("location: ../archivo.html?error=2");
        exit();
    }

    if (!isset($_FILES['upfile']['error']) || is_array($_FILES['upfile']['error'])) {
        header("location: ../archivo.html?error=3");
        exit();
    }

    switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            header("location: ../archivo.html?error=4");
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            header("location: ../archivo.html?error=4");
        default:
            header("location: ../archivo.html?error=4");
    }

    if ($_FILES['upfile']['size'] > 1000000) {
        header("location: ../archivo.html?error=5");
    }

    $fileName = $_FILES['upfile']['name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
    if (!in_array($fileExtension, $allowedfileExtensions)) {
        header("location: ../archivo.html?error=6");
    }
    /*
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['upfile']['tmp_name']),
        array(
            'xls' => 'application/xls'
        ),
        true
    )) {
        header("location: ../archivo.html?error=6");
    }*/

    if (!move_uploaded_file(
        $_FILES['upfile']['tmp_name'],
        sprintf('../upload/%s.%s',
            $fechaAux,
            "$fileExtension"
        )
    )) {
        header("location: ../archivo.html?error=7");
    }else{
        header("location: ../archivo.html?correcto=1");
    }

    /*
    if(isset($_POST['guardar'])){
 
        // Count total files
        //$countfiles = count($_FILES['file']['name']);
    
        // Looping all files
        //for($i=0;$i<$countfiles;$i++){
            $filename = $_FILES['file']['name'];
            echo "Entre aquí";
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'../upload/'.$filename);
     
        //}
    }
    */ 

    function validarFecha($fecha){
        //Año - mes - dia
        //parametros de checkDate
        // mes, dia y año
        $valores = explode('-', $fecha);
        if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])){
            return true;
        }
        return false;
    }
?>