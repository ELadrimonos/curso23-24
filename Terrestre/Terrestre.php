<?php

include_once "Vehiculo.php";

abstract class Terrestre extends Vehiculo
{

    public string $Marca, $Modelo;
    public function __construct($nombre,$marca,$modelo,$kms)
    {
        parent::__construct($nombre,$kms);
        $this->Marca = $marca;
        $this->Modelo = $modelo;
    }

    public function __destruct(){
        parent::__destruct();
        $this->Frenar();
    }
    public function aumentarVelocidad($valor){
        if ($this->velocidad + $valor <= $this->velocidadMaxima){
            $this->velocidad += $valor;
            echo "<p>" . ucfirst($this->nombre) . " corriendo a " . $this->velocidad . "km/h (aumentando velocidad)</p>";
        } else $this->velocidad = $this->velocidadMaxima;
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