<?php

$conseguirValores = $conexion->prepare("SELECT * FROM asignaturas WHERE codigo = :cod");
$conseguirValores->bindParam(":cod", $datos[1]);
$conseguirValores->execute();
$conseguirValores = $conseguirValores->fetch();

?>
CODIGO: <input type='text' name='codigo' maxlength="5" value='<?=$conseguirValores[0]?>'/>
DESCRIPCION: <input type='text' name='descripcion' value='<?=$conseguirValores[1]?>'/>
CREDITOS: <input type='text' name='creditos' value='<?=$conseguirValores[2]?>'/>
CREDITOSP: <input type='text' name='creditosp' value='<?=$conseguirValores[3]?>'/>
<input type='hidden' name='asignaturaOriginal' value='<?=$conseguirValores[0]?>'/>