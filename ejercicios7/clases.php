<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
</head>
<body>
<?php
    include "Estudiante.php";

    $p1 = new Estudiante("Adrián Primo Bernat", "10293475P", "adrpriber@alu.edu.gva.es",15, 1029348);
    $p1->Mostrar();

    $p2 = new Persona("David Picazo Hongoso", "03632456I", "davpicroc@alu.edu.gva.es",190);
    $p2->Mostrar();
?>
</body>
</html>

