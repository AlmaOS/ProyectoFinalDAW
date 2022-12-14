<?php
    if(empty($_REQUEST["clave"]) || empty($_REQUEST["usuarioR"]) || empty($_REQUEST["contrasenaR"])){
      header("location:redireccionar.php?error=3");//"location:../inicioSesion.php?error=1"
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

    include("../funciones.php");
    $sentenciaSQL = "SELECT ClvUsuario, NombreUsu, contrasena FROM usuario";
    $registros = ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
    $numerosEntidades = count($registros);

    function buscarClave($numerosEntidades,$registros,$claveUser){
        $encontrado = false;
        for($i=0;$i<$numerosEntidades;$i++){
            if($registros[$i]["ClvUsuario"] == $claveUser){
                $encontrado = true;
                break;
            }
        }
        return $encontrado;
    }

    function usuarioRegistrado($numerosEntidades,$registros,$claveUser){
        $registrado = true;
        for($i=0;$i<$numerosEntidades;$i++){
          if($registros[$i]["NombreUsu"] == $claveUser."_vida"){
              if($registros[$i]["contrasena"] == $claveUser."_vida"){
                  $registrado = false;
                  break;
              }
          }
        }
        return $registrado;
    }

    $clvEncontrada = buscarClave($numerosEntidades,$registros,$claveUser);
    $userRegistrado = usuarioRegistrado($numerosEntidades,$registros,$claveUser);
    if($clvEncontrada){
        if(!$userRegistrado){
            $sql = "UPDATE usuario SET NombreUsu='".$user."', contrasena='".$contra."' WHERE ClvUsuario='".$claveUser."'";
            $resultado = mysqli_query($conexion, $sql);
            mysqli_close($conexion);
            header("location:redireccionar.php?error=5");
        }else{
            header("location:redireccionar.php?error=6");
        }
    }else{
        header("location:redireccionar.php?error=4");
    }

?>
