<?php


$conseguirValores = $conexion->ObtenerUsuarios($datos[1])[0];
?>
USUARIO: <input type='text' name='usuario' value='<?=$conseguirValores["usuario"]?>' maxlength="20"/>
CONTRASEÑA: <input type='text' name='password' maxlength="20" minlength="3"/>

<input type='hidden' name='usuarioOriginal' value='<?=$conseguirValores["usuario"]?>'/>
