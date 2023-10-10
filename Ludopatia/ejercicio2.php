<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
</head>
<body>
<?php
include "Dado.php";

$resultados = array();
$veces = rand(2,7);
$dado = new Dado;

echo "<h1>Tirada de " . $veces . " dados</h1>";

for ($i = 0; $i < $veces;$i++){
    $resultados[$i] = $dado->tirarDado();
    echo "<img src='./IMG/" . $resultados[$i] . ".svg' alt='Resultado ". $i ."'>";
}

echo "<h1>Tirada ordenada</h1>";
sort($resultados);

for ($i = 0; $i < $veces;$i++){
    echo "<img src='./IMG/" . $resultados[$i] . ".svg' alt='Resultado ". $i ." ordenado'>";
}

?>
</body>
</html>

