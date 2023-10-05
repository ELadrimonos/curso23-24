<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Euromillones</title>
    <link rel="stylesheet" type="text/css" href="../estilos/principal.css">
</head>
<body>
<?php
include "./loteria.inc";


$numeros = SeleccionaNumeros(5,50);
$estrellas = SeleccionaNumeros(2,9);

echo "<p>Euromillones:";
foreach ($numeros as $valor) {
    echo " $valor";
}
echo " - " . $estrellas[0] . " " . $estrellas[1] . "</p>";
?>
</body>
</html>

