<?php
include "Dado.php";

class Carta extends Dado
{
    public function __construct($fcaras = 13)
    {
        parent::__construct($fcaras);
    }
}