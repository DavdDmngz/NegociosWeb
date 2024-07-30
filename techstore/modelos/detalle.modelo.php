<?php

require_once 'modelos/basemodel.php';

class DetallePedido extends BaseModel {
    public function CrearDetallePedido($pedidoId, $productoId, $nombre, $descripcion, $precio, $categoria, $imagen, $cantidad) {
        $sql = "INSERT INTO detalle_pedido (pedido_id, producto_id, nombre_producto, descripcion_producto, precio_producto, categoria, imagen, cantidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$pedidoId, $productoId, $nombre, $descripcion, $precio, $categoria, $imagen, $cantidad]);
    }
}
?>
