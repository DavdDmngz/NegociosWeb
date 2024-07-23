<?php

class Factura {

    private $pdo;

    private $id;
    private $usuario_id;
    private $fecha;
    private $total;
    private $metodo_pago;

    public function __CONSTRUCT(){
        $this->pdo = BaseDatos::conectar();
    }

    public function getId() : ?int {
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getUsuarioId() : ?int {
        return $this->usuario_id;
    }

    public function setUsuarioId(int $usuario_id){
        $this->usuario_id = $usuario_id;
    }

    public function getFecha() : ?string {
        return $this->fecha;
    }

    public function setFecha(string $fecha){
        $this->fecha = $fecha;
    }

    public function getTotal() : ?float {
        return $this->total;
    }

    public function setTotal(float $total){
        $this->total = $total;
    }

    public function getMetodoPago() : ?string {
        return $this->metodo_pago;
    }

    public function setMetodoPago(string $metodo_pago){
        $this->metodo_pago = $metodo_pago;
    }

    public function Listar() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM facturas");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Insertar(Factura $factura) {
        try {
            $consulta = "INSERT INTO facturas (usuario_id, fecha, total, metodo_pago) VALUES (?, ?, ?, ?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $factura->getUsuarioId(),
                        $factura->getFecha(),
                        $factura->getTotal(),
                        $factura->getMetodoPago()
                    ));
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerPorId($id) {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM facturas WHERE id = ?");
            $consulta->execute(array($id));
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
