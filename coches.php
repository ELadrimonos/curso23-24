<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="estilos/principal.css">
</head>
<body>
<?php
    $coches = array("1234GPY" => array("marca"=> "SEAT","modelo" => "Leon","puertas" => 5),
    "3253BFG" => array("marca"=> "Gatuna","modelo" => "Felino","puertas" => 3),
    "2153PNG" => array("marca"=> "Patrulla Canina","modelo" => "Sky","puertas" => 2),
    "1275JPG" => array("marca"=> "Lego","modelo" => "Helicoptero de combate","puertas" => 6));
    foreach ($coches as $coche) {
        print_r($coche["marca"]);
        echo "<br>";
    }
    echo $coches["1234GPY"]["marca"] . "<br><br>";

    foreach($coches as $name => $marca) {
        echo $name . " : " . $marca . "<br>";
}

?>
</body>
</html>

