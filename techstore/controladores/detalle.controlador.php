<?php
require_once 'modelos/detalle.modelo.php';
require_once 'modelos/pedido.modelo.php'; // Incluye el modelo de pedidos si es necesario

class DetalleControlador {
    private $modeloDetalle;
    private $modeloPedido;

    public function __CONSTRUCT() {
        $this->modeloDetalle = new Detalle();
        $this->modeloPedido = new Pedido(); // Inicializa el modelo de pedidos
    }

    public function verDetalles($id = null) {
        if ($id === null) {
            echo "ID no proporcionado.";
            return;
        }

        $detalle = $this->modeloDetalle->obtenerPorId($id);

        if ($detalle) {
            require_once "vistas/header.php";
            require_once "vistas/menu.php";
            require_once "vistas/style.php";
            require_once "vistas/detalle/ver_detalles.php";
            require_once "vistas/scripts.php";
        } else {
            echo "Detalle no encontrado.";
        }
    }

    // Método para manejar la vista de pedidos si es necesario
    public function verPedidos() {
        $pedidos = $this->modeloPedido->listar();

        require_once "vistas/header.php";
        require_once "vistas/menu.php";
        require_once "vistas/style.php";
        require_once "vistas/pedido/index.php"; // Vista para listar pedidos
        require_once "vistas/scripts.php";
    }
}
?>
