<?php
    if(empty($_REQUEST["clave"]) || empty($_REQUEST["usuarioR"]) || empty($_REQUEST["contrasenaR"])){
      header("location:redireccionar.php?error=20");//"location:../inicioSesion.php?error=1"
       exit();
    }

    $claveUser = filter_var($_REQUEST["clave"], FILTER_SANITIZE_STRING);
    $user = filter_var($_REQUEST["usuarioR"], FILTER_SANITIZE_STRING);
    $contra = filter_var($_REQUEST["contrasenaR"], FILTER_SANITIZE_STRING);

    include("../variables.php");

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
    if (!$conexion) {
        die("Fallo: " . mysqli_connect_error());
    }

    $sql = "UPDATE usuario SET NombreUsu='".$user."', contrasena='".$contra."' WHERE ClvUsuario='".$claveUser."'";
    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    header("location:../inicioSesion.php/#");
    exit();
?>
