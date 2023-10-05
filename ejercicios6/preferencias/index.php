<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        p{
            font-size: 3em;
        }
    </style>
</head>

<?php
if (isset($_COOKIE["nombreusu"]) && isset($_COOKIE["colorusu"])){
    echo '<body style="background:'. $_COOKIE["colorusu"] .';">';
    echo '<p>Bienvenido <b>'. $_COOKIE["nombreusu"].'</b></p>';
} else{
    echo '<body><h1>Página de inicio</h1>';
}
?>
<a href="preferencias.php">Preferencias del usuario</a>
<a href="borrar_prefs.php">Borrar preferencias</a>
</body>
</html>

