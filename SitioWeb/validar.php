<?php
    if (empty($_REQUEST["usuario"]) || empty($_REQUEST["contrasena"])) {
        header("location: index.php");
        exit();
    }

    $usu = filter_var($_REQUEST["usuario"], FILTER_SANITIZE_STRING);
    $contra = filter_var($_REQUEST["contrasena"], FILTER_SANITIZE_STRING);

    include("variables.php");

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
    if (!$conexion) {
        die("Fallo: " . mysqli_connect_error());
    }

    $sql = "SELECT 	NombreUsu, contrasena, Rol, Ministerio FROM usuario WHERE NombreUsu ='" . $usu . "' AND contrasena ='" . $contra . "'";
    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);

    for ($registros = array (); $fila = mysqli_fetch_assoc($resultado); $registros[] = $fila);
    $numerosEntidades = count($registros);

    if ($numerosEntidades > 0) {
        $auxRol = strtoupper(strval($registros[0]["Rol"]));
        if($auxRol == "P"){
            header("location: pastor.html?resultado=111");
            exit();
        }
        if($auxRol == "I"){
            header("location: integrante.html?resultado=2222");
            exit();
        }else{
            $auxRol = strtoupper(strval($registros[0]["Ministerio"]));
            ($auxRol == "V")?header("location: lider.html?resultado=333"):header("location: integrante.html?resultado=444");
            exit();
        }
        
    } else {
        header("location: index.php?resultado=2");
    }

?>