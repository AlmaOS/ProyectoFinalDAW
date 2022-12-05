<?php
include("../variables.php");
include('../funciones.php');
$filtro=(isset($_REQUEST["filtro"]))? $_REQUEST["filtro"]:"";
$serviciosBorrar=(isset($_REQUEST["servicios"])) ? $_REQUEST["servicios"] : "";
$cuentasBorrar=(isset($_REQUEST["cuentas"]))? $_REQUEST["cuentas"]:"";

if($filtro=="Servicios") {
    if ($serviciosBorrar != "") {
        for ($i = 0; $i < count($serviciosBorrar); $i++) {
            $sql = "DELETE FROM servicio WHERE Fecha='" . $serviciosBorrar[$i] . "'";
            EjecutarSQL($servidor, $usuario, $contrasena, $basedatos, $sql);
        }
    }
    header("location: tablaServicios.php");
}else{
    if ($cuentasBorrar != "") {
        for ($i = 0; $i < count($cuentasBorrar); $i++) {
            $sql = "DELETE FROM usuario WHERE ClvUsuario='" . $cuentasBorrar[$i] . "'";
            EjecutarSQL($servidor, $usuario, $contrasena, $basedatos, $sql);
        }
    }
    header("location: tablaCuentas.php");
}

?>
