<?php
$seleccion = $conexion->prepare("SELECT * FROM video WHERE id = :id");
$seleccion->bindParam(':id', $_POST["modificar"]);
$seleccion->execute();
$entrada = $seleccion->fetch();
?>
<div class='modificar'>
    <img src='<?=$entrada['caratula']?>' alt='Caratula no agregada'>
    <form method='post' action='peliculas.php' enctype='multipart/form-data'>
        TITULO: <input type='text' name='titulo' value='<?= $entrada["Titulo"] ?>'/>
        GENERO: <input type='text' name='genero' value='<?= $entrada["Genero"] ?>'/>
        IMAGEN: <input type='file' name='fichero' value='<?= $entrada["caratula"] ?>'/>
        <input type='hidden' name='ficheroAntiguo' value='<?= $entrada["caratula"] ?>'/>
        AÑO: <input type='text' name='any' value='<?= $entrada["Any"] ?>'/>
        PRECIO: <input type='number' name='precio' value='<?= $entrada["Precio"] ?>'/>
        <input type='hidden' name='id' value='" . $_POST["modificar"] ?>'/>
        <input type='submit' name='modificarAcabado' value='Actualizar'/>
        <input type='submit' value='Cancelar'/>
        </form></div>