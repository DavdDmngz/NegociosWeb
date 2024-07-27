<?php

class Pedido {
    private $pdo;

    private $pedido_id;
    private $producto;
    private $cantidad;
    private $precio;
    private $total;

    public function __construct() {
        $this->pdo = BaseDatos::conectar();
    }

    public function getPedido_id(): ?int {
        return $this->pedido_id;
    }

    public function setPedido_id(int $id) {
        $this->pedido_id = $id;
    }

    public function getProducto(): ?string {
        return $this->producto;
    }

    public function setProducto(string $producto) {
        $this->producto = $producto;
    }

    public function getCantidad(): ?int {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getPrecio(): ?float {
        return $this->precio;
    }

    public function setPrecio(float $precio) {
        $this->precio = $precio;
    }

    public function getTotal(): ?float {
        return $this->total;
    }

    public function setTotal(float $total) {
        $this->total = $total;
    }

    public function insertar(Pedido $pedido) {
        try {
            $consulta = "INSERT INTO pedidos (producto, cantidad, precio, total) VALUES (?, ?, ?, ?);";
            $this->pdo->prepare($consulta)
                ->execute([
                    $pedido->getProducto(),
                    $pedido->getCantidad(),
                    $pedido->getPrecio(),
                    $pedido->getTotal()
                ]);
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
