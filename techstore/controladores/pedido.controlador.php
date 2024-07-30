<?php
require_once 'modelos/pedido.modelo.php';
require_once 'modelos/detalle.modelo.php';

class PedidoControlador {
    private $modeloPedido;
    private $modeloDetallePedido;

    public function __construct() {
        $this->modeloPedido = new Pedido();
        $this->modeloDetallePedido = new DetallePedido();
    }

    public function CrearPedido() {
        if (!isset($_SESSION)) {
            session_start();
        }
    
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?c=usuario&a=Login');
            exit;
        }
    
        $idUsuario = $_SESSION['user_id'];
        $fecha = date('Y-m-d H:i:s');
        $pedidoId = $this->modeloPedido->CrearPedido($idUsuario, $fecha);
    
        $carrito = json_decode($_COOKIE['carrito'], true);
    
        foreach ($carrito as $producto) {
            $productoId = isset($producto['id']) ? $producto['id'] : null;
            $nombre = isset($producto['nombre']) ? $producto['nombre'] : null;
            $descripcion = isset($producto['descripcion']) ? $producto['descripcion'] : null;
            $precio = isset($producto['precio']) ? $producto['precio'] : null;
            $categoria = isset($producto['categoria']) ? $producto['categoria'] : null;
            $imagen = isset($producto['imagen']) ? $producto['imagen'] : null;
            $cantidad = isset($producto['cantidad']) ? $producto['cantidad'] : null;
    
            if ($productoId && $nombre && $precio && $cantidad) {
                $this->modeloDetallePedido->CrearDetallePedido(
                    $pedidoId, 
                    $productoId, 
                    $nombre, 
                    $descripcion, 
                    $precio, 
                    $categoria, 
                    $imagen, 
                    $cantidad
                );
            }
        }
    
        setcookie('carrito', '', time() - 3600, '/');
        header('Location: ?c=pedido&a=Confirmacion');
    }
    

    public function Confirmacion() {
        require_once 'vistas/style.php';
        require_once 'vistas/menu.php';
        require_once 'vistas/pedido/confirmacion.php';
        require_once 'vistas/scripts.php';
    }
}

?>
