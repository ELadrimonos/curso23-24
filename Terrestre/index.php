<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        p{
            font-size: 0.89rem;
        }
    </style>
</head>
<body>
<h1>Vehículos</h1>
<?php

include "Carro.php";
include "Moto.php";
include "Bici.php";

$vehiculos[] = new Carro("Matias El Coche Volador");


$vehiculos[0]->aumentarVelocidad(50);
$vehiculos[0]->disminuirVelocidad(30);
$vehiculos[0]->PasarBache();
$vehiculos[0]->disminuirVelocidad(5);
$vehiculos[0]->disminuirVelocidad(5);
$vehiculos[0]->disminuirVelocidad(5);
$vehiculos[0]->disminuirVelocidad(5);
$vehiculos[0]->Frenar();
$vehiculos[0]->Apagar();

$vehiculos[] = new Carro("Juan Carlos El Primo Del Coche Volador");

$vehiculos[1]->aumentarVelocidad(50);
$vehiculos[1]->disminuirVelocidad(30);
$vehiculos[1]->PasarBache();
$vehiculos[1]->disminuirVelocidad(5);
$vehiculos[1]->disminuirVelocidad(5);
$vehiculos[1]->disminuirVelocidad(5);
$vehiculos[1]->disminuirVelocidad(5);
$vehiculos[1]->Frenar();
$vehiculos[1]->Apagar();

$vehiculos[] = new Moto("Pablo Motos");

$vehiculos[2]->aumentarVelocidad(50);
$vehiculos[2]->disminuirVelocidad(30);
$vehiculos[2]->PasarBache();
$vehiculos[2]->disminuirVelocidad(5);
$vehiculos[2]->disminuirVelocidad(5);
$vehiculos[2]->disminuirVelocidad(5);
$vehiculos[2]->disminuirVelocidad(5);
$vehiculos[2]->Frenar();
$vehiculos[2]->Apagar();

$vehiculos[] = new Bici("Usain Bolt");

$vehiculos[3]->aumentarVelocidad(50);
$vehiculos[3]->disminuirVelocidad(30);
$vehiculos[3]->PasarBache();
$vehiculos[3]->disminuirVelocidad(5);
$vehiculos[3]->disminuirVelocidad(5);
$vehiculos[3]->disminuirVelocidad(5);
$vehiculos[3]->disminuirVelocidad(5);
$vehiculos[3]->Frenar();
$vehiculos[3]->Parar_De_Pedalear();

echo "<h1>KM Totales entre todos: " . Vehiculo::$kmTotales . ". Vehiculos creados: " . Vehiculo::$totalVehiculosCreados .".</h1>";
?>
</body>
</html>

