<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image to Text Converter</title>
    <style>

    </style>
</head>
<body>

<form method="post" action="bitmap.php" enctype="multipart/form-data">
    <input type="file" name="archivo">
    <input type="submit" name="enviar" value="enviar">
</form>
<br><br><br>
<pre>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST["enviar"])) {
    //Fichero en el que deseamos guardar el resultado
    $fp = fopen("archivo.txt", "w");

    //imagen que queremos leer (hay que tener gd.lib instalada y activa)
    $img = imagecreatefrompng($_FILES["archivo"]["tmp_name"]);

    //Obtenemos el tamaño
    $width = imagesx($img); //ancho
    $height = imagesy($img); //alto

    for ($pixelVertical = 0; $pixelVertical < $height; $pixelVertical += 4) {
        for ($pixelHorizontal = 0; $pixelHorizontal < $width; $pixelHorizontal += 4) {
            $rgb = imagecolorat($img, $pixelHorizontal, $pixelVertical);
            //Valor de las componentes RGB de cada pixel
            $rojo = $rgb >> 16;
            $verde = $rgb >> 8 & 255;
            $azul = $rgb & 255;

            $media = ($rojo / 255 + $verde / 255 + $azul / 255) / 3;
            $caracterActual = "";

//            echo "RGB: $rojo, $verde, $azul<br>";
//            echo "Media: $media<br>";

            if ($media >= 0.91) {
                $caracterActual = " ";
            } elseif ($media >= 0.8) {
                $caracterActual = ".";
            } elseif ($media >= 0.6) {
                $caracterActual = ":";
            } elseif ($media >= 0.4) {
                $caracterActual = "o";
            } elseif ($media >= 0.3) {
                $caracterActual = "O";
            } elseif ($media >= 0.1) {
                $caracterActual = "G";
            } else{
                $caracterActual = "#";
            }

            echo $caracterActual;
            fwrite($fp, $caracterActual);

            //Elegir el caracter según la luminosidad del pixel y escribir en el fichero

        }
        echo "\n";

        fwrite($fp, "\n");
    }
    fclose($fp);
}
?>
    </pre>
</body>
</html>
