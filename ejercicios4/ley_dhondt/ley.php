<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ley d'Hont</title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        body{
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
<?php
if (!isset($_POST["enviar"])){
    echo "
<form action='ley.php' method='post'>
    <label>Número de partidos:
        <input name='partidos' type='number' size='10' min='2' value='2' max='10'>
    </label>
    <br>
    <label>Número de escaños:
        <input name='escanys' type='number' size='10' min='2' value='2'>
    </label>
    <br>
    <input type='submit' name='enviar' value='Enviar'>
    </form>";

} else {

    $escanys = $_POST["escanys"];
    $partidos = $_POST["partidos"];
    echo "<form action='result.php' method='post'>";
    for ($i = 1; $i <= $partidos; $i++){
//        Enviando un array multidimensional con los nombres y sus votos ahorra mucho tiempo de escritura
        echo
        "
        <label>Nombre partido $i:
        <input name='partidos[nombres][]' type='text' required size='15'>
        </label>
        <label>Votos partido $i:
        <input name='partidos[votos][]' type='number' required size='15' min='10' value='10'>
        </label>
        <br>
        ";
    }
    // Mando también el número de escaños a traves de un input hidden
    echo
    "
     <input type='hidden' value='$escanys' name='escanys'>
    <input type='submit' value='Enviar'>
    </form>
    ";
}
?>
</body>
</html>

