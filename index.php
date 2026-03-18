<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once 'src/controllers/ListaController.php';
require_once 'src/controllers/UsuarioController.php';

define("URL_ASSETS","http://".$_SERVER['HTTP_HOST']."/assets/");

function autenticado(){
    $jwt=$_COOKIE['token_biblioteca'] ?? null;
    if(!$jwt) return false;
    
    try{
        JWT::decode($jwt,new Key("48656c6c6f20776f726c642148656c6c6f20776f726c6421",'HS256'));
        return true;
    }
    catch(Exception $e){
        return false;
    }
}

$accion = $_GET['action'] ?? 'index';
$auth=new UsuarioController();

if(!autenticado() && $accion!=='procesarLogin'){
    $auth->mostrarLogin();
    exit();
}

switch($accion) {
    case 'procesarLogin':
        $auth->login();
        break;
    case 'logout':
        $auth->logout();
        break;
    case 'nuevo':
    case 'marcarLeido':
    case 'borrar':
    case 'index':
        $controlador=new ListaController();
        if(method_exists($controlador,$accion)){
            $controlador->$accion();
        }
        else{
            $controlador->index();
        }
        break;
    default:
        (new ListaController())->index();
        break;
}
