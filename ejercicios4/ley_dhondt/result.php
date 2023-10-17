<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados escaños</title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        table, th, td{
            border: 2px solid black;
            border-collapse: collapse;
            padding: 30px;
        }
        td:nth-child(1){
            border-top-color: white;
            border-left-color: white;
            background: white;
        }
        th{
            background: #54b3c7;
        }
        td{
            background: #efefef;
            text-align: center;
        }
        #grandes{
            background: #d3fd94;
            font-weight: bold;
            font-style: italic;
        }
    </style>
</head>
<body>
<?php
    $array = $_POST["partidos"];
    $escanys = $_POST["escanys"];
    $masGrandes = [];

    echo "<table><tr><td></td>";
    foreach ($array["nombres"] as $nombre) {
        echo "<th>$nombre</th>";
    }

    echo "</tr>";

    // Recorro los valores mas grandes con este bucle
for ($i = 1; $i <= $escanys; $i++) {
    for ($y = 0; $y < count($array["nombres"]); $y++) {
        // Number format no quita la comita por defecto por lo que me da problemas si no hago despues un str_replace

        $valor = number_format($array["votos"][$y]/$i,2);
        // Quito la coma por que si no no ordena bien ya que lo detecta como un string
        $masGrandes[] = str_replace(',', '', $valor);
    }
}

//echo count($masGrandes) . "<br><br>";
// Con esto puedo dejar solo los valores únicos
//$masGrandes = array_unique($masGrandes);
//echo count($masGrandes) . "<br><br>";

// Convierto las cadenas a números antes de ordenar
$masGrandes = array_map('floatval', $masGrandes);
rsort($masGrandes, SORT_NUMERIC);

// Recorto la lista a solo 7 valores
$masGrandes = array_slice($masGrandes, 0, $escanys);
//echo count($masGrandes) . "<br><br>";
//print_r($masGrandes);

    
for ($i = 1; $i <= $escanys; $i++) {
    echo "<tr><th>Escaño $i</th>";
    for ($y = 0; $y < count($array["nombres"]); $y++) {
        $valor = number_format($array["votos"][$y] / $i, 2);
        // Miro si el valor actual está en la lista y además le quito la coma para comparar los números bien
        $pintar = ((in_array(str_replace(',', '', $valor), $masGrandes)) ? "id='grandes'" : "");
        echo "<td ".  $pintar .">". floor(str_replace(',', '', $valor)) ."</td>";
    }
    echo "</tr>";
}
?>
</body>
</html>

