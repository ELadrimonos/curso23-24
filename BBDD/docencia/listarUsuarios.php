<?php
echo "<table><tr class='gris'><th colspan='4'>usuarios</th></tr>";
 echo "<tr><td colspan='4' class='insercion'><button type='submit' name='insertar' value='usuarios'>Insertar</button></td></tr>";
echo "<tr class='gris'><th>Usuario</th><th>Contraseña Encriptada</th><th colspan='2'></th></tr>";

$listadoUsuarios = $conexion->ObtenerUsuarios();

foreach ($listadoUsuarios as $usuario) {
    echo "<tr>";
    echo "<td>" . $usuario["usuario"] . "</td>";
    echo "<td>" . $usuario["password"] . "</td>";
    echo "<td class='borrar'><button type='submit' name='borrar' value='usuarios," . $usuario["usuario"] . "'>Borrar</button></td>";
    echo "<td class='modificado'><button type='submit' name='modificar' value='usuarios," . $usuario["usuario"] . "'>Modificar</button></td>";
    echo "<tr>";
}


echo "</table>";