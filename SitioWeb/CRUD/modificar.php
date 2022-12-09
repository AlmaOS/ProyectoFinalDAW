<?php
    include("../variables.php");
    include('../funciones.php');
    $filtro = (isset($_REQUEST["filtro"]))? $_REQUEST["filtro"] : "";
    $FechaGuardar = (isset($_REQUEST["fechaServs"])) ? $_REQUEST["fechaServs"] : "";
    $cuentasGuardar = (isset($_REQUEST["usuario"]))? $_REQUEST["usuario"]:"";
    
    if($filtro=="servicios"){
        $ofrNuevo=(isset($_REQUEST["ofrendas"]))? $_REQUEST["ofrendas"]:"";
        $diezmoNuevo=(isset($_REQUEST["diezmo"]))? $_REQUEST["diezmo"]:"";
        $sql="SELECT diezmo, ofrenda, totalRecaudaciones from servicio WHERE Fecha='".$FechaGuardar."'";
        $recauds=ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sql);
        if($diezmoNuevo!=""){
            $totalRecs=$recauds[0]["ofrenda"]+$diezmoNuevo;
            $sql="UPDATE servicio SET Diezmo='".$diezmoNuevo."', totalRecaudaciones='".$totalRecs."' WHERE Fecha='".$FechaGuardar."'";
            EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
        }
        if($ofrNuevo!=""){
            $totalRecs=$recauds[0]["diezmo"]+$ofrNuevo;
            $sql="UPDATE servicio SET ofrenda='".$ofrNuevo."', totalRecaudaciones='".$totalRecs."' WHERE Fecha='".$FechaGuardar."'";
            EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
        }

        header("location: tablaServicios.php");
    }else{
        $nombreNuevo=(isset($_REQUEST["nombre"]))? $_REQUEST["nombre"]:"";
        $paternoNuevo=(isset($_REQUEST["apellidoP"]))? $_REQUEST["apellidoP"]:"";
        $maternoNuevo=(isset($_REQUEST["apellidoM"]))? $_REQUEST["apellidoM"]:"";
        $celNuevo=(isset($_REQUEST["celular"]))? $_REQUEST["celular"]:"";
        if($nombreNuevo!=""){
            $sql="UPDATE usuario SET Nombre='".$nombreNuevo."' WHERE nombreUsu='".$cuentasGuardar."'";
            EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
        }
        if($paternoNuevo!=""){
            $sql="UPDATE usuario SET APaterno='".$paternoNuevo."' WHERE nombreUsu='".$cuentasGuardar."'";
            EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
        }
        if($maternoNuevo!=""){
            $sql="UPDATE usuario SET AMaterno='".$maternoNuevo."' WHERE nombreUsu='".$cuentasGuardar."'";
            EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
        }
        if($celNuevo!=""){
            $sql="UPDATE usuario SET Celular='".$celNuevo."' WHERE nombreUsu='".$cuentasGuardar."'";
            EjecutarSQL($servidor,$usuario,$contrasena,$basedatos,$sql);
        }

        header("location: tablaCuentas.php");
    }
?>
