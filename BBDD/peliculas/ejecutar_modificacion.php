<?php
$rutaACaratula = (is_uploaded_file(($_FILES["fichero"]["tmp_name"])) ? subirImagen($_FILES["fichero"]["tmp_name"]) : $_POST["ficheroAntiguo"]);
$modificado = $conexion->prepare("UPDATE video SET Titulo=:tit, Genero=:gen, Any=:any, Precio=:pre, caratula = :cara WHERE id = :idABorrar ;");
$modificado->bindParam(':idABorrar',$_POST["id"]);
$modificado->bindParam(':tit',$_POST["titulo"]);
$modificado->bindParam(':gen',$_POST["genero"]);
$modificado->bindParam(':any',$_POST["any"]);
$modificado->bindParam(':pre',$_POST["precio"]);
$modificado->bindParam(':cara',$rutaACaratula);
$modificado->execute();
$modificado = null;