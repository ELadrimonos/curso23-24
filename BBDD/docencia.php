<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        table, td, th{
            border-collapse: collapse;
            border: 3px solid black;
        }
        body{
            align-items: start;
            position: relative;
            font-family: sans-serif;
        }

        h2{
            font-family: cs;
        }
        form{
            display: flex;
            flex-direction: column;
            gap: 50px;
        }

        tr:nth-child(-n + 2){
            background: #c9c9c9;
        }

        table{
            width: fit-content;
        }
        button{
            width: 100%;
        }
        div.entrada {
            position: absolute;
            width: 50vh;
            aspect-ratio: 1/1;
            left: 35%;
            background: #b8b8f3;
        }
        th{
            text-transform: capitalize;
        }
        table button {
            width: 100%;
            height: 100%;
            border-radius: 0;
            border: none;
            margin: 0;
            background: none;
            font-weight: bold;
        }

        button:hover{
            cursor: pointer;
        }

        .insercion{
            background: darkseagreen;

        }

        .borrar{
            background: red;
        }

        .modificado{
            background: #9c9ce3;
        }
        .insercion:hover{
            background: #cdffcd;
        }

        .borrar:hover{
            background: #ea7272;
        }

        .modificado:hover{
            background: #dedeff;
        }
        
        


     </style>
</head>
<body>
<?php
session_start();
include "conexion.inc";
$conexion = generarConexionBBDD("docencia");

if (isset($_POST["modoAdmin"])) {
    $_SESSION["esAdmin"] = $_POST["modoAdmin"];
}

$modoAdmin = isset($_SESSION["esAdmin"]) ? $_SESSION["esAdmin"] : "0";

if (isset($_POST["insertar"])){
    echo "<div class='entrada'><form method='post' action='insertarDocencia.php'>";
    switch ($_POST["insertar"]){
        case "profesores":
            echo "DNI: <input type='number' name='dni' pattern='[0-9]{8}' minlength='8' min='10000000' max='99999999'/>";
            echo "NOMBRE: <input type='text' name='nombre'/>";
            echo "CATEGORIA: <input type='text' name='categoria'/>";
            echo "INGRESO: <input type='date' name='ingreso'/>";
            break;
        case "imparte":
            echo "DNI: <input type='number' name='dni' pattern='[0-9]{8}'/>";
            echo "ASIGNATURA: <input type='text' name='asignatura'/>";
            break;
        case "asignaturas":
            echo "CODIGO: <input type='text' name='codigo'/>";
            echo "DESCRIPCION: <input type='text' name='descripcion'/>";
            echo "CREDITOS: <input type='text' name='creditos'/>";
            echo "CREDITOSP: <input type='text' name='creditosp'/>";
            break;
    }
    echo "<input type='hidden' name='tabla' value='". $_POST['insertar'] . "'/>";
    echo "<input type='submit' value='Insertar'/>";
    echo "<input type='submit' name='tabla' value='Cancelar'/>";
    echo "</form></div>";
} elseif (isset($_POST["modificar"])){
    echo "<div class='entrada'><form method='post' action='modificarDocencia.php'>";
    $conseguirValores = NULL;
    $datos = explode(",",$_POST["modificar"]);

    switch ($datos[0]){
        case "profesores":
            $conseguirValores = $conexion->prepare("SELECT * FROM profesores WHERE dni = :dni");
            $conseguirValores->bindParam(":dni", $datos[1]);
            $conseguirValores->execute();
            $conseguirValores = $conseguirValores->fetch();
            echo "DNI: <input type='number' name='dni' pattern='[0-9]{8}' minlength='8' min='10000000' max='99999999' value='" . $conseguirValores[0] . "'/>";
            echo "NOMBRE: <input type='text' name='nombre' value='" . $conseguirValores[1] ."'/>";
            echo "CATEGORIA: <input type='text' name='categoria' value='" . $conseguirValores[2] ."'/>";
            echo "INGRESO: <input type='date' name='ingreso' value='" . $conseguirValores[3] ."'/>";
            //En caso de que se quiera modificar el DNI, tenemos esta copia para recordar cual dni es el que modificaremos
            echo "<input type='hidden' name='dniOriginal' value='" . $conseguirValores[0] . "'/>";
            break;
        case "imparte":
            $conseguirValores = $conexion->prepare("SELECT * FROM imparte WHERE dni = :dni AND asignatura = :asig");
            $conseguirValores->bindParam(":dni", $datos[1]);
            $conseguirValores->bindParam(":asig", $datos[2]);
            $conseguirValores->execute();
            $conseguirValores = $conseguirValores->fetch();
            echo "DNI: <input type='number' name='dni' pattern='[0-9]{8}' value='" . $datos[1] ."'/>";
            echo "ASIGNATURA: <input type='text' name='asignatura' value='" . $datos[2] ."'/>";
            echo "<input type='hidden' name='dniOriginal' value='" . $datos[1] . "'/>";
            echo "<input type='hidden' name='asignaturaOriginal' value='" . $datos[2] . "'/>";
            break;
        case "asignaturas":
            $conseguirValores = $conexion->prepare("SELECT * FROM asignaturas WHERE codigo = :cod");
            $conseguirValores->bindParam(":cod", $datos[1]);
            $conseguirValores->execute();
            $conseguirValores = $conseguirValores->fetch();
            echo "CODIGO: <input type='text' name='codigo' value='" . $conseguirValores[0] ."'/>";
            echo "DESCRIPCION: <input type='text' name='descripcion' value='" . $conseguirValores[1] ."'/>";
            echo "CREDITOS: <input type='text' name='creditos' value='" . $conseguirValores[2] ."'/>";
            echo "CREDITOSP: <input type='text' name='creditosp' value='" . $conseguirValores[3] ."'/>";
            echo "<input type='hidden' name='codigoOriginal' value='" . $conseguirValores[0] . "'/>";
            break;
        default:
            print_r($_POST["modificar"]);
    }
    echo "<input type='hidden' name='tabla' value='". $datos[0] . "'/>";
    echo "<input type='submit' value='Actualizar'/>";
    echo "<input type='submit' name='tabla' value='Cancelar'/>";
    echo "</form></div>";
}


