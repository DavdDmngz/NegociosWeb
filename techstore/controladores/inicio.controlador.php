<?php

require_once "modelos/usuario.modelo.php";
require_once "modelos/producto.modelo.php";

class InicioControlador{
    private $modelo;
    private $modeloProducto;

    public function __CONSTRUCT() {
        $this->modelo = new Usuario();
        $this->modeloProducto = new Producto();
    }

    public function Inicio(){
        $productos = $this->modeloProducto->Listar();
        require_once "vistas/header.php";
        require_once "vistas/menu.php";
        require_once "vistas/style.php";
        require_once "vistas/inicio/principal.php";
        require_once "vistas/scripts.php";
    }

    public function Home(){
        $productos = $this->modeloProducto->Listar();
        require_once "vistas/header.session.php";
        require_once "vistas/menu.php";
        require_once "vistas/style.php";
        require_once "vistas/inicio/principal.php";
        require_once "vistas/scripts.php";
    }
}