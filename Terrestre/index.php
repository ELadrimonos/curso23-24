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

$c1 = new Carro("Matias El Coche Volador");
$c1->aumentarVelocidad(50);
$c1->disminuirVelocidad(30);
$c1->PasarBache();
$c1->disminuirVelocidad(5);
$c1->disminuirVelocidad(5);
$c1->disminuirVelocidad(5);
$c1->disminuirVelocidad(5);
$c1->Frenar();
$c1->Apagar();
$c2 = new Carro("Juan Carlos El Primo Del Coche Volador");
$c2->aumentarVelocidad(50);
$c2->disminuirVelocidad(30);
$c2->PasarBache();
$c2->disminuirVelocidad(5);
$c2->disminuirVelocidad(5);
$c2->disminuirVelocidad(5);
$c2->disminuirVelocidad(5);
$c2->Frenar();
$c2->Apagar();
$m1 = new Moto("Pablo Motos");
$m1->aumentarVelocidad(50);
$m1->disminuirVelocidad(30);
$m1->PasarBache();
$m1->disminuirVelocidad(5);
$m1->disminuirVelocidad(5);
$m1->disminuirVelocidad(5);
$m1->disminuirVelocidad(5);
$m1->Frenar();
$m1->Apagar();
$b1 = new Bici("Usain Bolt");
$b1->aumentarVelocidad(50);
$b1->disminuirVelocidad(30);
$b1->PasarBache();
$b1->disminuirVelocidad(5);
$b1->disminuirVelocidad(5);
$b1->disminuirVelocidad(5);
$b1->disminuirVelocidad(5);
$b1->Frenar();
$b1->Parar_De_Pedalear();
?>
</body>
</html>

