<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include "Carro.php";
include "Moto.php";
include "Bici.php";
session_start();
if (isset($_POST["tipoVehiculo"]) && isset($_POST["kilometros"]) && isset($_POST["nombre"])
&& isset($_POST["marca"]) && isset($_POST["modelo"])){
    $vehiculo = null;
    switch ($_POST["tipoVehiculo"]){
        case 0: $vehiculo = new Carro($_POST["nombre"],$_POST["marca"],$_POST["modelo"],intval($_POST["kilometros"]));break;
        case 1: $vehiculo  = new Moto($_POST["nombre"],$_POST["marca"],$_POST["modelo"],intval($_POST["kilometros"]));break;
        case 2: $vehiculo  = new Bici($_POST["nombre"],$_POST["marca"],$_POST["modelo"],intval($_POST["kilometros"]));break;
    }
    $_SESSION["vehiculos"][] = $vehiculo;
    if (empty($_SESSION["kmTotales"]) && empty($_SESSION["vehiculosCreados"])){
        $_SESSION["kmTotales"] = 0 ;
        $_SESSION["vehiculosCreados"] = 0;
    }
    $_SESSION["kmTotales"] += intval($_POST["kilometros"]);
    $_SESSION["vehiculosCreados"] += 1;
}
?>
<form action="index.php" method="post">
    <label>Nombre del vehículo:
        <input type="text" name="nombre" required>
    </label>
    <label>Marca del vehículo:
        <input type="text" name="marca" required>
    </label>
    <label>Modelo del vehículo:
        <input type="text" name="modelo" required>
    </label>
    <label>Tipo de vehículo:
        <select name="tipoVehiculo">
            <option value="0">Coche</option>
            <option value="1">Moto</option>
            <option value="2">Bici</option>
        </select>
    </label>
    <label>Número de Kilometros realizados:
        <input type="number" name="kilometros" size="10" min="0" value="50" required>
    </label>
    <?php
        if (isset($_SESSION["vehiculos"]) && count($_SESSION["vehiculos"]) > 0){
            echo "<a href='cerrarSesion.php'>Vaciar la lista</a>";
        }
    ?>
    <input type="submit" value="Enviar">
</form>

