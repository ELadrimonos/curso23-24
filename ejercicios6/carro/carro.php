<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
</head>
<body>
<?php
    $articulos = array(
        "1" => array("id" => 1, "nombre" => "Zapatillas Nike", "precio" => 60),
        array("id" => 2, "nombre" => "Sudadera Domyos", "precio" => 15),
        array("id" => 3, "nombre" => "Pala de pádel Vairo", "precio" => 50),
        array("id" => 4, "nombre" => "Pelota de baloncesto Molten", "precio" => 20)
    );

    $carrito = ["total" => 0, array()];

    function add_to_carrito($identificador){
        global $carrito, $articulos;
        $carrito["total"] += $articulos[0]["precio"];
        echo $carrito["total"];
    }

?>
<main>
        <button id="1" onclick="<?=add_to_carrito(0)?>">Zapatillas Nike (60 euros)</button>
        <button id="2">Sudadera Domyos (15 euros)</button>
        <button id="3">Pala de pádel Vairo (50 euros)</button>
        <button id="4">Pelota de baloncesto Molten (20 euros)</button>
</main>
</body>
</html>

