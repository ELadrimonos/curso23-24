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
        body{
            background: #cbc6c6;
        }
        form{
            display: flex;
            flex-direction: column;
            gap: 30px;
            align-items: end;
            background: #b8b8f3;
            border-radius: 25px;
            border: black 10px dashed;
            padding: 10px;
            font-family: sans-serif;
        }
        a{
            font-family: sans-serif;
        }
        input,select{
            text-align: end;
            margin-left: 10px;
            border: darkblue solid 2px;
            border-radius: 5px;
            background: #c4c4d7;
            transition: 300ms;
        }
        input:hover, select:hover{
            background: #f5f5ff;
        }

        input:focus, select:focus{
            background: #a6e8dc;
        }
        input[type="submit"]:hover, select:hover{
            font-weight: bold;
            outline: #3c074d 7px solid;
            outline-offset: 3px;
            border-radius: 0;
        }
        main{
            text-align: center;
            border-top: 5px dashed black;
            margin-top: 10px;
            background: white;
            padding: 30px;
            border-radius: 25px;
        }
    </style>
</head>
<body>
<?php include "formulario.php"?>
<main>
<h1>Vehículos</h1>
<?php
if (empty($_SESSION["kmTotales"]) && empty($_SESSION["vehiculosCreados"]) && empty($_SESSION["vehiculos"])){
        $_SESSION["kmTotales"] = 0 ;
        $_SESSION["vehiculosCreados"] = 0;
        echo "Ningún Vehiculo en la lista";
} else {
    $vehiculos = $_SESSION["vehiculos"];
    Vehiculo::$kmTotales = $_SESSION["kmTotales"];
    Vehiculo::$totalVehiculosCreados = $_SESSION["vehiculosCreados"];
    echo "<h1>KM Totales entre todos: " . Vehiculo::$kmTotales . ". Vehículos creados: " . Vehiculo::$totalVehiculosCreados . ".</h1>";
    foreach ($vehiculos as $vehiculo) {
        if (get_class($vehiculo) === "Bici") $vehiculo->Empezar_A_Pedalear();
        else $vehiculo->Encender();
        $vehiculo->aumentarVelocidad(50);
        $vehiculo->disminuirVelocidad(30);
        $vehiculo->PasarBache();
        $vehiculo->disminuirVelocidad(5);
        $vehiculo->disminuirVelocidad(5);
        $vehiculo->disminuirVelocidad(5);
        if (get_class($vehiculo) === "Bici") $vehiculo->Parar_De_Pedalear();
        else $vehiculo->Apagar();
    }
}
?>
</main>
</body>
</html>

