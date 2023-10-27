<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conexión BBDD videojuegos</title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        body{
            gap: 30px;
        }
        form:first-child{
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: max-content;
            background: #efefef;
            padding: 20px;
            justify-content: center;
            align-items: center;
        }
        input[type="submit"]{
            border: 2px solid black;
            background: #b8b8f3;
            width: 150px;
            aspect-ratio: 2/1;
            transition: 300ms;
            font-weight: bold;
        }
        input[type="submit"]:hover{
            background: #6a6ab9;
            border-radius: 25%/35%;
            color: white;
        }
        label{
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 10px;
            background: #cbc6c6;
        }
        table,th,td{
            border: 2px solid black;
            border-collapse: collapse;
        }
        td,th{
            padding: 5px;
        }
        td.borrar{
            padding: 0;
            background: red;
            width: 20px;
        }
        button{
            background: red;
            border: none;
            color: #4d0707;
            width: 20px;
            height: 100%;
            margin: auto;
        }
        button:hover, button:active{
            background: #ff5050;
        }
    </style>
</head>
<body>
<form method="post" action="videojuegos.php">
    <label>Título
        <input type="text" name="titulo" maxlength="100" required>
    </label>
    <label>Género
        <input type="text" name="genero" maxlength="50" required>
    </label>
    <label>Precio
        <input type="number" name="precio" min="0" required>
    </label>
    <input type="submit">
</form>
<?php
global$pdo;
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$nombreBD = "videojuegos";
include "conexion.inc";

if (isset($_POST["titulo"]) && isset($_POST["genero"]) && isset($_POST["precio"])){

    $insercion = $pdo->prepare("INSERT INTO videojuegos(titulo, genero, precio)" .
        " VALUES(:titulo, :genero, :precio);");
    $insercion->bindParam(':titulo', $_REQUEST['titulo']);
    $insercion->bindParam(':genero', $_REQUEST['genero']);
    $insercion->bindParam(':precio', $_REQUEST['precio']);
    try{
        $insercion->execute();
    } catch (PDOException $Exception){
        switch ($Exception->getCode()){
            case 23000: echo "Error al insertar, entrada con titulo ya existente.";break;
            default: echo "Error " . $Exception->getMessage();
        }
    } finally {
        $insercion = null;
    }
} else if (isset($_POST["borrar"])){
    $borrado = $pdo->prepare("DELETE FROM videojuegos WHERE id = :idABorrar;");
    $borrado->bindParam(':idABorrar',$_POST["borrar"]);
    $borrado->execute();
    $borrado = null;
}

$consulta = $pdo->prepare("SELECT * FROM videojuegos");
$consulta->execute();
echo "<form method='POST' action='videojuegos.php'>";
echo "<table><tr><th colspan='5'>Videojuegos</th></tr>";
echo "<tr><th>ID</th><th>Titulo</th><th>Genero</th><th>Precio</th></tr>";
while($registro = $consulta->fetch())
{
    echo "<tr>";
    echo "<td>" . $registro["id"] . "</td>";
    echo "<td>" . $registro["titulo"] . "</td>";
    echo "<td>" . $registro["genero"] . "</td>";
    echo "<td>" . $registro["precio"] . "€</td>";
    echo "<td class='borrar'><button type='submit' name='borrar' value='" . $registro["id"] . "'>X</button></td>";
    echo "<tr>";
}
echo "</table></form>";
$consulta = NULL;
$pdo = NULL;
?>
</body>
</html>

