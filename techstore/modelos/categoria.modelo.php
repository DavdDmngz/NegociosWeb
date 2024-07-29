<?php

class Categoria {

    private $pdo;

    private $id;
    private $descripcion;

    public function __CONSTRUCT(){
        $this->pdo = BaseDatos::conectar();
    }

    public function getcat_id() : ?int {
        return $this->id;
    }

    public function setcat_id(int $id) {
        $this->id = $id;
    }

    public function getcat_des() : ?string {
        return $this->descripcion;
    }

    public function setcat_des(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function Listar() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM categoria");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Insertar(Categoria $categoria) {
        try {
            $consulta = "INSERT INTO categoria (descripcion) VALUES (?);";
            $this->pdo->prepare($consulta)
                ->execute([$categoria->getcat_des()]);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function CategoriaExiste($descripcion) {
        try {
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM categoria WHERE descripcion = ?");
            $consulta->execute([$descripcion]);
            $count = $consulta->fetchColumn();
            return $count > 0;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
