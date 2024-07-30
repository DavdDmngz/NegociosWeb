<?php
require_once 'modelos/basemodel.php';

class Pedido extends BaseModel {
    public function CrearPedido($idUsuario, $fecha) {
        $sql = "INSERT INTO pedidos (id_usuario, fecha) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idUsuario, $fecha]);
        return $this->db->lastInsertId();
    }
}
?>
