<?php
require_once 'modelos/pedido.modelo.php';

class PedidoControlador {
    private $modeloPedido;

    public function __CONSTRUCT() {
        $this->modeloPedido = new Pedido();
    }

    public function Inicio() {
        // Obtener los pedidos desde el modelo
        $pedidos = $this->modeloPedido->listar();

        // Incluir la vista y pasar los datos
        require_once "vistas/sidebar.vertical.php";
        require_once "vistas/style.php";

        // Aquí se pasa la variable $pedidos a la vista
        require_once "vistas/pedido/index.php";
        require_once "vistas/foother.php"; 
        require_once "vistas/scripts.php";
    }

    public function AgregarAlCarrito() {
        $producto = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $this->modeloPedido->agregarAlCarrito($producto, $cantidad, $precio);
        header('Location: carrito.php');
    }

    public function MostrarCarrito() {
        $carrito = $this->modeloPedido->listarCarrito();
        require_once "vistas/sidebar.vertical.php";
        require_once "vistas/style.php";
        require_once "vistas/carrito/index.php";
        require_once "vistas/foother.php"; 
        require_once "vistas/scripts.php";
    }

    public function FinalizarCompra() {
        $this->modeloPedido->insertarPedidoDesdeCarrito();
        header('Location: index.php');
    }
}
?>
