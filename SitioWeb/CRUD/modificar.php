<?php
include("../variables.php");
include('../funciones.php');
$FechaGuardar=(isset($_REQUEST["fechaServs"])) ? $_REQUEST["fechaServs"] : "";
//$cuentasGuardar=(isset($_REQUEST["cuentas"]))? $_REQUEST["cuentas"]:"";
if($FechaGuardar!=""){
    $ofrNuevo=(isset($_REQUEST["ofrendas"]))? $_REQUEST["ofrendas"]:"";
    $diezmoNuevo=(isset($_REQUEST["diezmo"]))? $_REQUEST["diezmo"]:"";
    $sql="UPDATE servicio SET Ofrenda='".$ofrNuevo."',Diezmo='".$diezmoNuevo."' WHERE Fecha='".$FechaGuardar."'";
    EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
    header("location: tablaServicios.php");
}/*else{
    for($i=0;$i<count($cuentasBorrar);$i++){
        $sql="DELETE FROM usuario WHERE ClvUsuario='".$cuentasBorrar[$i]."'";
        EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
    }
    header("location: tablaCuentas.php");
}*/
?>
