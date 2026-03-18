<?php
require_once 'src/models/Lista.php';

class ListaController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Lista();
    }

    public function index() {
        $libros = $this->modelo->listar();
        require_once 'src/views/ListaView.php';
    }

    public function nuevo() {
        if ($_POST) {
            $this->modelo->guardar($_POST['titulo'], $_POST['autor']);
            header("Location: index.php");
        }
    }

    public function marcarLeido() {
        $this->modelo->marcarComoLeido($_GET['id']);
        header("Location: index.php");
    }

    public function borrar() {
        $this->modelo->eliminar($_GET['id']);
        header("Location: index.php");
    }
}