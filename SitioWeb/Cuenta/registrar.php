<?php
include("../variables.php");
include("../funciones.php");

    validarEntradas();

    $nombre = filter_var($_REQUEST["nombre"], FILTER_SANITIZE_STRING);
    $apellidoP = filter_var($_REQUEST["apellidoP"], FILTER_SANITIZE_STRING);
    $apellidoM = filter_var($_REQUEST["apellidoM"], FILTER_SANITIZE_STRING);
    $celular = filter_var($_REQUEST["celular"], FILTER_SANITIZE_STRING);
    $posicion = filter_var($_REQUEST["posicion"], FILTER_SANITIZE_STRING);
    $minis = filter_var($_REQUEST["ministerio"], FILTER_SANITIZE_STRING);

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
    if (!$conexion) {
        die("Fallo: " . mysqli_connect_error());
    }

    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $apellidoP = mysqli_real_escape_string($conexion, $apellidoP);
    $apellidoM = mysqli_real_escape_string($conexion, $apellidoM);
    $celular = mysqli_real_escape_string($conexion, $celular);
    $posicion = mysqli_real_escape_string($conexion, $posicion);
    $minis = mysqli_real_escape_string($conexion, $minis);

    if (empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($celular) || empty($posicion) || empty($minis)) {
        header("location: ../cuentas.php?error=2");
        exit();
    }

    if(!is_numeric($celular)){
        header("location: ../cuentas.php?error=2");
        exit();
    }

    $rol = guardarRol($posicion);
    $ministerio = guardarMinisterio($minis);

    $sql="SELECT ClvUsuario FROM usuario";

    try {
        $resultado = mysqli_query($conexion, $sql);
    } catch(Exception $e) {
        mysqli_close($conexion);
        header("location: ../cuentas.php?error=3");
        exit();
    }

    for ($registros = array (); $fila = mysqli_fetch_assoc($resultado); $registros[] = $fila);
    $noRegistros=count($registros);
    $id=$registros[$noRegistros-1]["ClvUsuario"]+1;

    $sql="INSERT INTO usuario (rol, Nombre, APaterno, AMaterno, Celular,Ministerio) VALUES('";
    $sql.=$rol."','".$nombre."','".$apellidoP."','".$apellidoM."','".$celular."','".$ministerio."')";

    try {
        $resultado = mysqli_query($conexion, $sql);
    } catch(Exception $e) {
        mysqli_close($conexion);
        header("location: ../cuentas.php?error=4");
        exit();
    }

    $sql="SELECT ClvUsuario FROM usuario WHERE nombre='".$nombre."'AND Apaterno='".$apellidoP."'";
    try {
        $resultado = mysqli_query($conexion, $sql);
    }catch(Exception $e) {
        mysqli_close($conexion);
        header("location: ../cuentas.php?error=5");
        exit();
    }

    for ($registros = array (); $fila = mysqli_fetch_assoc($resultado); $registros[] = $fila);
    $claveUsuario = $registros[0]["ClvUsuario"];
    $sql="UPDATE usuario SET NombreUsu='".$claveUsuario."_vida', contrasena='".$claveUsuario."_vida' WHERE nombre='".$nombre."'AND Apaterno='".$apellidoP."'";
    try {
        $resultado = mysqli_query($conexion, $sql);
    }catch(Exception $e) {
        mysqli_close($conexion);
        header("location: ../cuentas.php?error=5");
        exit();
    }


    mysqli_close($conexion);
    header("location: ../CRUD/tablaCuentas.php");

    function validarEntradas(){
        if (!isset($_REQUEST["nombre"]) || !isset($_REQUEST["apellidoP"]) || !isset($_REQUEST["apellidoM"])
            || !isset($_REQUEST["celular"]) || !isset($_REQUEST["posicion"])||!isset($_REQUEST["ministerio"])){
            header("location: ../cuentas.php?error=1");
        }
    }

    function guardarRol($posicion){
        switch($posicion){
            case "lider":
                return "L";
            case "integrante":
                return "I";
        }
    }

    function guardarMinisterio($minis){
        switch ($minis){
            case "Alabanza":
                return "A";
            case "Voluntariado":
                return "V";
        }
    }
?>
