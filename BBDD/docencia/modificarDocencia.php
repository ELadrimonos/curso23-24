<?php
session_start();
include "../conexion.inc";

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$tabla = $_POST["tabla"];
$conexion = generarConexionBBDD("docencia");
$modificacion = NULL;
switch ($tabla) {
    case "profesores":
        $modificacion = $conexion->prepare("UPDATE profesores SET dni = :dni, nombre = :nom, categoria = :cat, ingreso = :ing WHERE dni = :dniOG");
        $modificacion->bindParam(":dni", $_POST["dni"]);
        $modificacion->bindParam(":dniOG", $_POST["dniOriginal"]);
        $nombre = strtoupper($_POST["nombre"]);
        $modificacion->bindParam(":nom", $nombre);
        $modificacion->bindParam(":cat", $_POST["categoria"]);
        $modificacion->bindParam(":ing", $_POST["ingreso"]);
        break;
    case "imparte":
        $modificacion = $conexion->prepare("UPDATE imparte SET dni = :dni, asignatura = :as WHERE dni = :dniOG AND asignatura = :asigOG");
        $modificacion->bindParam(":dni", $_POST["dni"]);
        $modificacion->bindParam(":as", $_POST["asignatura"]);
        $modificacion->bindParam(":dniOG", $_POST["dniOriginal"]);
        $modificacion->bindParam(":asigOG", $_POST["asignaturaOriginal"]);
        break;
    case "asignaturas":
        $modificacion = $conexion->prepare("UPDATE asignaturas SET codigo = :cod, descripcion = :desc, creditos = :cred, creditosp = :credp WHERE codigo = :codOG");
        $modificacion->bindParam(":cod", $_POST["codigo"]);
        $modificacion->bindParam(":codOG", $_POST["codigoOriginal"]);
        $desc = strtoupper($_POST["descripcion"]);
        $modificacion->bindParam(":desc", $desc);
        $modificacion->bindParam(":cred", $_POST["creditos"]);
        $modificacion->bindParam(":credp", $_POST["creditosp"]);
        break;
    case "Cancelar":
        header("Location:index.php");
        break;
    default:
        echo "ALGO SALIÓ MAL";
}
try{
    $modificacion->execute();
    header("Location:index.php");

} catch (PDOException){
    if ($modificacion->errorCode() == "23000") echo "<b>No existe una referencia de las entradas que has intentado modificar. Regresando en 5 segundos.</b>";
    header('Refresh:5 ; URL=index.php');
} finally {
    $conexion = NULL;
    $modificacion = NULL;
}

?>

