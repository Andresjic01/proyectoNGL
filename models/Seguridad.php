<?php

    session_start();

    if(!isset($_SESSION['AUTENTICADO'])){
        echo '<script> 
        aler("Por favor tienes que iniciar sesion");
        window.location.href="../index.html";
        </script>';
    }

    if($_SESSION['AUTENTICADO'] !="si"){
        echo '<script>window.history.back();</script>';
    }



?>