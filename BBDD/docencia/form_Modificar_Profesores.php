<?php

$conseguirValores = $conexion->prepare("SELECT * FROM profesores WHERE dni = :dni");
$conseguirValores->bindParam(":dni", $datos[1]);
$conseguirValores->execute();
$conseguirValores = $conseguirValores->fetch();

?>
DNI: <input type='number' name='dni' pattern='[0-9]{8}' minlength='8' min='10000000' max='99999999' value='<?=$conseguirValores[0]?>'/>
NOMBRE: <input type='text' name='nombre' value='<?=$conseguirValores[1]?>'/>
CATEGORIA: <input type='text' name='categoria' value='<?=$conseguirValores[2]?>'maxlength='4''/>
INGRESO: <input type='date' name='ingreso' value='<?=$conseguirValores[3]?>'/>
<?php
//En caso de que se quiera modificar el DNI, tenemos esta copia para recordar cuál dni es el que modificaremos
?>
<input type='hidden' name='dniOriginal' value='<?=$conseguirValores[0] ?>'/>