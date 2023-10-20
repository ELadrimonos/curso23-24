<?php
session_start();
unset($_SESSION["vehiculos"]);
unset($_SESSION["kmTotales"]);
unset($_SESSION["vehiculosCreados"]);
session_destroy();
header("Location:index.php");
