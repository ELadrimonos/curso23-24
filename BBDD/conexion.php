<?php

class Conexion {
    private $pdo;
    private $host;
    private $nombreBD ;
    private $usuario;
    private $password ;
    public function __construct($nombreBD)
    {
        $this->pdo="";
        $this->host = "localhost";
        $this->nombreBD = $nombreBD;
        $this->usuario = "root";
        $this->password = "";
    }
    public function conectar(){
        try{
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->nombreBD;charset=utf8",$this->usuario, $this->password);
            return $this->pdo;
        } catch (PDOException $e) {
            print " <p class=\"aviso\">Error: No puede conectarse con
la base de datos. {$e->getMessage()}</p>\n";
            exit;
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }

}