<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de libros</title>
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
    <form method="post" action="result_libros.php">
        <h1>Buscador de libros</h1>
        <label for="texto">Texto de búsqueda:</label>
        <input id="texto" name="texto"/><br>
        <label>Buscar en: </label>
        <label for="titulo">
            <input type="radio" id="titulo" name="filtro" value="0" checked/>
            Título del libro
        </label>
        <label for="autor">
            <input type="radio" id="autor" name="filtro" value="1"/>
            Nombre del autor
        </label>
        <label for="editorial">
            <input type="radio" id="editorial" name="filtro" value="2"/>
            Editorial
        </label>
        <br>
        <label for="tipo">Tipo de libro: </label>
        <select name="tipo" id="tipo">
            <option value="0" selected>Narrativa</option>
            <option value="1">Libros de texto</option>
            <option value="2">Guías y mapas</option>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
</fieldset>
</body>
</html>

