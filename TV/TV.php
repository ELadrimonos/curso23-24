<?php

class TV
{
    private string $Marca;
    private int $Canal;
    private int $Volumen;
    public static int $NumCanales = 50;

    public function __construct($marca,$canal = 1,$volumen = 50){
        $this->Marca = $marca;
        $this->CambiarCanal($canal);
        $this->setVolumen($volumen);
    }

    public function getCanal(): int
    {
        return $this->Canal;
    }

    public function AumentarVolumen($valor = 1):void
    {
        $this->setVolumen($this->getVolumen() + $valor);
    }
    public function DisminuirVolumen($valor = 1):void
    {
        $this->setVolumen($this->getVolumen() - $valor);
    }

    public function CambiarCanal(int $Canal): void
    {
        if ($Canal > 0 && $Canal <= self::$NumCanales)
        $this->Canal = $Canal;
    }

    public function Reiniciar():void
    {
        $this->Canal = 1;
        $this->Volumen = 50;
    }

    public function Estado(): string
    {
        return $this->Marca . " en el canal " . $this->Canal . " de " . self::$NumCanales . ", volumen " . $this->Volumen . "%";
    }

    public function getMarca(): string
    {
        return $this->Marca;
    }

    public function getVolumen(): int
    {
        return $this->Volumen;
    }
    public function setVolumen(int $Volumen): void
    {
        if ($Volumen >= 0 && $Volumen < 101)
        $this->Volumen = $Volumen;
    }
}