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
        echo "<h3>------ OTRAS CARACTERISTICAS DE UN " . strtoupper(get_class($this)) . " ------</h3>";
        $this->nombre = $nombre;
//        echo "<p>" . strtoupper($this->nombre) . " ARRANCANDO" . "</p>";
    }

    public function __destruct(){
        echo "<h3>------" . strtoupper($this->nombre) . " APAGADO------</h3>";
    }

    public function aumentarVelocidad($valor): void
    {
        if ($this->velocidad + $valor <= $this->velocidadMaxima){
            $this->velocidad += $valor;
            echo "<p>" . ucfirst($this->nombre) . " corriendo a " . $this->velocidad . "km/h (aumentando velocidad)</p>";
        } else $this->velocidad = $this->velocidadMaxima;
    }
    public function disminuirVelocidad($valor): void
    {
        if ($this->velocidad - $valor >= 0) {
            $this->velocidad -= $valor;
            echo "<p>" . ucfirst($this->nombre) . " corriendo a " . $this->velocidad . "km/h (disminuyendo velocidad)</p>";
        } else {
            $this->velocidad = 0;
        }
    }
    public function VelocidadMaxima($valor): void
    {
        $this->velocidadMaxima = $valor;
    }

    public function getVelocidad(): int
    {
        return $this->velocidad;
    }
}