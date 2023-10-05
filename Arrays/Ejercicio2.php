<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 Array</title>
    <link rel="stylesheet" type="text/css" href="../estilos/principal.css">
    <link rel="stylesheet" type="text/css" href="Listas.css">
    <style>
        p{
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Lista de 33 valores aleatorios</h1>
<?php
$array = [];
$menor = 100;
$mayor = 0;
$media = 0;
$suma = 0;
echo "<ul>";
for($i = 0; $i < 33; $i++){
    $array[$i] = rand(0,100);
    echo "<li>" . $array[$i] . "</li>";
}
echo "</ul>";

foreach ($array as $index => $item) {
    if ($item > $mayor) $mayor = $item;
    if ($item < $menor) $menor = $item;
    $suma += $item;
}
$media = $suma / 33;
echo "<p>Menor: <b>" . $menor . "</b>\t Mayor: <b>" . $mayor . "</b>\t Suma: <b>" . $suma . "</b>\t Media: <b>" . $media . "</b></p>";
?>
</body>
</html>

