<?php
include "Dado.php";

class Carta extends Dado
{
    private $max = 10;

    public function __construct($fcaras = 10){
        parent::__construct($fcaras);
    }


}