<?php

class Dado
{
    private $caras;
    private $min = 1;

    public function getCaras()
    {
        return $this->caras;
    }

    public function setCaras($caras): void
    {
        if ($caras > $this->getMin()) $this->caras = $caras;
    }

    public function __construct($fcaras = 6){
        $this->setCaras($fcaras);
    }

    public function tirarDado(){
        return rand($this->min,$this->caras);
    }


    public function getMin(): int
    {
        return $this->min;
    }
}