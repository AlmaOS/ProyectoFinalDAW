<?php
    if (empty($_REQUEST["usuario"]) || empty($_REQUEST["contrasena"])) {
        header("location:../inicioSesion.php");
        exit();
    }

    $usu = filter_var($_REQUEST["usuario"], FILTER_SANITIZE_STRING);
    $contra = filter_var($_REQUEST["contrasena"], FILTER_SANITIZE_STRING);

    include("../variables.php");

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
    if (!$conexion) {
        die("Fallo: " . mysqli_connect_error());
    }

    $sql = "SELECT 	ClvUsuario, NombreUsu, contrasena, Rol, Ministerio FROM usuario WHERE NombreUsu ='" . $usu . "' AND contrasena ='" . $contra . "'";
    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);

    for ($registros = array (); $fila = mysqli_fetch_assoc($resultado); $registros[] = $fila);
    $numerosEntidades = count($registros);

    if ($numerosEntidades > 0) {
        $auxRol = strtoupper(strval($registros[0]["Rol"]));
        if($auxRol == "P"){
            session_start();
            $_SESSION['ClvUsuario'] = $registros[0]["ClvUsuario"];
	        $_SESSION['usuario'] = $usu;
            $_SESSION['rol'] = $auxRol;
            $_SESSION['ministerio'] = $registros[0]["Ministerio"];
            header("location: ../pastor.html?resultado=112112");
            exit();
        }
        if($auxRol == "I"){
            session_start();
            $_SESSION['ClvUsuario'] = $registros[0]["ClvUsuario"];
	        $_SESSION['usuario'] = $usu;
            $_SESSION['rol'] = $registros[0]["Rol"];
            $_SESSION['ministerio'] = $registros[0]["Ministerio"];
            header("location: ../integrante.html?resultado=2121212&clv=$registros[0]['ClvUsuario']");
            exit();
        }else{
            $auxRol = strtoupper(strval($registros[0]["Ministerio"]));
            session_start();
            $_SESSION['ClvUsuario'] = $registros[0]["ClvUsuario"];
	        $_SESSION['usuario'] = $usu;
            $_SESSION['rol'] = strtoupper(strval($registros[0]["Rol"]));
            $_SESSION['ministerio'] = $auxRol;
            ($auxRol == "V")?header("location: ../lider.html?resultado=33344"):header("location: ../integrante.html?resultado=44455");
            exit();
        }
    } else {
        header("location: redireccionar.php?resultado=200");
        exit();
    }

?>