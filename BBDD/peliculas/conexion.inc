<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

function generarConexionBBDD($nombreBD){
    $host = "localhost";
    $usuario = "root";
    $password = "";
    return new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8", $usuario, $password);
}
