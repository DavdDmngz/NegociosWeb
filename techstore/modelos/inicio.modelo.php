<?php

    class Inicio{
        private $pdo;
        public function __CONSTRUCT() {
            $this->pdo = BaseDatos::conectar();
        }

        public function ListarProductos() {
            try {
                $consulta = $this->pdo->prepare("SELECT * FROM productos");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>