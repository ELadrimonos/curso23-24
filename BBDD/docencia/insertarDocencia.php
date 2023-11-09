<?php
session_start();
include "../conexion.inc";
include_once "Docencia.php";
$tabla = $_POST["tabla"];
$conexion = new Docencia("docencia");

switch ($tabla) {
    case "profesores":
        $conexion->insertarEntrada($tabla, [$_POST["dni"],strtoupper($_POST["nombre"]), $_POST["categoria"],$_POST["ingreso"]]);
        break;
    case "imparte":
        $conexion->insertarEntrada($tabla, [$_POST["dni"],$_POST["asignatura"]]);
        break;
    case "asignaturas":
        $conexion->insertarEntrada($tabla, [$_POST["codigo"],$_POST["descripcion"], $_POST["creditos"],$_POST["creditosp"]]);
        break;
    case "Cancelar":
        header("Location:index.php");
        break;
}
$conexion = NULL;
header("Location:index.php");
?>

