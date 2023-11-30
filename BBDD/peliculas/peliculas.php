<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Peliculas</title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

<form action="peliculas.php" method="post" class="insercion" enctype="multipart/form-data">
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
        <input type='text' name='any' pattern="[0-9]{4}" maxlength="4" minlength="4">
    </label>
    <label>
        PRECIO:
        <input type='number' name='precio'>
    </label>
    <input type="file" name="fichero" required/>
    <input type='submit' name='insercion' value='Insertar'/>
    <input type="hidden" name="MAX_FILE_SIZE" value="20000" />
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


function subirImagen($imagenCaratula): string
{
    if (is_uploaded_file($imagenCaratula)) {
        $nombreDirectorio = "/curso23-24/BBDD/peliculas/caratulas/";
        $idUnico = time();
        $nombreFichero = $idUnico . "-" . $_FILES['fichero']['name'];
        $rutaACaratula = $nombreDirectorio . $nombreFichero;
        move_uploaded_file($_FILES['fichero']['tmp_name'], "/opt/lampp/htdocs" . $rutaACaratula);
    } else
        print ("No se ha podido subir el fichero\n");
    return $rutaACaratula;
}

if (isset($_POST["borrar"])){
    $borrado = $conexion->prepare("DELETE FROM video WHERE id = :idABorrar;");
    $borrado->bindParam(':idABorrar',$_POST["borrar"]);
    $borrado->execute();
    $borrado = null;
}else if (isset($_POST["modificarAcabado"])){
    include_once "ejecutar_modificacion.php";
}else if (isset($_POST["modificar"])){
    include_once "form_modificar.php";
}else if (isset($_POST["insercion"])){
    $rutaACaratula = subirImagen($_FILES["fichero"]["tmp_name"]);

    $insercion = $conexion->prepare("INSERT INTO video (Titulo,Genero,Any,Precio,caratula) VALUES(:tit, :gen, :any, :pre, :cara );");
    $insercion->bindParam(':tit',$_POST["titulo"]);
    $insercion->bindParam(':gen',$_POST["genero"]);
    $insercion->bindParam(':any',$_POST["any"]);
    $insercion->bindParam(':pre',$_POST["precio"]);
    $insercion->bindParam(':cara',$rutaACaratula);
    $insercion->execute();
    $insercion = null;
}

$consulta = $conexion->prepare("SELECT * FROM video");
$consulta->execute();
echo "<form method='POST' action='peliculas.php' id='tabla'>";
echo "<table><thead><tr><th colspan='7'>Peliculas</th></tr>";
echo "<tr><th>ID</th><th>Titulo</th><th>Genero</th><th>Año</th><th>Precio</th><th colspan='2'>Acciones</th></tr></thead><tbody>";
while($registro = $consulta->fetch())
{
    echo "<tr>";
    echo "<td>" . $registro["id"] . "</td>";
    echo "<td>" . $registro["Titulo"] . "</td>";
    echo "<td>" . $registro["Genero"] . "</td>";
    echo "<td>" . $registro["Any"] . "</td>";
    echo "<td>" . $registro["Precio"] . "€</td>";
    echo "<td class='borrar'><button type='submit' name='borrar' value='" . $registro["id"] . "'>Borrar</button></td>";
    echo "<td class='modificado'><button type='submit' name='modificar' value='" . $registro["id"] . "'>Modificar</button></td>";
    echo "</tr>";
}
echo "</tbody></table></form>";
$consulta = NULL;
$conexion = NULL;


?>
</body>
</html>

