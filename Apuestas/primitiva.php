<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Primitiva</title>
    <link rel="stylesheet" type="text/css" href="../estilos/principal.css">
</head>
<body>
<?php
include "./loteria.inc";


$listaValores = SeleccionaNumeros(6,49);

echo "<p>Primitiva:";
foreach ($listaValores as $valor) {
    echo " $valor";
}
echo "</p>";
?>
</body>
</html>

