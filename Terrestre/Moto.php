<?php

include_once "Terrestre.php";

class Moto extends Terrestre
{
    private $puertas;
    private $encencido;

    public function __construct($nombre,$puertas = 2)
    {
        parent::__construct($nombre);
        $this->puertas = $puertas;
        $this->Encender();
    }

    public function Encender(){
        if (!$this->encencido){
            $this->encencido = true;
            echo "<p>" . strtoupper(get_class($this) . " " . $this->nombre) . " ENCENDIDO</p>";
        }
    }
    public function Apagar(){
        if ($this->encencido){
            $this->encencido = false;
            $this->disminuirVelocidad($this->getVelocidad());
            echo "<p>" . strtoupper(get_class($this) . " " . $this->nombre) . " APAGADO</p>";
        }
    }

    public function __destruct(){
        if ($this->encencido){
            parent::__destruct();
            $this->Apagar();
        }
    }
}