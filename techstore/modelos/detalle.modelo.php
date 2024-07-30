<?php
require_once 'BaseDatos.php'; // Asegúrate de que la ruta sea correcta

class Detalle {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = BaseDatos::conectar();
        } catch (Exception $e) {
            die("Error en la conexión a la base de datos: " . $e->getMessage());
        }
    }

    public function obtenerPorPedidoId($pedido_id) {
        try {
            if (!is_numeric($pedido_id)) {
                throw new Exception("ID inválido.");
            }

            $consulta = $this->pdo->prepare("
                SELECT d.detalle_pedido_id AS id, d.pedido_id, d.producto_id, p.nombre AS producto_nombre, d.descripcion_producto, d.nombre_producto, d.precio_producto AS producto_precio, c.nombre AS categoria, d.cantidad, d.imagen
                FROM detalle_pedido d
                JOIN producto p ON d.producto_id = p.id
                JOIN categoria c ON d.categoria = c.id
                WHERE d.pedido_id = :pedido_id
            ");
            $consulta->bindParam(':pedido_id', $pedido_id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die("Error al obtener detalles: " . $e->getMessage());
        }
    }
}
?>
