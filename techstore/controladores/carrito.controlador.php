<?php

require_once "modelos/carrito.modelo.php"; // Asegúrate de que este archivo exista

class CarritoControlador {
    private $modeloCarrito;

    public function __CONSTRUCT() {
        $this->modeloCarrito = new Carrito(); // Asegúrate de que esta clase exista
    }

    public function ver() {
        require_once "vistas/style.php";
        require_once "vistas/header.session.php";
        require_once "vistas/menu.php";
        require_once "vistas/carrito/index.php";
        require_once "vistas/foother.php";
        require_once "vistas/scripts.php";
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen'];
            $cantidad = $_POST['cantidad'];

            try {
                // Llama al método agregar del modelo
                $this->modeloCarrito->agregar($id, $cantidad);

                // Redirigir al carrito o al índice
                header("Location: ?c=carrito&a=ver");
            } catch (Exception $e) {
                // Manejo de errores
                error_log($e->getMessage());
                echo "Hubo un error al agregar el producto. Por favor, inténtalo de nuevo.";
            }
        }
    }
}
?>
