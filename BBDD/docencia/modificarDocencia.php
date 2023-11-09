<?php
session_start();
include "../conexion.inc";
include_once "Docencia.php";

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$tabla = $_POST["tabla"];
$conexion = new Docencia("docencia");
try{
    switch ($tabla) {
        case "profesores":
            $conexion->modificarEntrada($tabla,[$_POST["dni"], $_POST["nombre"], strtoupper($_POST["categoria"]), $_POST["ingreso"], $_POST["dniOriginal"]]);
            break;
        case "imparte":
            $conexion->modificarEntrada($tabla,[$_POST["dni"], strtoupper($_POST["asignatura"]), $_POST["dniOriginal"], strtoupper($_POST["asignaturaOriginal"])]);
            break;
        case "asignaturas":
            $conexion->modificarEntrada($tabla,[strtoupper($_POST["codigo"]), strtoupper($_POST["descripcion"]), $_POST["creditos"], $_POST["creditosp"], strtoupper($_POST["asignaturaOriginal"])]);
            break;
        case "Cancelar":
            header("Location:index.php");
            break;
        default:
            echo "ALGO SALIÓ MAL";
    }

    header("Location:index.php");
} catch (PDOException $e){
    echo "<b>Error nº: ". $e->getCode() ."</b><br>";
    if ($e->getCode() == 23000)
        echo "<b>La entrada que has intentado modificar tiene referencias en otras 
            tablas que no permiten este cambio.</b><br>";
    echo "Regresando en 5 segundos...";
    header("Refresh:5; url=index.php");
}




?>

