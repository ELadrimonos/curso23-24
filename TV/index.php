<?php
include "TV.php";
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['tele'])) $_SESSION['tele'] = new TV("Samsung");

if (isset($_POST["subirCanal"])){
    $_SESSION['tele']->CambiarCanal($_SESSION['tele']->getCanal()+1);
}else if (isset($_POST["bajarCanal"])){
    $_SESSION['tele']->CambiarCanal($_SESSION['tele']->getCanal()-1);
}else if (isset($_POST["subirVolumen"])){
    $_SESSION['tele']->AumentarVolumen();
}else if (isset($_POST["bajarVolumen"])){
    $_SESSION['tele']->DisminuirVolumen();
}else if (isset($_POST["reiniciar"])){
    $_SESSION['tele']->Reiniciar();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <link rel="stylesheet" type="text/css" href="./television.css">
</head>
<body>
<div id="tele">
    <div id="pantalla">

    </div>
    <?php
    $television =  $_SESSION['tele'];
    echo "<h1>" . $television->getMarca() ."</h1>";
    ?>
    </div>
    <h1><?=$television->Estado()?></h1>

    <div id="Mando">
        <form method="post">
            <input type="submit" id="Apagado" name="reiniciar" value="X">
            <div>
            <input type="submit" value="+" name="subirCanal">
            <input type="submit" value="-" name="bajarCanal">
            </div>
            <div>
            <input type="submit" value="+" name="subirVolumen">
            <input type="submit" value="-" name="bajarVolumen">
            </div>
        </form>
    </div>

    <input type="range" list="markers" min="0" max="100" readonly disabled value="<?=$television->getVolumen()?>">
<datalist id="markers">
        <option value="0"></option>
        <option value="25"></option>
        <option value="50"></option>
        <option value="75"></option>
        <option value="100"></option>
    </datalist>
<script>
    var pantalla = document.getElementById("pantalla");
    var color = Math.floor(Math.random() * 256) + "," + Math.floor(Math.random() * 256) + "," + Math.floor(Math.random() * 256);
    var color1 = Math.floor(Math.random() * 256);
    var color2 = Math.floor(Math.random() * 256);
    var color3 = Math.floor(Math.random() * 256);
    color = 'rgb(' + color1 + "," + color2 + "," + color3 + ');';
    console.log(color)
    pantalla.style.backgroundColor = color;
    console.log(pantalla.style.background + " | " + color)
</script>
</body>
</html>

