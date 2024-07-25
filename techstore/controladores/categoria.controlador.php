<?php

require_once "modelos/categoria.modelo.php";
require_once "helpers/session.php";


class CategoriaControlador{
    private $modelo;

    public function __CONSTRUCT() {
        $this->modelo = new Categoria();
    }
    public function Inicio(){
        require_once "vistas/header.php";
        require_once "vistas/menu.php";
        require_once "vistas/style.php";
        require_once "vistas/categoria/index.php";
        require_once "vistas/scripts.php";
    }

    public function Crear() {
        $categoria = new Categoria();
        $categoria->setcat_id($_POST['id']);
        $categoria->setcat_desc($_POST['descripcion']);
    }
    
}
?>
