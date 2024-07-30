<?php

class Carrito {
    private $pdo;

    public function __CONSTRUCT() {
        $this->pdo = BaseDatos::conectar();
    }

    public function listar() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM carrito");
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $productos = [];
            foreach ($resultado as $row) {
                $productos[$row['id']] = $row['cantidad'];
            }
            return $productos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregar($id, $cantidad) {
        try {
            $this->pdo->beginTransaction();
            $consulta = $this->pdo->prepare("INSERT INTO carrito (id, cantidad) VALUES (?, ?) 
                                             ON DUPLICATE KEY UPDATE cantidad = cantidad + VALUES(cantidad)");
            $consulta->execute([$id, $cantidad]);
            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            error_log($e->getMessage()); // Registrar el error en un archivo de log
            echo "Hubo un error al agregar el producto. Por favor, inténtalo de nuevo.";
        }
    }

    public function eliminar($id) {
        try {
            $consulta = $this->pdo->prepare("DELETE FROM carrito WHERE id = ?");
            $consulta->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar($id, $cantidad) {
        try {
            $consulta = $this->pdo->prepare("UPDATE carrito SET cantidad = ? WHERE id = ?");
            $consulta->execute([$cantidad, $id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function vaciar() {
        try {
            $consulta = $this->pdo->prepare("TRUNCATE TABLE carrito");
            $consulta->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
