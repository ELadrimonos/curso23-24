<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/curso23-24/estilos/principal.css">
    <style>
        body{
            background: #aaacd2;
        }
        fieldset{
            background: #b8b8f3;
            border: 1px solid white;
        }
        legend{
            background: #efefef;
            font-weight: bolder;
            font-size: 1.4em;
            border: 3px #9b95ef solid;
        }
        #inputs{
            padding: 10px;
            display: flex;
            justify-content: space-around;
            align-items: end;
            flex-direction: column;
            gap: 10px;
        }
        label{
            font-size: 1.2em;
            font-weight: bold;
        }

        input[type="text"], input[type="password"]{
            transition: 0.2s;
            background: #c4f5ff;
            border-radius: 10%/40%;
            padding: 5px;
            border: 2px outset #967b7b;
        }
        input[type="text"]:hover, input[type="password"]:hover, input[type="text"]:focus, input[type="password"]:focus{
            background: #fff6f9;
            border: 2px inset #967b7b;
        }
        input[type="submit"]{
            transition: 0.2s;
            font-size: 1.2em;
            background: #e5abb4;
            border: 2px outset #967b7b;
            font-weight: bold;
        }
        input[type="submit"]:hover, input[type="submit"]:focus{
            background: #fff6f9;
            border: 2px inset #967b7b;
        }

        button{
            transition: 0.2s;
            font-weight: bold;
            font-size: 1.4em;
            font-family: PiecesEight, sans-serif;
            width: 350px;
            height: 60px;
            margin-bottom: 10%;
            background: #fffd00;
            border-radius: 30px 30px 0 0;
        }

        button:hover, button:focus{
            background: #ffffdb;
        }
    </style>
</head>
<body>
<?php
    session_start();
    $fichero = "usuarios.txt";

    function confirmarCuentaExistente($usuario, $contra){
        global $fichero;
        $datos = file($fichero);
        foreach ($datos as $linea){
            $posicionPuntos = strpos($linea, ":");
            $usuarioLinea = substr($linea, 0, $posicionPuntos);
            $contraLinea = substr($linea, $posicionPuntos+1);
            if ($usuarioLinea == $usuario && rtrim($contraLinea) == $contra) return true;
        }
        return false;
    }

    function crearUsuario($usuario, $contra){
        global $fichero;
        $fp = fopen($fichero, "a");
        fwrite($fp, "\n" . $usuario . ":" . $contra);
        fclose($fp);

    }

    if (isset($_POST["username"]) && isset($_POST["password"])){
        if ($_POST["sesionExistente"] === "true"){
            if (confirmarCuentaExistente($_POST["username"],$_POST["password"])){
                $_SESSION["loginusu"] = $_POST["username"] . ":" . $_POST["password"];
                header("Location:index.php");
            } else echo "<h1>Datos Incorrectos</h1>";
        } else {
            crearUsuario($_POST["username"],$_POST["password"]);
            $_SESSION["loginusu"] = $_POST["username"] . ":" . $_POST["password"];
            header("Location:index.php");
        }
    }
?>
    <main>
        <button onclick="return cambiarModoInicio()">Cambiar modo de inicio de sesión</button>
        <form method="post" action="login.php" onsubmit="return validarContrasenyaCreada()">
            <fieldset>
                <legend id="cabeceraTipoInicio">Iniciar Sesión</legend>
                <div id="inputs">
                    <label>Usuario
                    <input type="text" name="username" required>
                    </label>
                    <br>
                    <label>Contraseña
                    <input type="password" name="password" required>
                    </label>
                    <br>
                    <label id="confirmarLabel" style="display: none">Confirmar
                        <input type="password" name="confirmPassword" disabled="disabled" required>
                    </label>
                    <br>
                    <input type="hidden" name="sesionExistente" value="true">
                    <input type="submit" value="Enviar">
                </div>
            </fieldset>
        </form>
    </main>

    <script>
        var modoIniciarSesion = document.getElementsByName("sesionExistente")[0];
        var cabeceraInicioSesion = document.getElementById("cabeceraTipoInicio");
        var labelConfirmar = document.getElementById("confirmarLabel");


        function cambiarModoInicio(){
            let valorActual =  modoIniciarSesion.value;
            let nuevoValor;
            if (valorActual === "true"){
                nuevoValor = "false";
                cabeceraInicioSesion.textContent = "Crear Cuenta"
                labelConfirmar.style.display = "block";
                document.getElementsByName("confirmPassword")[0].disabled = false;
            } else {
                nuevoValor = "true";
                cabeceraInicioSesion.textContent = "Iniciar Sesión"
                labelConfirmar.style.display = "none";
                document.getElementsByName("confirmPassword")[0].disabled = true;
            }

            modoIniciarSesion.value = nuevoValor;
        }

        function validarContrasenyaCreada() {
            if (!document.getElementsByName("confirmPassword")[0].disabled){
                if (document.getElementsByName("confirmPassword")[0].value !== document.getElementsByName("password")[0].value){
                    alert("Las contraseñas no coinciden");
                    return false;
                } else return true;

            } else return true;
        }
    </script>
</body>
</html>

