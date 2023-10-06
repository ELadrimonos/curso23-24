<?php
session_start();
if (isset($_SESSION["loginusu"])){
    echo "<a href='index.php'>Index</a>";
    echo "<a href='pag1.php'>Página 1</a>";
    echo "<a href='pag2.php'>Página 2</a>";
    echo "<a href='cerrarSesion.php'>Cerrar Sesión</a>";
} else {
    header("Location:login.php");
}

function cerrarSesion(){
    unset($_SESSION["loginusu"]);
    session_destroy();
    header("Location:login.php");
}

?>