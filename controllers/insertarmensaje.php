<?php

require_once("../models/conexion.php");
require_once("../models/consultas.php");

    $mensaje= $_POST['texto'];
    $id = $_POST['id'];

    if(strlen($mensaje)>0){

        $objConsultas = new Consultas();
        $result = $objConsultas -> mensajes($mensaje, $id);
    }else{
        echo'
        <script>
            window.alert("Tienes que escribir un mensaje antes de enviar");
        </script>
        ';
        
    }
?>