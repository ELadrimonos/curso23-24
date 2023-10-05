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
$nombre = $_REQUEST["nombre"];
$mensaje = [];

if (empty($nombre)){
    $mensaje[] = "No se ha escrito su nombre";
} elseif (is_numeric($nombre)){
    $mensaje[] = "El nombre no es un texto";
}


if (empty($edad)){
    $mensaje[] = "No se ha escrito su edad";
}elseif (!is_numeric($edad)){
    $mensaje[] = "La edad no es un número";
} elseif ($edad < 18 || $edad > 130){
    $mensaje[] = "Su edad no está entre 18 y 130 años";
}

if (count($mensaje) > 0){
    header("Location:formulario.php?". http_build_query($mensaje,'Mensaje[]'));
}
else{
    echo "<p>Su nombre es <b>$nombre</b> y su edad es <b>$edad</b> años.</p><br><br>";
    echo "<button onclick='location.href =\"formulario.php\"'>Regresar al formulario</button>";
}
?>
</body>
</html>

