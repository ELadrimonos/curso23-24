<?php

$conseguirValores = $conexion->prepare("SELECT * FROM imparte WHERE dni = :dni AND asignatura = :asig");
$conseguirValores->bindParam(":dni", $datos[1]);
$conseguirValores->bindParam(":asig", $datos[2]);
$conseguirValores->execute();
$conseguirValores = $conseguirValores->fetch();

?>
DNI: <input type='number' name='dni' pattern='[0-9]{8}' minlength='8' min='10000000' max='99999999' value='<?=$datos[1]?>'/>
ASIGNATURA: <input type='text' name='asignatura' value='<?=$datos[2]?>' maxlength='5'/>

<input type='hidden' name='dniOriginal' value='<?=$datos[1] ?>'/>
<input type='hidden' name='asignaturaOriginal' value='<?=$datos[2] ?>'/>