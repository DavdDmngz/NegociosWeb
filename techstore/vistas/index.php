<?php
require_once 'controladores/detalle.controlador.php';
require_once 'controladores/pedido.controlador.php';

$controlador = isset($_GET['c']) ? $_GET['c'] : 'inicio';
$accion = isset($_GET['a']) ? $_GET['a'] : 'inicio';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($controlador) {
    case 'detalle':
        $controladorDetalle = new DetalleControlador();
        if ($accion == 'verDetalles') {
            $controladorDetalle->verDetalles($id);
        }
        break;

    case 'pedido':
        $controladorPedido = new PedidoControlador();
        if ($accion == 'inicio') {
            $controladorPedido->Inicio();
        }
        break;

    default:
        // Redirigir a una página de inicio o mostrar un error
        echo "Página no encontrada.";
        break;
}
?>
