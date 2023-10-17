<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 Array</title>
    <link rel="stylesheet" type="text/css" href="../estilos/principal.css">
    <link rel="stylesheet" type="text/css" href="Listas.css">

</head>
<body>
<h1>Lista desordenada de 50 valores aleatorios</h1>
<?php
    $array = [];
    echo "<ul>";
    for($i = 0; $i < 50; $i++){
        $array[$i] = rand(0,99);
        echo "<li>" . $array[$i] . "</li>";
    }
    echo "</ul>";
?>
</body>
</html>

