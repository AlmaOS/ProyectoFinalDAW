<?php
    if (empty($_REQUEST["usuario"]) || empty($_REQUEST["contrasena"])) {
        header("location:../inicioSesion.php?error=1");
        exit();
    }

    $usu = filter_var($_REQUEST["usuario"], FILTER_SANITIZE_STRING);
    $contra = filter_var($_REQUEST["contrasena"], FILTER_SANITIZE_STRING);

    include("../variables.php");

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
    if (!$conexion) {
        die("Fallo: " . mysqli_connect_error());
    }

    include("../funciones.php");
    $sentenciaSQL = "SELECT 	ClvUsuario, NombreUsu, contrasena, Rol, Ministerio FROM usuario WHERE NombreUsu ='" . $usu . "' AND contrasena ='" . $contra . "'";
    $registros = ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);

    $numerosEntidades = count($registros);

    if ($numerosEntidades > 0) {
        $auxRol = strtoupper(strval($registros[0]["Rol"]));
        $auxMinisterio = strtoupper(strval($registros[0]["Ministerio"]));
        if($auxRol == "P"){
            iniciarVaribleSesion($registros, $usu, $auxRol, $auxMinisterio);
            header("location: ../pastor.html");
            exit();
        }
        if($auxRol == "I"){
            iniciarVaribleSesion($registros, $usu, $auxRol, $auxMinisterio);
            header("location: ../integrante.html?correcto=1");
            exit();
        }else{
            iniciarVaribleSesion($registros, $usu, $auxRol, $auxMinisterio);
            ($auxMinisterio == "V")?header("location: ../lider.html"):header("location: ../integrante.html");
            exit();
        }
    } else {
        header("location: redireccionar.php?error=2");
        exit();
    }

    function iniciarVaribleSesion($registros, $usu, $auxRol, $auxMinisterio){
        session_start();
            $_SESSION['ClvUsuario'] = $registros[0]["ClvUsuario"];
	        $_SESSION['usuario'] = $usu;
            $_SESSION['rol'] = $auxRol;
            $_SESSION['ministerio'] = $auxMinisterio;
    }
?>