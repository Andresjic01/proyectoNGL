<?php
require_once("../models/conexion.php");
require_once("../models/consultas.php");

$usuario = $_POST['user'];
$clave = md5($_POST['pass']);

if(strlen($usuario)>0 && strlen($clave)>0){


    $objConsultas = new Validarsesion();
    $result = $objConsultas -> iniciarSesion($clave, $usuario);

    
}else{
    echo'
    <script>
    window.alert("Complete todos los campos por favor'.$clave.'");
    window.location.href = "../index.html";
    
    </script>';
}


?>