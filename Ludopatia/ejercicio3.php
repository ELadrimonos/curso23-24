<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        div{
            display: flex;
            flex-direction: row;
            height: 100%;
            width: 20vw;
        }
        img{
            aspect-ratio: 2/1;
            width: 10vw;
        }
    </style>
</head>
<body>
<h1>Cartas extremas</h1>
<br>
<h3>Cartas</h3>
<div>
<?php
include "Carta.php";
    $resultados = array();
    $carta = new Carta();
    $veces = rand(5,10);

    for ($i = 0; $i < $veces;$i++){
        $resultados[$i] = $carta->tirarDado();
        echo "<img src='./IMG/p" . $resultados[$i] . ".svg' alt='Resultado ". $i ."'>";
    }
?>
</div>
</body>
</html>

