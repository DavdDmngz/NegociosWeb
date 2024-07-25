<?php

require_once "modelos/producto.modelo.php";

class ProductoControlador {
    private $modelo;

    public function __CONSTRUCT() {
        $this->modelo = new Producto();
    }

    public function Inicio() {      
        require_once "vistas/style.php";
        require_once "vistas/sidebar.vertical.php";
        require_once "vistas/producto/index.php";
        require_once "vistas/foother.php";
        require_once "vistas/scripts.php";
    }

    public function Agregar() {      
        require_once "vistas/style.php";
        require_once "vistas/sidebar.vertical.php";
        require_once "vistas/producto/formulario.php";
        require_once "vistas/foother.php";
        require_once "vistas/scripts.php";
    }

    public function Guardar() {
        $producto = new Producto();

        $producto->setpro_nom($_POST['nombre']);
        $producto->setpro_desc($_POST['descripcion']);
        $producto->setpro_categoria($_POST['id_categoria']);
        $producto->setpro_precio($_POST['precio']);
        $producto->setpro_cant($_POST['cantidad']);
        $producto->setpro_img($_POST['imagen']);

        $this->model->Insertar($producto);

        header('Location:?c=producto&a=index');
    }
    
}
?>
