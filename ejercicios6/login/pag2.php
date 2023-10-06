<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
</head>
<body>
<h1>Página 2</h1>
<?php require "cabecera.inc";
echo "<h3>Bienvenido " . $_SESSION["loginusu"] . "</h3>";
?>
</body>
</html>

