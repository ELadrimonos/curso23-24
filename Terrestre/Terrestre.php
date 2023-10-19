<?php

include_once "Vehiculo.php";

class Terrestre extends Vehiculo
{

    public function __construct($nombre)
    {
        parent::__construct($nombre);
    }

    public function __destruct(){
        parent::__destruct();
        $this->Frenar();
    }

    public function disminuirVelocidad($valor): void
    {
        if ($this->velocidad - $valor >= 0) {
            $this->velocidad = $this->velocidad - $valor;
            echo "<p>" . ucfirst($this->nombre) . " corriendo a " . $this->velocidad . "km/h (disminuyendo velocidad)</p>";
        } else $this->Frenar();
    }

    public function PasarBache()
    {
        echo "<p>Pasando un bache!</p>";
    }
    public function Frenar()
    {
        echo "<p>Frenazo!!!!</p>";
    }
}