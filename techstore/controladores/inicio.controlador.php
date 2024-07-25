<?php

require_once "modelos/usuario.modelo.php";

class InicioControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Usuario();
    }

    public function Inicio(){
        require_once "vistas/header.php";
        require_once "vistas/menu.php";
        require_once "vistas/style.php";
        require_once "vistas/inicio/principal.php";
        require_once "vistas/scripts.php";
    }
}