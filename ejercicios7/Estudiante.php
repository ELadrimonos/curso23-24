<?php
include "Persona.php";

class Estudiante extends Persona
{
    private $numeroExpediente;
    public function __construct($nombre, $dni, $email,$edad, $numExpediente){
        parent::__construct($nombre,$dni,$email,$edad);
        $this->setNumeroExpediente($numExpediente);
    }

    protected function obtenerDatos(): string{
        return parent::obtenerDatos() . " - " . $this->getNumeroExpediente();
    }

    public function getNumeroExpediente()
    {
        return $this->numeroExpediente;
    }

    public function setNumeroExpediente($numeroExpediente): void
    {
        $this->numeroExpediente = $numeroExpediente;
    }
}