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
            height: auto;
            width: auto;
        }
        img{
            aspect-ratio: 2/1;
            width: 17vh;
        }
    </style>
</head>
<body>
    <h1>La Carta Más Alta</h1>
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
    echo "</div>";
    echo "<p>La carta más alta es " . max($resultados);
?>
        <h3>Carta A Eliminar</h3>
        <?php echo "<img src='./IMG/p" . max($resultados) . ".svg' alt='Resultado ". $i ."'>";
        $mayor = max($resultados); // En el bucle borraba el nuevo valor máximo tras borrar el anterior
        foreach ($resultados as $llave => $resultado) {
            if ($resultado === $mayor){
                unset($resultados[$llave]);
            }
        }
        $resultados = array_values($resultados);

        ?>
        <h3>Cartas Restantes</h3>
        <div>
        <?php
        for ($i = 0; $i < count($resultados);$i++){
            echo "<img src='./IMG/p" . $resultados[$i] . ".svg' alt='Resultado ". $i ."'>";
        }
        ?></div>

        <?php echo "<p>La carta más alta es " . max($resultados);?>


</body>
</html>

