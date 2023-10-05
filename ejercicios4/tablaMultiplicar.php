<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Presupuesto</title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        table, td,th {
            border: 1px black solid;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        }
        tr:nth-child(1){
            background: #cbc6c6;
        }
    </style>
</head>
<body>
<?php
if (!isset($_POST["valor"])){
echo "
<form action='tablaMultiplicar.php' method='post' id='formulario'>
    <label>Valor:
        <input name='valor' type='number' size='10'>
    </label>
    <input type='submit' value='Enviar'>
    <br></form>";

} else {

        $numero = $_POST["valor"];

        echo "<table>\n<tr>\n<th colspan='5'>Tabla de multiplicar</th>\n</tr>";
        // Si el bucle es divisible entre 5 haré un bucle nuevo
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 5 == 1) echo "<tr>";

            echo "<td>" . $numero . " x <b>" . $i . "</b> = " . ($numero * $i) . "</td>";

            if ($i % 5 == 0) echo "</tr>";
        }
        echo "</table>";
        }
    ?>

</body>
</html>

