<?php
include("../variables.php");
include('../funciones.php');
$FechaGuardar=(isset($_REQUEST["fechaServs"])) ? $_REQUEST["fechaServs"] : "";
$cuentasGuardar=(isset($_REQUEST["usuario"]))? $_REQUEST["usuario"]:"";
if($FechaGuardar!=""){
    $ofrNuevo=(isset($_REQUEST["ofrendas"]))? $_REQUEST["ofrendas"]:"";
    $diezmoNuevo=(isset($_REQUEST["diezmo"]))? $_REQUEST["diezmo"]:"";
    $sql="UPDATE servicio SET Ofrenda='".$ofrNuevo."',Diezmo='".$diezmoNuevo."' WHERE Fecha='".$FechaGuardar."'";
    EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
    header("location: tablaServicios.php");
}else{
    $nombreNuevo=(isset($_REQUEST["nombre"]))? $_REQUEST["nombre"]:"";
    $paternoNuevo=(isset($_REQUEST["apellidoP"]))? $_REQUEST["apellidoP"]:"";
    $maternoNuevo=(isset($_REQUEST["apellidoM"]))? $_REQUEST["apellidoM"]:"";
    $celNuevo=(isset($_REQUEST["celular"]))? $_REQUEST["celular"]:"";
    if($nombreNuevo!=""){
        $sql="UPDATE usuario SET Nombre='".$nombreNuevo."'";
        EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
    }
    if($paternoNuevo!=""){
        $sql="UPDATE usuario SET APaterno='".$paternoNuevo."'";
        EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
    }
    if($maternoNuevo!=""){
        $sql="UPDATE usuario SET AMaterno='".$maternoNuevo."'";
        EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
    }
    if($celNuevo!=""){
        $sql="UPDATE usuario SET Celular='".$celNuevo."'";
        EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
    }

    header("location: tablaCuentas.php");
}
?>
