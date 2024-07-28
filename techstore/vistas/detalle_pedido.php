<?php
// Incluir el controlador necesario
require_once 'controladores/detalle.controlador.php';

// Obtener el ID del pedido de la URL
$pedido_id = isset($_GET['pedido_id']) ? (int)$_GET['pedido_id'] : 0;

// Crear una instancia del controlador
$detalleControlador = new DetalleControlador();

// Llamar al método adecuado en el controlador
if ($pedido_id > 0) {
    $detalleControlador->VerDetalles($pedido_id);
} else {
    // Manejo de error o redirección si no hay un ID de pedido válido
    echo "ID de pedido inválido.";
}
?>
