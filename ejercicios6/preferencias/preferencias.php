<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px 0;
        }
    </style>
</head>
<body>
<?php
?>

<form action="guarda_prefs.php" method="post">
    <label>Introduce tu nombre
        <input type="text" name="nombre" required>
    </label>
    <div>
    <label>Elige un color
        <select name="color1">
            <option selected value="personalizado">PERSONALIZADO</option>
            <option value="#FF0000">ROJO</option>
            <option value="#00FF00">VERDE</option>
            <option value="#0000FF">AZUL</option>
        </select>
    </label>

    <label>
        <input type="color" name="color2">
    </label>
    </div>
    <button>Guardar</button>
</form>
</body>
</html>

