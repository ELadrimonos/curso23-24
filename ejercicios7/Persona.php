<?php

class Persona
{
    private $DNI;
    private $nombre;
    private $email;
    private $edad;

    public function __construct($nombre, $dni, $email, $edad){
        $this->setNombre($nombre);
        $this->setDNI($dni);
        $this->setEmail($email);
        $this->setEdad($edad);
    }

    public function mayorDeEdad(): bool{
        return $this->getEdad() >= 18;
    }

    protected function obtenerDatos(): string{
        return $this->getNombre() . " - " . $this->getDNI() . " - " . $this->getEmail() . " - " . $this->getEdad();
    }

    public function Mostrar(): void{
        echo "<p>" . $this->obtenerDatos() . ($this->mayorDeEdad() ? " [Es mayor de Edad]" : " [Es un menor]") ."</p>";
    }

    public function getDNI()
    {
        return $this->DNI;
    }

    public function setDNI($DNI): void
    {
        $this->DNI = $DNI;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad): void
    {
        $this->edad = $edad;
    }
}