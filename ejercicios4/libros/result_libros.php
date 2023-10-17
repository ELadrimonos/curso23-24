<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado busqueda</title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        fieldset{
            display: flex;
            justify-content: center;
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
    $textoBusqueda = $_POST["texto"];
    $filtroBusqueda = $_POST["filtro"];
    $tipoLibro = $_POST["tipo"];
    $filtros = ["Título del libro", "Nombre del autor","Editorial"];
    $tipos = ["Narrativa", "Libros de texto","Guías y mapas"];

?>
<table>
    <tr>
        <th>Título</th>
        <th>Filtro</th>
        <th>Tipo</th>
    </tr>
    <tr>
        <td><?=$textoBusqueda?></td>
        <td><?=$filtros[$filtroBusqueda]?></td>
        <td><?=$tipos[$tipoLibro]?></td>
    </tr>
</table>
<br>
<a href="./form_libros.php">Volver atrás</a>
</body>
</html>

