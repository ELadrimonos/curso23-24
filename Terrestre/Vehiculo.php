<?php

abstract class Vehiculo
{
    public int $velocidad = 0;
    protected $velocidadMaxima = 120;
    public string $nombre;
    public static int $totalVehiculosCreados = 0;
    public static int $kmTotales = 0;
    public int $km = 0;

    public function __construct($nombre, $kms)
    {
        self::$totalVehiculosCreados++;
        $this->km = $kms;
        self::$kmTotales += $kms;
        $this->nombre = $nombre;
//        echo "<p>" . strtoupper($this->nombre) . " ARRANCANDO" . "</p>";
    }

    public function __destruct(){
        echo "<h3>------" . strtoupper($this->nombre) . " APAGADO------</h3>";
    }

    abstract public function aumentarVelocidad($valor);

    abstract public function disminuirVelocidad($valor);

    public function VelocidadMaxima($valor): void
    {
        $this->velocidadMaxima = $valor;
    }

    public function getVelocidad(): int
    {
        return $this->velocidad;
    }
}