<?php
require_once("../models/conexion.php");
require_once("../models/consultas.php");

$usuario = $_POST['Nombreuser'];
$contraseña = $_POST['contraseña'];
$contraseña2 = $_POST['contraseña2'];
$estado= "Activo";

if($contraseña == $contraseña2){
    if(strlen($usuario)>0 && strlen($contraseña)>0){
        $clavemd=md5($contraseña);
            
        // Creamos una variable para definir la ruta donde quedara alojada la imagen
        $foto = "../img/Perfiles/".$_FILES['foto']['name'];
        // Movemos el archivo a la carpeta Uploads y la carpeta usuarios
        $mover = move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

        $objConsultas = new Consultas();
        $result = $objConsultas -> registroUsers($clavemd, $foto, $usuario, $estado);

    }else{
        echo '<script> 
       window.alert("Por favor complete todos los campos");
       window.location.href = "../pages/registro.html";
       ;</script>';
    }


}else{
    echo '<script> 
       window.alert("La contraseñas no coinciden");
       window.location.href = "../pages/registro.html";
       ;</script>';
}

?>