<?php

class Conexion{
    public function get_conexion(){
    $user = "root";
    $pass = "";
    $host = "localhost";
    $db="Ngl";
    $conexion = new PDO("mysql: host=$host; dbname=$db;", $user, $pass);
    return $conexion;
}
}

?>