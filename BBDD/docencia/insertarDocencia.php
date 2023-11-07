<?php
session_start();
include "../conexion.inc";
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

try{
    $insercion->execute();
} catch (PDOException){
    if ($insercion->errorCode() == "23000"){
        echo "<b>La entrada que has intentado insertar no tiene referencias en otras 
            tablas.<br>Por favor cree de esas referencias antes de realizar esta acción.</b>";
        echo "<b>Volviendo en 10 segundos</b>";
        header( "Refresh:1000; url=./docencia.php", true, 303);
    }


}
$conexion = NULL;
$insercion = NULL;
header("Location:docencia.php");
?>

