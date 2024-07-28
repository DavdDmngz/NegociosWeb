<?php
class Pedido {
    private $pdo;

    public function __construct() {
        $this->pdo = BaseDatos::conectar();
    }

    public function agregarAlCarrito($producto, $cantidad, $precio) {
        try {
            $total = $cantidad * $precio;
            $consulta = "INSERT INTO carrito (producto, cantidad, precio, total) VALUES (?, ?, ?, ?);";
            $this->pdo->prepare($consulta)
                ->execute([$producto, $cantidad, $precio, $total]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarCarrito() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM carrito");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function vaciarCarrito() {
        try {
            $consulta = $this->pdo->prepare("DELETE FROM carrito");
            $consulta->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertarPedidoDesdeCarrito() {
        try {
            $items = $this->listarCarrito();
            foreach ($items as $item) {
                $consulta = "INSERT INTO pedidos (producto, cantidad, precio, total) VALUES (?, ?, ?, ?);";
                $this->pdo->prepare($consulta)
                    ->execute([$item->producto, $item->cantidad, $item->precio, $item->total]);
            }
            $this->vaciarCarrito();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM pedidos");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
