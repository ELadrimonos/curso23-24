<?php


require_once "../conexion.php";


class Docencia extends Conexion
{
    private $pdo;
    public function __construct($nombreBD)
    {
        parent::__construct($nombreBD);
        $this->pdo=parent::conectar();
    }

    public function ObtenerProfes($modificar = 0)
    {
        try{
            $query = "SELECT * FROM profesores";
            if ($modificar !== 0) $query .= " WHERE dni = :dni";
            $registro = $this->pdo->prepare($query);
            if ($modificar !== 0) $registro->bindParam(":dni", $modificar, PDO::PARAM_INT);
            $registro->execute();
            return $registro->fetchAll();
        }catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }



    public function ObtenerAsignaturas($modificar = 0)
    {
        try{
            $query = "SELECT * FROM asignaturas";
            if ($modificar !== 0) $query .= " WHERE codigo = :cod";
            $registro = $this->pdo->prepare($query);
            if ($modificar !== 0) $registro->bindParam(":cod", $modificar);
            $registro->execute();
            return $registro->fetchAll();
        }catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
    public function ObtenerImparte($modificar1 = 0, $modificar2 = 0)
    {
        try{
            $query = "SELECT * FROM imparte";
            if ($modificar1 !== 0 && $modificar2 !== 0) $query .= " WHERE dni = :dni AND asignatura = :asig";
            $registro = $this->pdo->prepare($query);
            if ($modificar1 !== 0 && $modificar2 !== 0){

                $registro->bindParam(":dni", $modificar1);
                $registro->bindParam(":asig", $modificar2);
            }
            $registro->execute();
            return $registro->fetchAll();
        }catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function borrarEntrada($tabla, ...$identificador){

            $query = "DELETE FROM $tabla";
            switch ($tabla){
                case "profesores":
                    $query .= " WHERE dni = $identificador[0]";
                    break;
                case "asignaturas":
                    $query .= " WHERE codigo = '$identificador[0]'";
                    break;
                case "imparte":
                    $query .= " WHERE dni = $identificador[0] AND asignatura = '$identificador[1]'";
                    break;
                default:
                    return "No está bien definido el nombre de la tabla";
            }
            $registro = $this->pdo->prepare($query);
            $registro->execute();
            return $registro->fetchAll();

    }

    public function insertarEntrada($tabla, $valores){
        try{
            $query = "INSERT INTO $tabla VALUES(";
            foreach ($valores as $valor) {
                $query .= match (gettype($valor)) {
                    'string' => "'$valor', ",
                    default => $valor . ", ",
                };
            }
            // Como después de cada entrada se agrega una coma, quito la última para que no de error
            $query[strlen($query)-2] = " ";
            $query .= ")";
            echo $query . '<br>';
            $registro = $this->pdo->prepare($query);
            $registro->execute();
            return $registro->fetchAll();
        } catch (PDOException $e)
        {
            if ($e->getCode() === 23000)
            echo "<b>La entrada que has intentado insertar no tiene referencias en otras 
            tablas.<br>Por favor cree de esas referencias antes de realizar esta acción.</b>";
            die($e->getMessage());
        }
    }

    public function modificarEntrada($tabla,$valores){
            $query = "UPDATE $tabla SET ";
            switch ($tabla){
                case "profesores":
                    $query .= "dni = $valores[0],";
                    $query .= "nombre = '$valores[1]',";
                    $query .= "categoria = '$valores[2]',";
                    $query .= "ingreso = '$valores[3]' ";
                    $query .= " WHERE dni = $valores[4]";
                    break;
                case "asignaturas":
                    $query .= "codigo = '$valores[0]',";
                    $query .= "descripcion = '$valores[1]',";
                    $query .= "creditos = $valores[2],";
                    $query .= "creditosp = $valores[3] ";
                    $query .= " WHERE codigo = '$valores[4]'";
                    break;
                case "imparte":
                    $query .= "dni = $valores[0],";
                    $query .= "asignatura = '$valores[1]' ";
                    $query .= " WHERE dni = $valores[2] AND asignatura = '$valores[3]'";
                    break;
                default:
                    return "La tabla no existe";
            }
            $registro = $this->pdo->prepare($query);
            $registro->execute();
            return $registro->fetchAll();

    }

}