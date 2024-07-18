<?php

class InicioControlador{
    private $modelo;

    public function Inicio(){
        $bd = BaseDatos :: conectar();
        require_once "vistas/encabezado.php";
        require_once "vistas/pie.php";
        require_once "vistas/inicio/principal.php";
    }
}