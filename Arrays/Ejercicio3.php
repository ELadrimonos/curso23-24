<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 Array</title>
    <link rel="stylesheet" type="text/css" href="../estilos/principal.css">
    <link rel="stylesheet" type="text/css" href="Listas.css">

</head>
<body>
<h1>10 Primeros Números Primos</h1>
<?php
    $numerosPrimos = [];
    $cantidadPrimos = 0;
    $cont = 0;
    do{
        $divisiones = 1;
        $residuo = 0;

        do {
            if ($cont % $divisiones == 0) {
                $residuo++;
            }
            $divisiones++;
        } while ($divisiones <= $cont);

        if ($residuo == 2){
            $numerosPrimos[] = $cont;
            $cantidadPrimos++;
        }

        $cont++;

    } while ($cantidadPrimos < 10);

    echo "<ul>";
    foreach ($numerosPrimos as $index => $item) {
        echo "<li>" . "$item" . "</li>";
    }
    echo "</ul>";
?>
</body>
</html>

