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
            font-family: cs, sans-serif;
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
            width: 25vw;
            padding: 30px;
            left: 35%;
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: center;
            background: #b8b8f3;
        }

        .entrada > form{
            gap: 30px;
            align-self: center;
            display: grid;
            grid-template-columns: repeat(2,1fr);
        }

        .entrada > h1{
            text-transform: uppercase;
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
include "../conexion.inc";
include_once "Docencia.php";

$conexion = new Docencia("docencia");


if (isset($_POST["modoAdmin"])) {
    $_SESSION["esAdmin"] = $_POST["modoAdmin"];
}


// Si session asAdmin tiene valor se le asigna este, si no pasa a la siguiente opción
$modoAdmin = $_SESSION["esAdmin"] ?? "0";

if (isset($_POST["insertar"])){
    echo "<div class='entrada'><h1>".$_POST["insertar"]. "</h1><form method='post' action='insertarDocencia.php'>";
    switch ($_POST["insertar"]){
        case "profesores":
            include "form_Insertar_Profesores.php";
            break;
        case "imparte":
            include "form_Insertar_Imparte.php";
            break;
        case "asignaturas":
            include "form_Insertar_Asignatura.php";
            break;
    }
    echo "<input type='hidden' name='tabla' value='". $_POST['insertar'] . "'/>";
    echo "<input type='submit' value='Insertar'/>";
    echo "<input type='submit' name='tabla' value='Cancelar'/>";
    echo "</form></div>";

} elseif (isset($_POST["modificar"])){
    $datos = explode(",",$_POST["modificar"]);
    echo "<div class='entrada'><h1>$datos[0]</h1><form method='post' action='modificarDocencia.php'>";
    $conseguirValores = NULL;
    switch ($datos[0]){
        case "profesores":
            include "form_Modificar_Profesores.php";
            break;
        case "imparte":
            include "form_Modificar_Imparte.php";
            break;
        case "asignaturas":
            include "form_Modificar_Asignatura.php";
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
<form method="post" action="index.php">
    <div>
        <h2>Modo administración</h2>
        <label>
            <input type="radio" name="modoAdmin" value="0" onchange="this.form.submit()"
                <?php echo (!$modoAdmin ? "checked" : "");?>>
            Desactivado
        </label>

        <label>
            <input type="radio" name="modoAdmin" value="1" onchange="this.form.submit()"
                <?php echo ($modoAdmin ? "checked" : "");?>>
            Activado
        </label>
    </div>

    <?php


    if (isset($_POST["borrar"])){
        $datos = explode(",",$_POST["borrar"]);
        try{
            $conexion->borrarEntrada($datos[0],$datos[1], ($datos[2] ?? null));
        } catch (PDOException $e){
            if ($e == "23000") echo "<b>La entrada que has intentado borrar tiene referencias en otras 
            tablas las cuales no permiten que se elimine.<br>Por favor deshágase de esas referencias antes de realizar esta acción.</b>";
        }

        $borrado = NULL;
    }

    echo "<table><tr><th colspan='6'>profesores</th></tr>";
    echo "<tr><th>DNI</th><th>Nombre</th><th>Categoría</th><th>Ingreso</th>";

    if ($modoAdmin) echo "<th colspan='2'></th>";
    echo "</tr>";

    $listadoProfes = $conexion->ObtenerProfes();

    foreach ($listadoProfes as $profe) {
        echo "<tr>";
        echo "<td>" . $profe["dni"] . "</td>";
        echo "<td>" . $profe["nombre"] . "</td>";
        echo "<td>" . $profe["categoria"] . "</td>";
        echo "<td>" . $profe["ingreso"] . "</td>";
        if ($modoAdmin){
            echo "<td class='borrar'><button type='submit' name='borrar' value='profesores," . $profe["dni"] . "'>Borrar</button></td>";
            echo "<td class='modificado'><button type='submit' name='modificar' value='profesores," . $profe["dni"] . "'>Modificar</button></td>";
        }
        echo "<tr>";
    }

    if ($modoAdmin)
    echo "<tr><td colspan='6' class='insercion'><button type='submit' name='insertar' value='profesores'>Insertar</button></td></tr>";
    echo "</table>";


    echo "<table><tr><th colspan='6'>asignaturas</th></tr>";
    echo "<tr><th>codigo</th><th>descripcion</th><th>creditos</th><th>creditosP</th>";

    if ($modoAdmin) echo "<th colspan='2'></th>";
    echo "</tr>";

    $listadoAsignaturas = $conexion->ObtenerAsignaturas();

    foreach ($listadoAsignaturas as $asignatura) {
        echo "<tr>";
        echo "<td>" . $asignatura["codigo"] . "</td>";
        echo "<td>" . $asignatura["descripcion"] . "</td>";
        echo "<td>" . $asignatura["creditos"] . "</td>";
        echo "<td>" . $asignatura["creditosp"] . "</td>";
        if ($modoAdmin){
            echo "<td class='borrar'><button type='submit' name='borrar' value='asignaturas," . $asignatura["codigo"] . "'>Borrar</button></td>";
            echo "<td class='modificado'><button type='submit' name='modificar' value='asignaturas," . $asignatura["codigo"] . "'>Modificar</button></td>";
        }
        echo "<tr>";
    }
    if ($modoAdmin)
    echo "<tr><td colspan='6' class='insercion'><button type='submit' name='insertar' value='asignaturas'>Insertar</button></td></tr>";
    echo "</table>";


    echo "<table><tr><th colspan='4'>imparte</th></tr>";
    echo "<tr><th>DNI</th><th>Asignatura</th>";
    if ($modoAdmin) echo "<th colspan='2'></th>";
    echo "</tr>";

    $listadoImparte = $conexion->ObtenerImparte();

    foreach ($listadoImparte as $imparte) {
        echo "<tr>";
        echo "<td>" . $imparte["dni"] . "</td>";
        echo "<td>" . $imparte["asignatura"] . "</td>";
        if ($modoAdmin) {
            echo "<td class='borrar'><button type='submit' name='borrar' value='imparte," . $imparte["dni"] . "," . $imparte["asignatura"] . "'>Borrar</button></td>";
            echo "<td class='modificado'><button type='submit' name='modificar' value='imparte," . $imparte["dni"] . "," . $imparte["asignatura"] . "'>Modificar</button></td>";
        }
        echo "<tr>";
    }
    if ($modoAdmin)
    echo "<tr><td colspan='4' class='insercion'><button type='submit' name='insertar' value='imparte'>Insertar</button></td></tr>";
    echo "</table>";

    $conexion = NULL;
    ?>
    </form>
    </body>
    </html>


