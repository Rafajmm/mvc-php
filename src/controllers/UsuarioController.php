<?php 
use Firebase\JWT\JWT;
require_once 'src/models/Usuario.php';

class UsuarioController{
    private $modelo;
    private $key="48656c6c6f20776f726c642148656c6c6f20776f726c6421";

    public function __construct(){
        $this->modelo=new Usuario();
    }
    
    public function mostrarLogin(){
        require_once 'src/views/LoginView.php';
    }

    public function login(){
        $usuario=trim($_POST['usuario'] ?? '');
        $pass=trim($_POST['password'] ?? '');
        $datosUsuario=$this->modelo->buscarUsuario($usuario);

        if($datosUsuario && password_verify($pass,$datosUsuario['pass'])){
            $payload=[
                'iat'=>time(),
                'exp'=>time()+3600,
                'id'=>$datosUsuario['id'],
                'nombreUsuario'=>$datosUsuario['nombre_usuario']
            ];

            $jwt=JWT::encode($payload,$this->key,'HS256');

            setcookie("token_biblioteca",$jwt,time()+3600,"/","",false,true);
            header("Location: index.php");
        }
        else{
            echo "Credenciales incorrectas. <a href='index.php?action=login'>Reintentar</a>";
        }
    }

    public function logout(){
        setcookie("token_biblioteca","",time()-3600,"/","",false,true);

        header("Location: index.php");
        exit();
    }
}
?>