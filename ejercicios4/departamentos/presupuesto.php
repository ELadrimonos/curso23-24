<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Presupuesto</title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        table, td,th {
            border: 1px black solid;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        }
        tr:nth-child(1){
            background: #cbc6c6;
        }
    </style>
</head>
<body>
<?php
$indice = $_POST["dpto"];
$presupuestos = array(
        array("INFORMÁTICA", 500),
        array("LENGUA", 300),
        array("MATEMÁTICAS", 300),
        array("INGLÉS", 400),
);

?>
<table>
    <tr>
        <th>Departamento</th>
        <th>Presupuesto</th>
    </tr>
    <tr>
        <td><?=$presupuestos[$indice][0]?></td>
        <td><?=$presupuestos[$indice][1]?></td>
    </tr>
</table>
<br>
<a href="./form_dep.php">Volver atrás</a>
</body>
</html>

