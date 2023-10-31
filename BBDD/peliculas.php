<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
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
<?php
include "conexion.inc";
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$conexion = generarConexionBBDD("peliculas");
$file = "pelis.txt";
$fp = fopen($file, "r");

// Como no borramos la entrada eliminada del fichero .txt, cuando borremos otra entrada distinta la borrada previamente
// volverá a aparecer con el último índice

while(!feof($fp)) {
    $linea = fgets($fp);
    $campos = explode(",",$linea);
    $seleccion = $conexion->prepare("SELECT Titulo FROM video WHERE Titulo = :titulo");
    $seleccion->bindParam(':titulo', $campos[0]);
    $seleccion->execute();

    if ($seleccion->rowCount() === 0){
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
    $seleccion = NULL;
}

if (isset($_POST["borrar"])){
    $borrado = $conexion->prepare("DELETE FROM video WHERE id = :idABorrar;");
    $borrado->bindParam(':idABorrar',$_POST["borrar"]);
    $borrado->execute();
    $borrado = null;
}

$consulta = $conexion->prepare("SELECT * FROM video");
$consulta->execute();
echo "<form method='POST' action='peliculas.php'>";
echo "<table><tr><th colspan='6'>Peliculas</th></tr>";
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
    echo "<tr>";
}
echo "</table></form>";
$consulta = NULL;
$conexion = NULL;


?>
</body>
</html>

