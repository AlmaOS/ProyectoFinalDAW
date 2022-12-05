<?php
    if(!isset($_REQUEST["fecha"])){
        header("location: ../archivo.php?error=1");
        exit();
    }

    if(empty($_REQUEST["fecha"])){
        header("location: ../archivo.php?error=1");
        exit();
    }

    $fechaAux = filter_var($_REQUEST["fecha"], FILTER_SANITIZE_STRING);

    if(!validarFecha($fechaAux)){
        header("location: ../archivo.php?error=2");
        exit();
    }

    if (!isset($_FILES['upfile']['error']) || is_array($_FILES['upfile']['error'])) {
        header("location: ../archivo.php?error=4");
        exit();
    }

    switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            header("location: ../archivo.php?error=4");
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            header("location: ../archivo.php?error=5");
        default:
            header("location: ../archivo.php?error=4");
    }

    if ($_FILES['upfile']['size'] > 1000000) {
        header("location: ../archivo.php?error=5");
    }

    $fileName = $_FILES['upfile']['name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $allowedfileExtensions = array('xls');
    if (!in_array($fileExtension, $allowedfileExtensions)) {
        header("location: ../archivo.php?error=6");
    }

    if (!move_uploaded_file(
        $_FILES['upfile']['tmp_name'],
        sprintf('../upload/%s.%s',
            $fechaAux,
            "$fileExtension"
        )
    )) {
        header("location: ../archivo.php?error=4");
    }else{
        header("location: ../archivo.php?correcto=1");
    }

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