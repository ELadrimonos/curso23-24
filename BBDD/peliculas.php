<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        .modificar{
            position: fixed;
            width: 20vw;
            margin: auto;
            top: 20vh;
            background: #89bcd5;
            font-weight: bold;
            gap: 20px;
            justify-content: center;
            align-items: center;
            border-radius: 30px;
        }

        .insercion{
            width: 20vw;
            margin: auto;
            top: 20vh;
            background: #ecb3c6;
            font-weight: bold;
            gap: 20px;
            justify-content: center;
            align-items: center;
            border-radius: 30px;
        }

        form{
            display: flex;
            flex-direction: column;
            padding: 30px;
        }

        body{
            gap: 30px;
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
            background: rgba(255, 209, 209, 0.75);
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
        td.modificado{
            padding: 0;
            background: #65ffe2;
            width: 20px;
        }
        button{
            background: none;
            border: none;
            color: #4d0707;
            width: 20px;
            height: 100%;
            margin: auto;
        }
        .borrar:hover, .borrar:active{
            background: #ff5050;
        }
       .modificado:hover, .modificado:active{
            background: #c3ffff;
        }
    </style>
</head>
<body>

<form action="peliculas.php" method="post" class="insercion">
    <label>
        TITULO:
        <input type='text' name='titulo'>
    </label>
    <label>
        GENERO:
        <input type='text' name='genero'>
    </label>
    <label>
        AÑO:
        <input type='text' name='any' pattern="[0-9]{4}">
    </label>
    <label>
        PRECIO:
        <input type='number' name='precio'>
    </label>
    <input type='submit' name='insercion' value='Insertar'/>
</form>

<?php
include "conexion.inc";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$conexion = generarConexionBBDD("peliculas");
$file = "pelis.txt";
$fp = fopen($file, "r");


$seleccion = $conexion->prepare("SELECT count(*) FROM video");
$seleccion->execute();
$entradas = $seleccion->fetch()[0];
if ($entradas === 0) {


    while (!feof($fp)) {
        $linea = fgets($fp);
        $campos = explode(",", $linea);
        $seleccion = $conexion->prepare("SELECT Titulo FROM video WHERE Titulo = :titulo");
        $seleccion->bindParam(':titulo', $campos[0]);
        $seleccion->execute();

        if ($seleccion->rowCount() === 0) {
            $insercion = $conexion->prepare("INSERT INTO video(Titulo, Genero, Any, Precio)" .
                " VALUES(:titulo, :genero,:any, :precio);");
            $insercion->bindParam(':titulo', $campos[0]);
            $insercion->bindParam(':genero', $campos[1]);
            $insercion->bindParam(':any', $campos[2]);
            $precioEntero = intval($campos[3]);
            $insercion->bindParam(':precio', $precioEntero);
            $insercion->execute();
            $insercion = NULL;
        }
    }
}
$seleccion = NULL;

if (isset($_POST["borrar"])){
    $borrado = $conexion->prepare("DELETE FROM video WHERE id = :idABorrar;");
    $borrado->bindParam(':idABorrar',$_POST["borrar"]);
    $borrado->execute();
    $borrado = null;
}else if (isset($_POST["modificarAcabado"])){
    $modificado = $conexion->prepare("UPDATE video SET Titulo=:tit, Genero=:gen, Any=:any, Precio=:pre WHERE id = :idABorrar ;");
    $modificado->bindParam(':idABorrar',$_POST["id"]);
    $modificado->bindParam(':tit',$_POST["titulo"]);
    $modificado->bindParam(':gen',$_POST["genero"]);
    $modificado->bindParam(':any',$_POST["any"]);
    $modificado->bindParam(':pre',$_POST["precio"]);
    $modificado->execute();
    $modificado = null;
}else if (isset($_POST["modificar"])){
    $seleccion = $conexion->prepare("SELECT * FROM video WHERE id = :id");
    $seleccion->bindParam(':id', $_POST["modificar"]);
    $seleccion->execute();
    $entrada = $seleccion->fetch();
    echo "<form method='post' action='peliculas.php' class='modificar'>";
    echo "TITULO: <input type='text' name='titulo' value='". $entrada["Titulo"] . "'/>";
    echo "GENERO: <input type='text' name='genero' value='". $entrada["Genero"] . "'/>";
    echo "AÑO: <input type='text' name='any' value='". $entrada["Any"] . "'/>";
    echo "PRECIO: <input type='number' name='precio' value='". $entrada["Precio"] . "'/>";
    echo "<input type='hidden' name='id' value='" . $_POST["modificar"] . "'/>";
    echo "<input type='submit' name='modificarAcabado' value='Actualizar'/>";
    echo "<input type='submit' value='Cancelar'/>";
    echo "</form>";
}else if (isset($_POST["insercion"])){
    $insercion = $conexion->prepare("INSERT INTO video (Titulo,Genero,Any,Precio) VALUES(:tit, :gen, :any, :pre );");
    $insercion->bindParam(':tit',$_POST["titulo"]);
    $insercion->bindParam(':gen',$_POST["genero"]);
    $insercion->bindParam(':any',$_POST["any"]);
    $insercion->bindParam(':pre',$_POST["precio"]);
    $insercion->execute();
    $insercion = null;
}

$consulta = $conexion->prepare("SELECT * FROM video");
$consulta->execute();
echo "<form method='POST' action='peliculas.php'>";
echo "<table><tr><th colspan='7'>Peliculas</th></tr>";
echo "<tr><th>ID</th><th>Titulo</th><th>Genero</th><th>Año</th><th>Precio</th></tr>";
while($registro = $consulta->fetch())
{
    echo "<tr>";
    echo "<td>" . $registro["id"] . "</td>";
    echo "<td>" . $registro["Titulo"] . "</td>";
    echo "<td>" . $registro["Genero"] . "</td>";
    echo "<td>" . $registro["Any"] . "</td>";
    echo "<td>" . $registro["Precio"] . "€</td>";
    echo "<td class='borrar'><button type='submit' name='borrar' value='" . $registro["id"] . "'>X</button></td>";
    echo "<td class='modificado'><button type='submit' name='modificar' value='" . $registro["id"] . "'>?</button></td>";
    echo "<tr>";
}
echo "</table></form>";
$consulta = NULL;
$conexion = NULL;


?>
</body>
</html>

