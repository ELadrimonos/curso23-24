<?php
$conseguirValores = $conexion->ObtenerProfes($datos[1])[0];

?>
DNI: <input type='number' name='dni' pattern='[0-9]{8}' minlength='8' min='10000000' max='99999999' value='<?=$conseguirValores["dni"]?>'/>
NOMBRE: <input type='text' name='nombre' value='<?=$conseguirValores["nombre"]?>'/>
CATEGORIA: <input type='text' name='categoria' value='<?=$conseguirValores["categoria"]?>' maxlength='4''/>
INGRESO: <input type='date' name='ingreso' value='<?=$conseguirValores["ingreso"]?>'/>
<?php
//En caso de que se quiera modificar el DNI, tenemos esta copia para recordar cuál dni es el que modificaremos
?>
<input type='hidden' name='dniOriginal' value='<?=$conseguirValores["dni"] ?>'/>