?>
<h1>Base de datos docencia</h1>
<form method="post" action="docencia.php">
    <div>
        <h2>Modo administración</h2>
        <label>
            <input type="radio" name="modoAdmin" value="0" onchange="this.form.submit()"
                <?php echo ($_SESSION['esAdmin'] == "0" || $_SESSION == NULL ? "checked" : "");?>>
            Desactivado
        </label>

        <label>
            <input type="radio" name="modoAdmin" value="1" onchange="this.form.submit()"
                <?php echo ($_SESSION['esAdmin'] == "1" ? "checked" : "");?>>
            Activado
        </label>
    </div>

    <?php


    if (isset($_POST["borrar"])){
        $datos = explode(",",$_POST["borrar"]);
        $borrado = NULL;
        switch ($datos[0]){
            case "profesores":
                $borrado = $conexion->prepare("DELETE FROM profesores WHERE dni = :dni");
                $borrado->bindParam(":dni", $datos[1]);
                break;
            case "asignaturas":
                $borrado = $conexion->prepare("DELETE FROM asignaturas WHERE codigo = :cod");
                $borrado->bindParam(":cod", $datos[1]);
                break;
            case "imparte":
                $borrado = $conexion->prepare("DELETE FROM imparte WHERE dni = :dni AND asignatura = :asig");
                $borrado->bindParam(":dni", $datos[1]);
                $borrado->bindParam(":asig", $datos[2]);
                break;
        }
        try{
            $borrado->execute();
        } catch (PDOException){
            if ($borrado->errorCode() == "23000") echo "<b>La entrada que has intentado borrar tiene referencias en otras 
            tablas las cuales no permiten que se elimine.<br>Por favor deshágase de esas referencias antes de realizar esta acción.</b>";
        }

        $borrado = NULL;
    }

    echo "<table><tr><th colspan='6'>profesores</th></tr>";
    echo "<tr><th>DNI</th><th>Nombre</th><th>Categoria</th><th>Ingreso</th>";

    if ($modoAdmin) echo "<th colspan='2'></th>";
    echo "</tr>";

    $obtenerProfesores = $conexion->prepare("SELECT * FROM profesores;");
    $obtenerProfesores->execute();

    while($registro = $obtenerProfesores->fetch())
    {
        echo "<tr>";
        echo "<td>" . $registro["dni"] . "</td>";
        echo "<td>" . $registro["nombre"] . "</td>";
        echo "<td>" . $registro["categoria"] . "</td>";
        echo "<td>" . $registro["ingreso"] . "</td>";
        if ($modoAdmin){
            echo "<td class='borrar'><button type='submit' name='borrar' value='profesores," . $registro["dni"] . "'>Borrar</button></td>";
            echo "<td class='modificado'><button type='submit' name='modificar' value='profesores," . $registro["dni"] . "'>Modificar</button></td>";
        }
        echo "<tr>";
    }
    if ($modoAdmin)
    echo "<tr><td colspan='6' class='insercion'><button type='submit' name='insertar' value='profesores'>Insertar</button></td></tr>";
    echo "</table>";

    $obtenerProfesores = NULL;

    echo "<table><tr><th colspan='6'>asignaturas</th></tr>";
    echo "<tr><th>codigo</th><th>descripcion</th><th>creditos</th><th>creditosP</th>";

    if ($modoAdmin) echo "<th colspan='2'></th>";
    echo "</tr>";

    $obtenerAsignaturas = $conexion->prepare("SELECT * FROM asignaturas;");
    $obtenerAsignaturas->execute();

    while($registro = $obtenerAsignaturas->fetch())
    {
        echo "<tr>";
        echo "<td>" . $registro["codigo"] . "</td>";
        echo "<td>" . $registro["descripcion"] . "</td>";
        echo "<td>" . $registro["creditos"] . "</td>";
        echo "<td>" . $registro["creditosp"] . "</td>";
        if ($modoAdmin){
            echo "<td class='borrar'><button type='submit' name='borrar' value='asignaturas," . $registro["codigo"] . "'>Borrar</button></td>";
            echo "<td class='modificado'><button type='submit' name='modificar' value='asignaturas," . $registro["codigo"] . "'>Modificar</button></td>";
        }
        echo "<tr>";
    }
    if ($modoAdmin)
    echo "<tr><td colspan='6' class='insercion'><button type='submit' name='insertar' value='asignaturas'>Insertar</button></td></tr>";
    echo "</table>";
    $obtenerAsignaturas = NULL;

    echo "<table><tr><th colspan='4'>imparte</th></tr>";
    echo "<tr><th>DNI</th><th>Asignatura</th>";
    if ($modoAdmin) echo "<th colspan='2'></th>";
    echo "</tr>";

    $obtenerImparte = $conexion->prepare("SELECT * FROM imparte;");
    $obtenerImparte->execute();

    while($registro = $obtenerImparte->fetch())
    {
        echo "<tr>";
        echo "<td>" . $registro["dni"] . "</td>";
        echo "<td>" . $registro["asignatura"] . "</td>";
        if ($modoAdmin) {
            echo "<td class='borrar'><button type='submit' name='borrar' value='imparte," . $registro["dni"] . "," . $registro["asignatura"] . "'>Borrar</button></td>";
            echo "<td class='modificado'><button type='submit' name='modificar' value='imparte," . $registro["dni"] . "," . $registro["asignatura"] . "'>Modificar</button></td>";
        }
        echo "<tr>";
    }
    if ($modoAdmin)
    echo "<tr><td colspan='4' class='insercion'><button type='submit' name='insertar' value='imparte'>Insertar</button></td></tr>";
    echo "</table>";
    $obtenerImparte = NULL;
    $conexion = NULL;
    ?>
    </form>
    </body>
    </html>


