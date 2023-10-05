<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tenis</title>
    <link rel="stylesheet" type="text/css" href="../estilos/principal.css">
    <style>
        table, td{
            border: 1px solid;
            border-collapse: collapse;
        }

        td{
            padding: 10px;
            background: azure;
        }

        tr:nth-child(1) > #jugador{
            background: #65e565;
        }
        tr:nth-child(2) > #jugador{
            background: #65cee5;
        }
    </style>
</head>
<body>
<?php
for ($tabla = 0; $tabla < 2; $tabla++) {
        $jugadores = array(
        array("Federer", "Puntos" => array(0)),
        array("Nadal", "Puntos" => array(0))
        );

    $terminada = false;
    do {
        $random = rand(0, 1);
        $jugadores[$random]["Puntos"][] = end($jugadores[$random]["Puntos"]) + (($tabla == 0) ? 15 : 1);
        $jugadores[!$random]["Puntos"][] = end($jugadores[!$random]["Puntos"]);

        if (end($jugadores[$random]["Puntos"]) >= (($tabla == 0) ? 40 : 6)) $terminada = true;
    } while (!$terminada);

    echo "<table>";
    foreach ($jugadores as $jugador) {
        echo "<tr><td id='jugador'>" . $jugador[0] . "</td>";
        foreach ($jugador["Puntos"] as $k=>$punto) {
            // Con esto hago que no se muestre el primer indice de los puntos, en el cual muestra
            // Puntuación de 0-0
            if ($k < 1) continue;
            echo "<td>" . ($punto == 45 ? 40 : $punto) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
}
?>
</body>
</html>

