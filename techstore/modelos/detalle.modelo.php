<?php

class Detalle {
    private $pdo;

    public function __construct() {
        $this->pdo = BaseDatos::conectar();
    }

    public function obtenerPorId($id) {
        try {
            if (!is_numeric($id)) {
                throw new Exception("ID inválido.");
            }

            $consulta = $this->pdo->prepare("
                SELECT d.id, d.pedido_id, d.producto_id, p.nombre AS producto_nombre, p.precio AS producto_precio, p.categoria, p.imagen, d.cantidad, (d.cantidad * p.precio) AS total
                FROM detalle_pedido d
                JOIN productos p ON d.producto_id = p.id
                WHERE d.pedido_id = :id
            ");
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
