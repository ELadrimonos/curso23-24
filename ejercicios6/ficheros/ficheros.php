<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
</head>
<body>
<?php
$file = "Numero.txt";


function cambiar_valor($archivo, $valor){
    global $valorActual;
    $fpDentro = fopen($archivo,"w+");
    $valorActual += $valor;
    fwrite($fpDentro, $valorActual);
    fclose($fpDentro);
}


$fp = fopen($file, "r");
$valorActual = fread($fp, filesize($file));
if (isset($_POST["incremento"])){
    cambiar_valor($file, 1);
    unset($_POST["incremento"]);
}elseif (isset($_POST["disminuir"])){
    cambiar_valor($file, -1);
    unset($_POST["disminuir"]);
}
echo $valorActual;
fclose($fp);
?>
<form method="post">
    <input type="submit" name="incremento"
           value="Incrementar"/>
    <input type="submit" name="disminuir"
           value="Disminuir"/>
</form>
</body>
</html>

