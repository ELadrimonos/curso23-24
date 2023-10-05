<?php
session_start();

$articulos = array(
    array("id" => 1, "nombre" => "Zapatillas Nike", "precio" => 60),
    array("id" => 2, "nombre" => "Sudadera Domyos", "precio" => 15),
    array("id" => 3, "nombre" => "Pala de pádel Vairo", "precio" => 50),
    array("id" => 4, "nombre" => "Pelota de baloncesto Molten", "precio" => 20)
);

if (!isset($_SESSION['carrito'])) $_SESSION['carrito'] = ["total" => 0, "items" => [], "cantidad" => []];

function add_to_carrito($identificador) : void{
    global $articulos;
    $_SESSION["carrito"]["total"] += $articulos[$identificador]["precio"];
    if (!in_array($articulos[$identificador]["nombre"],$_SESSION["carrito"]["items"])) {
        $_SESSION["carrito"]["items"][] = $articulos[$identificador]["nombre"];
        $_SESSION["carrito"]["cantidad"][] = 1;
    } else{
        $articuloEnCarrito = array_search($articulos[$identificador]["nombre"], $_SESSION["carrito"]["items"]);
        if ($articuloEnCarrito !== false) {
            $_SESSION["carrito"]["cantidad"][$articuloEnCarrito]++;
        }
    }
}

if (isset($_POST["anyadir"])){
    add_to_carrito(intval($_POST["anyadir"]));
}

if (isset($_POST["cerrar"])){
    session_destroy();
    header("Location: carro.php"); // Redirige a la página para que se actualice
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <link rel="stylesheet" type="text/css" href="./estiloCarro.css">
</head>
<body>
<main>
    <header>
    <?php
        echo "<h1>Total: <span>" . $_SESSION["carrito"]["total"] . "€</span></h1>";
        echo "<br><h1>Productos:</h1></header><br>";
        echo "<section class='productos'>";
        foreach ($_SESSION["carrito"]["items"] as $index => $item) {
            echo $item;
            if ($_SESSION["carrito"]["cantidad"][intval($index)] > 1){
                echo " x ". $_SESSION["carrito"]["cantidad"][intval($index)];
            }
            echo " (" . $articulos[array_search($item, $_SESSION["carrito"]["items"])]["precio"] *
                intval($_SESSION["carrito"]["cantidad"][$index]) . "€)";

            echo "<br>";
        }
        echo "</section>";
    ?>
    <form action="carro.php" method="post">
        <button name="anyadir" value="0">Zapatillas Nike (60 euros)</button>
        <button name="anyadir" value="1">Sudadera Domyos (15 euros)</button>
        <button name="anyadir" value="2">Pala de pádel Vairo (50 euros)</button>
        <button name="anyadir" value="3">Pelota de baloncesto Molten (20 euros)</button>
        <button name="cerrar" value="true">Vaciar carro</button>
    </form>
</main>
</body>
</html>
