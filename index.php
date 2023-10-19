<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pagina PHP</title>
    <link rel="stylesheet" type="text/css" href="./estilos/principal.css">
    <link rel="stylesheet" type="text/css" href="./estilos/index.css">
</head>
<body>
<section class="borroso"></section>
<?php
$nombre = "Adrián Primo";
$any = "2004";
?>
<header>
    <h2>La página molona de <span><?= $nombre ?></span></h2>
    <p>Dando la lata desde <span><?=$any?></span></p>
</header>
<section>
    <article>
        <h2>Actividades Principio</h2>
        <p><a href="tablasmultiplicacion.php">Tablas de Multiplicación</a></p>
        <p><a href="primos.php">Numeros Primos</a></p>
        <p><a href="coches.php">Array Coches</a></p>
    </article>

    <article>
        <h2>Actividades Arrays</h2>
        <p><a href="./Arrays/index.html">Arrays</a></p>
        <p><a href="./Apuestas/selec_apuesta.html">Apuestas</a></p>
        <p><a href="./ejercicios4/libros/form_libros.php">Libros</a></p>
        <p><a href="./ejercicios4/departamentos/form_dep.php">Departamentos</a></p>
        <p><a href="./ejercicios4/ley_dhondt/ley.php">Ley d'Hont</a></p>
    </article>

    <article>
        <h2>Actividades Redirecciones, Cookies y Sesiones</h2>
        <p><a href="./Redirecciones/ejercicio1/formulario.php">Redirección 1</a></p>
        <p><a href="./Redirecciones/ejercicio2/formulario.php">Redirección 2</a></p>
        <p><a href="./ejercicios6/preferencias/preferencias.php">Preferencias Cookies</a></p>
        <p><a href="./ejercicios6/ficheros/ficheros.php">Contador fichero</a></p>
        <p><a href="./ejercicios6/carro/carro.php">Sesión Carrito Compra</a></p>
        <p><a href="./ejercicios6/login/index.php">Sesión Usuarios</a></p>
    </article>

    <article>
        <h2>Actividades Clases/Objetos</h2>
        <p><a href="./Ludopatia/ejercicio1.php">Ludopatía 1</a></p>
        <p><a href="./Ludopatia/ejercicio2.php">Ludopatía 2</a></p>
        <p><a href="./Ludopatia/ejercicio3.php">Ludopatía 3</a></p>
        <p><a href="./Ludopatia/ejercicio4.php">Ludopatía 4</a></p>
        <p><a href="./Terrestre/index.php">Vehículos Terrestres</a></p>
    </article>

    <article>
    <h2>Área del círculo</h2>
    <?php
        define("PI", 3.14);
        $radio = 3.5;
        $area = PI * ($radio ** 2);
    ?>
    <p>El área de un circulo de un radio de <?=$radio?> es <?=$area?></p>
    </article>
    
    <article>
        <h2>Bucles</h2>
        <?php
        $cont1 = 1;
        while ($cont1 <= 100){
            echo ($cont1 % 2 == 0) ? "<b>" . $cont1 . "</b>" : $cont1;
            if ($cont1 != 100) echo ", ";
            $cont1++;
        }
        echo "<br><br>";
        for($cont2 = 10; $cont2 >= 0;$cont2--){
            echo ($cont2 % 2 == 0) ? "<b>" . $cont2 . "</b>" : $cont2;
            if ($cont2 != 0) echo "-";
        }
        ?>
    </article>
</section>
</body>
</html>


