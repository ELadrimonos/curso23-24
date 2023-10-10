<?php

class Dado
{
    private $caras;
    private $min = 1;
    private $max = 6;

    public function getCaras()
    {
        return $this->caras;
    }

    public function setCaras($caras): void
    {
        if ($caras > $this->min && $caras <= $this->max) $this->caras = $caras;
    }

    public function __construct($fcaras = 6){
        $this->setCaras($fcaras);
    }

    public function tirarDado(){
        return rand($this->min,$this->caras);
    }
}