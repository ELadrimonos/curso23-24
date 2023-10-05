<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
</head>
<body>
<?php
$edad = $_REQUEST["edad"];

if (empty($edad)){
    header("Location:formulario.php?Mensaje=No se ha introducido ningún valor");
    die();
}

if (!is_numeric($edad)){
    header("Location:formulario.php?Mensaje=No es un número entero");
    die();
}

if ($edad < 18 || $edad > 130){
    header("Location:formulario.php?Mensaje=Su edad no está entre 18 y 30 años");
    die();

} else{
    echo "<p>Su edad es <b>$edad</b> años.</p><br><br>";
    echo "<button onclick='location.href =\"formulario.php\"'>Regresar al formulario</button>";
}
?>
</body>
</html>

