<?php

require_once 'config/conexionBD.php';

class Libro{
    private $bd;

    public function __construct(){
        $this->bd=BaseDatos::conectar();
    }

    public function listar(){
        $sql="SELECT * FROM libros ORDER BY id";
        $stmt=$this->bd->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($titulo,$autor){
        $sql="INSERT INTO libros (titulo,autor) VALUES (?,?)";
        $stmt=$this->bd->prepare($sql);
        return $stmt->execute([$titulo,$autor]);
    }

    public function marcarComoLeido($id){
        $sql="UPDATE libros SET leido=NOT leido where id=?";
        $stmt=$this->bd->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function eliminar($id){
        $sql="DELETE FROM libros WHERE id=?";
        $stmt=$this->bd->prepare($sql);
        return $stmt->execute([$id]);
    }
}

?>