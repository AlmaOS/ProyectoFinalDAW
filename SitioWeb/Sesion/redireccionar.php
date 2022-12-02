<?php
    session_start();
    if(isset($_SESSION['usuario'])){
            $auxRol = $_SESSION['rol'];
            if($auxRol == "P"){
                header("location: ../pastor.html");
                exit();
            }
            if($auxRol == "I"){
                header("location: ../integrante.html");
                exit();
            }else{
                $auxRol = $_SESSION['ministerio'];
                ($auxRol == "V")?header("location: ../lider.html"):header("location: ../integrante.html");
                exit();
            }
    }else{
        include("../inicioSesion.php");
    }

?>