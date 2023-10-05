<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
</head>
<body>
<?php
if (isset($_COOKIE["nombreusu"]) || isset($_COOKIE["colorusu"])) {
    setcookie('nombreusu', '', -1);
    setcookie('colorusu', '', -1);
    unset($_COOKIE["nombreusu"]);
    unset($_COOKIE["colorusu"]);
}
header("Location:index.php");
?>
</body>
</html>

