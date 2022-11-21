<?php
    session_start();
    if(isset($_SESSION['usuario'])){
            $auxRol = $_SESSION['rol'];
            if($auxRol == "P"){
                header("location: pastor.html?resultado=111029");
                exit();
            }
            if($auxRol == "I"){
                header("location: integrante.html?resultado=2222");
                exit();
            }else{
                $auxRol = $_SESSION['ministerio'];
                ($auxRol == "V")?header("location: lider.html?resultado=333"):header("location: integrante.html?resultado=444");
                exit();
            }
    }else{
        include("inicioSesion.php");
    }

?>