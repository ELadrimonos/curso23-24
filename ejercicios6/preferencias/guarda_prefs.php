<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
</head>
<body>
<?php
    $preferencia = $_POST["color1"];
    setcookie("nombreusu", $_POST["nombre"], time()+300);
    setcookie("colorusu", ($preferencia == "personalizado" ? $_POST["color2"] : $_POST["color1"]), time()+300);
    header("Location:index.php");
?>
</body>
</html>

