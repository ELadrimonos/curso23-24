<?php
include "conexion.inc";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
session_start();
$tabla = $_POST["tabla"];
$conexion = generarConexionBBDD("docencia");
$insercion = NULL;
switch ($tabla) {
    case "profesores":
        $insercion = $conexion->prepare("INSERT INTO profesores VALUES(:dni,:nom,:cat,:ing)");
        $insercion->bindParam(":dni", $_POST["dni"]);
        $nombre = strtoupper($_POST["nombre"]);
        $insercion->bindParam(":nom", $nombre);
        $insercion->bindParam(":cat", $_POST["categoria"]);
        $insercion->bindParam(":ing", $_POST["ingreso"]);
        break;
    case "imparte":
        $insercion = $conexion->prepare("INSERT INTO imparte VALUES(:dni,:as)");
        $insercion->bindParam(":dni", $_POST["dni"]);
        $insercion->bindParam(":as", $_POST["asignatura"]);
        break;
    case "asignaturas":
        $insercion = $conexion->prepare("INSERT INTO asignaturas VALUES(:cod,:desc,:cred,:credp)");
        $insercion->bindParam(":cod", $_POST["codigo"]);
        $insercion->bindParam(":desc", $_POST["descripcion"]);
        $insercion->bindParam(":cred", $_POST["creditos"]);
        $insercion->bindParam(":credp", $_POST["creditosp"]);
        break;
    case "Cancelar":
        header("Location:docencia.php");
        break;
}
$insercion->execute();
$conexion = NULL;
$insercion = NULL;
header("Location:docencia.php");
?>

