<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Primos</title>
    <link rel="stylesheet" type="text/css" href="estilos/principal.css">

    <style>
        body{
            background-color: #e5e5f7;
            background-image:  repeating-radial-gradient( circle at 0 0, transparent 0, #e5e5f7 10px ), repeating-linear-gradient( #dfb1e655, #dfb1e6 );
            display: block;
        }
        main{
            display: grid;
            grid-template-columns: repeat(10,1fr);
            grid-template-rows: repeat(10,1fr);
            grid-gap: 10px;
            height: 100vh;
            padding: 30px 25%;

        }
        div{
            transition: 0.4s;
            width: auto;
            height: auto;
            text-align: center;
            align-items: center;
            border-radius: 5px;
            display: flex;
            outline: 3px black solid;
        }
        .primo:hover{
            font-size: 1.3em;
            outline: 6px black solid;
            -webkit-animation-name: rubberBand;
            animation-name: rubberBand;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;

        }
/*
        div:nth-child(n+1):nth-child(-n+50){
            -webkit-animation-name: fadeInLeft;
            animation-name: fadeInLeft;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        div:nth-child(n+51):nth-child(-n+100){
            -webkit-animation-name: fadeInRight;
            animation-name: fadeInRight;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }*/

        p{
            font-size: 1.2em;
            width: 100%;
        }
        .primo{
            background: yellow;
            font-weight: bold;
        }
        .noprimo{
            background: #b8b8f3;
            font-style: italic;
        }

        @keyframes rubberBand {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1.2);
                transform: scale3d(1.25, 0.75, 1.2);
            }
            40% {
                -webkit-transform: scale3d(1.35, 2.05, 1.4);
                transform: scale3d(1.35, 2.05, 1.4);
            }
            50% {
                -webkit-transform: scale3d(1.8, 1.54, 1.6);
                transform: scale3d(1.8, 1.54, 1.6);
            }
            65% {
                -webkit-transform: scale3d(1.65, 1.7, 1.65);
                transform: scale3d(1.65, 1.7, 1.65);
            }
            75% {
                -webkit-transform: scale3d(1.8, 1.65, 1.8);
                transform: scale3d(1.8, 1.65, 1.8);
            }
            100% {
                -webkit-transform: scale3d(1.6, 1.6, 1.6);
                transform: scale3d(1.6, 1.6, 1.6);
            }
        }

    </style>
</head>
<body>
<section class="borroso"></section>

<main>
<?php
for ($i = 1; $i < 101;$i++){
    $divisiones = 1;
    $residuo = 0;
    do{
        if ($i % $divisiones == 0){
            $residuo++;
        }
        $divisiones++;
    } while ($divisiones <= $i);

    echo "<div class=" . (($residuo == 2) ? ('primo') : ('noprimo')) . "><p>$i</p></div>";
}
?>
</main>
</body>
</html>

