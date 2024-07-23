<?php

require_once "modelos/producto.modelo.php";

class ProductoControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Producto();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/producto/index.php";
        require_once "vistas/scripts.php";
    }
}