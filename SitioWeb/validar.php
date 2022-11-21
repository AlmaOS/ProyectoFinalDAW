<?php
//Cuando se de para ir a la página de iniciar sesión nos manda aquí
// donde verificamos si hay sesion, si la hay vamos vemos a donde mandar al usuario, si no la hay
//mandamos a inicio de sesion .html
// https://www.youtube.com/watch?v=Tb-_cEAsp4s
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
            session_start();
	        $_SESSION['usuario'] = $usu;
            $_SESSION['rol'] = $auxRol;
            $_SESSION['ministerio'] = $registros[0]["Ministerio"];
            header("location: pastor.html?resultado=112112");
            exit();
        }
        if($auxRol == "I"){
            session_start();
	        $_SESSION['usuario'] = $usu;
            $_SESSION['rol'] = $registros[0]["Rol"];
            $_SESSION['ministerio'] = $registros[0]["Ministerio"];
            header("location: integrante.html?resultado=2121212");
            exit();
        }else{
            $auxRol = strtoupper(strval($registros[0]["Ministerio"]));
            
            session_start();
	        $_SESSION['usuario'] = $usu;
            $_SESSION['rol'] = strtoupper(strval($registros[0]["Rol"]));
            $_SESSION['ministerio'] = $auxRol;

            ($auxRol == "V")?header("location: lider.html?resultado=33344"):header("location: integrante.html?resultado=44455");
            exit();
        }
        
    } else {
        header("location: inicioSesion.html?resultado=200");
        exit();
    }

?>