<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
</head>
<body>
<h1>Dado</h1>
<h4>Actualice la página para ver un nuevo resultado</h4>
<?php
include "Dado.php";
$dado = new Dado();
$resultado = $dado->tirarDado();
$valores = array(1=>"uno",2=>"dos",3=>"tres",4=>"cuatro",5=>"cinco",6=>"seis",7=>"siete",8=>"ocho",9=>"nueve",0=>"cero");
echo "<img src='./IMG/" . $resultado . ".svg' alt='Resultado'>";
echo "<p>Has sacado un <b>". $valores[$resultado]."</b></p>";
?>
</body>
</html>

