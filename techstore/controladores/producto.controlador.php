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

    public function Crear(){
        $producto=new Producto();
        $producto->setpro_nombre($_POST['nombre']);
        $producto->setpro_descripcion($_POST['descripcion']);
        $producto->setpro_tipo_producto($_POST['tipo_producto']);
        $producto->setpro_precio_compra($_POST['precio_compra']);
        $producto->setpro_precio_venta($_POST['precio_venta']);
        $producto->setpro_marca($_POST['marca']);
        $producto->setpro_cantidad($_POST['cantidad']);
        $producto->setpro_imagen($_POST['imagen']);

        $this->modelo->Insertar($producto);

        header("location:?c=producto&a=inicio");
    }
}