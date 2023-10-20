<?php

include_once "Terrestre.php";

class Moto extends Terrestre
{
    private $puertas;
    private $encencido;

    public function __construct($nombre,$marca,$modelo,$kms,$puertas = 2)
    {
        parent::__construct($nombre,$marca,$modelo,$kms);
        $this->puertas = $puertas;
//        $this->Encender();
    }

    public function Encender(){
        if (!$this->encencido){
            $this->encencido = true;
            echo "<h3>------ OTRAS CARACTERISTICAS DE UN " . strtoupper(get_class($this)) . " ------</h3>";
            echo "<p>" . strtoupper(get_class($this) . " " . $this->nombre) . " ENCENDIDO</p>";
            echo "<p>Marca: $this->Marca \t Modelo: $this->Modelo";

        }
    }
    public function Apagar(){
        if ($this->encencido){
            $this->encencido = false;
            $this->disminuirVelocidad($this->getVelocidad());
            echo "<p>" . strtoupper(get_class($this) . " " . $this->nombre) . " APAGADO</p>";
            echo "KM Totales: " . $this->km;
        }
    }

    public function __destruct(){
        if ($this->encencido){
            parent::__destruct();
            $this->Apagar();
        }
    }
}