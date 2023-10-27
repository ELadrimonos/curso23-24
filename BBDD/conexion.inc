<?php
global$nombreBD;
$host = "localhost";
$usuario = "root";
$password = "";
$pdo = new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8", $usuario, $password);