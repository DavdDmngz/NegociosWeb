<?php

require_once "modelos/categoria.modelo.php";

class CategoriaControlador {
    private $modelo;

    public function __CONSTRUCT() {
        $this->modelo = new Categoria();
    }

    public function Inicio() {
        require_once "vistas/style.php";
        require_once "vistas/sidebar.vertical.php";
        require_once "vistas/categoria/index.php";
        require_once "vistas/foother.php";
        require_once "vistas/scripts.php";
    }

    public function Agregar() {
        require_once "vistas/style.php";
        require_once "vistas/sidebar.vertical.php";
        require_once "vistas/categoria/formulario.php";
        require_once "vistas/foother.php";
        require_once "vistas/scripts.php";
    }

    public function Guardar() {
        $categoria = new Categoria();
        
        // Recoger datos del formulario
        $descripcion = $_POST['descripcion'];
        
        // Verificar si la categoría ya existe
        if ($this->modelo->CategoriaExiste($descripcion)) {
            // Redirigir con un mensaje de error
            header('Location:?c=categoria&a=agregar&error=category_exists');
            exit();
        }
    
        $categoria->setcat_des($descripcion);
        $this->modelo->Insertar($categoria);
        header('Location:?c=categoria&a=agregar');
    } 
}
?>
