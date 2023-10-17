<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Presupuesto Departamento</title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        fieldset{
            display: flex;
            justify-content: center;
        }
        input, select{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<fieldset>
    <form method="post" action="presupuesto.php">
        <h1>Presupuesto Departamento</h1>
        <label for="dpto">Nombre departamento: </label>
        <select name="dpto" id="dpto">
            <option value="0" selected>INFORMÁTICA</option>
            <option value="1" >LENGUA</option>
            <option value="2" >MATEMÁTICAS</option>
            <option value="3" >INGLÉS</option>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
</fieldset>
</body>
</html>

