<?php
include "verifcar_repetidos.php";
include "ordenar_lista.php";

function SeleccionaNumeros($Size,$Posibles)
{
    $lista = [];
    for ($i = 0; $i < $Size; $i++){
        $lista[$i] = rand(1,$Posibles);
    }
    VerificarRepetidos($lista,$Posibles);
    OrdenarLista($lista);
    return $lista;
}

function OrdenarLista(&$Lista) : void
{
    $n = count($Lista);
    for ($x = 0; $x < $n - 1; $x++) {
        for ($y = 0; $y < $n - 1 - $x; $y++) {
            if ($Lista[$y] > $Lista[$y+1])
            {
                $aux = $Lista[$y];
                $Lista[$y] = $Lista[$y+1];
                $Lista[$y+1] = $aux;
            }
        }
    }
}


// La razón por la que no funcionaba era porque pasaba una referencia a la lista con &, lo que me permite modificarla
// y no necesito un return ya que la está modificando directamente
function VerificarRepetidos(&$Lista, $Posibles): void
{
    for ($x = 0; $x < count($Lista); $x++) {
        $cont = 0;
        for ($y = 0; $y < count($Lista); $y++) {
            // En caso de que el número aleatorio que devuelva sea el mismo valor que había antes
            $condicion = $Lista[$x] == $Lista[$y];
            if ($condicion) {
                $cont++;
                while ($condicion && $cont > 1) {
                    // Mensaje en la consola para verificar que se cambia un valor
                    echo("<script>console.log('" . $Lista[$x] . " esta repetido');</script>");
                    $Lista[$y] = rand(1, $Posibles);
                    echo("<script>console.log('" . $Lista[$y] . " es el nuevo valor');</script>");

                    $condicion = $Lista[$x] == $Lista[$y];
                }
            }
        }
    }
}

