<?php 
require_once 'src/config/conexionBD.php';

class Usuario{
    private $bd;

    public function __construct(){
        $this->bd=BaseDatos::conectar();        
    }

    public function buscarUsuario($usuario){
        $sql="SELECT * FROM usuarios WHERE nombre_usuario=?";
        $stmt=$this->bd->prepare($sql);
        $stmt->execute([$usuario]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>