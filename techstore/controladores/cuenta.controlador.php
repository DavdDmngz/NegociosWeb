<?php

require_once "modelos/cuenta.modelo.php";

class CuentaControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Cuenta();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/cuenta/index.php";
    }
}