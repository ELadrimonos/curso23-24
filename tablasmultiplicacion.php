<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tablas Multiplicación</title>
    <link rel="stylesheet" type="text/css" href="estilos/principal.css">

    <style>
        body{
            background-color: #e5e5f7;
            background-image:  linear-gradient(#dfb1e6 2px, transparent 2px), linear-gradient(90deg, #dfb1e6 2px, transparent 2px), linear-gradient(#dfb1e6 1px, transparent 1px), linear-gradient(90deg, #dfb1e6 1px, #e5e5f7 1px);
            background-size: 50px 50px, 50px 50px, 10px 10px, 10px 10px;
            background-position: -2px -2px, -2px -2px, -1px -1px, -1px -1px;
            display: block;
        }
        main{
            display: grid;
            grid-template-rows: 5fr 5fr;
            grid-template-columns: repeat(5,auto);
            height: auto;
            grid-gap: 10px;
            padding: 40px;
        }
        div{
            display: flex;
            flex-direction: column;
            background: #b8b8f3;
            border-radius: 10px;
            border: 5px black dashed;
        }

        p, h2{
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
<section class="borroso"></section>

<main>
<?php
function ObtenerTabla($numero){
    echo "<h2>Tabla del $numero</h2>";
    for($i = 1; $i < 11; $i++){
        echo "<p>$numero * $i = " . $numero * $i . "</p>";
    }
}
for($i = 1; $i < 11; $i++){
    echo "<div>";
    ObtenerTabla($i);
    echo "</div>\n";
}
?>
</main>
</body>
</html>

