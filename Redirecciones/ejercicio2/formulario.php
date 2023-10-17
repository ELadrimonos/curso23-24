<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario edad</title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        body{
            background: rgb(2,0,36);
            background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(36,36,195,1) 35%, rgba(0,212,255,1) 100%);
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1{
            background: #b484cc;
            border-bottom: #5e1569 solid 10px;
        }

        form{
            background: rgb(184,232,129);
            background: radial-gradient(circle, rgba(184,232,129,1) 35%, rgba(43,218,44,1) 100%);
            padding: 50px;
            border-radius: 15px;
        }

        input, button{
            border-radius: 10px;
            border: #e5e5f7 2px solid;
        }
        p{
            background: #f63535;
            padding: 5px;
            border: 6px #4d0707 dotted;
            border-radius: 15px;
            font-weight: bold;
            -webkit-animation-name: fadeInLeft;
            animation-name: fadeInLeft;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        p:after{
            content: "!!!!";
            font-size: 1.7em;
        }

    </style>

</head>
<body>
<h1>Formulario</h1>
<?php
    if (isset($_REQUEST["Mensaje"])){
        foreach ($_REQUEST["Mensaje"] as $item) {
            echo '<p>'.$item.'</p>';

        }
    }
?>
<form action="result.php">
<label>Escriba su nombre:
    <input type="text" name="nombre">
</label
<br><br>
<label>Escriba su edad (entre 18 y 130 años):
    <input type="text" name="edad">
</label>
<br>
<button type="submit">Comprobar</button>
<button type="reset">Borrar</button>
</form>
</body>
</html>

