<?php


include_once "Terrestre.php";

class Bici extends Terrestre
{
    private $pedaleando;

    public function __construct($nombre)
    {
        parent::__construct($nombre);
        $this->VelocidadMaxima(40);
        $this->Empezar_A_Pedalear();
    }

    public function __destruct(){
        if ($this->pedaleando){
            parent::__destruct();
            $this->Parar_De_Pedalear();
        }
    }

    public function Empezar_A_Pedalear(){
        if (!$this->pedaleando){
            $this->pedaleando = true;


            echo "<p>" . strtoupper(get_class($this) . " " . $this->nombre) . " ARRANCADA</p>";
        }
    }
    public function Parar_De_Pedalear(){
        if ($this->pedaleando){
            $this->pedaleando = false;
            echo "<p>" . strtoupper(get_class($this) . " " . $this->nombre) . " HA PARADO DE PEDALEAR</p>";
            $this->Frenar();
        }
    }
}