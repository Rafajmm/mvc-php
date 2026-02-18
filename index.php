<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("URL_ASSETS","http://".$_SERVER['HTTP_HOST']."/mvc/assets/");

require_once 'controllers/LibroController.php';

$controlador = new LibroController();
$accion = $_GET['action'] ?? 'index';

switch($accion) {
    case 'nuevo':
        $controlador->nuevo();
        break;
    case 'marcarLeido':
        $controlador->marcarLeido();
        break;
    case 'borrar':
        $controlador->borrar();
        break;
    default:
        $controlador->index();
        break;
}