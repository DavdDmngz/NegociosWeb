<?php
require_once 'modelos/pedido.modelo.php';
require_once 'modelos/producto.modelo.php';

class CarritoControlador {
    private $modeloPedido;
    private $modeloProducto;

    public function __construct() {
        $this->modeloPedido = new Pedido();
        $this->modeloProducto = new Producto();
    }

    public function agregarAlCarrito($productoId, $cantidad) {
        try {
            // Verificar existencia del producto
            $producto = $this->modeloProducto->obtenerPorId($productoId);
            if (!$producto) {
                throw new Exception("Producto no encontrado.");
            }

            // Verificar disponibilidad en inventario
            $cantidadDisponible = $this->modeloProducto->obtenerInventario($productoId);
            if ($cantidad > $cantidadDisponible) {
                throw new Exception("Cantidad solicitada excede el inventario disponible.");
            }

            // Agregar al carrito
            $precio = $producto->precio;
            $this->modeloPedido->agregarAlCarrito($producto->nombre, $cantidad, $precio);

            echo "Producto agregado al carrito con éxito.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function verCarrito() {
        try {
            $carrito = $this->modeloPedido->listarCarrito();

            require_once "vistas/header.php";
            require_once "vistas/menu.php";
            require_once "vistas/style.php";
            require_once "vistas/carrito/ver_carrito.php"; // Asegúrate de que este archivo existe y está bien configurado
            require_once "vistas/scripts.php";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function vaciarCarrito() {
        try {
            $this->modeloPedido->vaciarCarrito();
            echo "Carrito vaciado con éxito.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function realizarPedido() {
        try {
            $this->modeloPedido->insertarPedidoDesdeCarrito();
            echo "Pedido realizado con éxito.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
