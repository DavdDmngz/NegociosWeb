<?php

class Producto {
    private $pdo;

    private $id;
    private $nombre;
    private $descripcion;
    private $id_categoria;
    private $precio;
    private $imagen;

    public function __CONSTRUCT() {
        $this->pdo = BaseDatos::conectar();
    }

    public function getpro_id() : ?int {
        return $this->id;
    }

    public function setpro_id(int $id) {
        $this->id = $id;
    }

    public function getpro_nom() : ?string {
        return $this->nombre;
    }

    public function setpro_nom(string $nombre) {
        $this->nombre = $nombre;
    }

    public function getpro_desc() : ?string {
        return $this->descripcion;
    }

    public function setpro_desc(string $descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getpro_categoria() : ?int {
        return $this->id_categoria;
    }

    public function setpro_categoria(int $id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function getpro_precio() : ?float {
        return $this->precio;
    }

    public function setpro_precio(float $precio) {
        $this->precio = $precio;
    }

    public function getpro_imagen() : ?string {
        return $this->imagen;
    }

    public function setpro_imagen(string $imagen) {
        $this->imagen = $imagen;
    }

    public function Listar() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM producto");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ); // Debería devolver un array de objetos
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
    

    public function Insertar(Producto $producto) {
        try {
            $consulta = "INSERT INTO producto (nombre, descripcion, id_categoria, precio, imagen) VALUES (?, ?, ?, ?, ?);";
            $this->pdo->prepare($consulta)
                ->execute([
                    $producto->getpro_nom(),
                    $producto->getpro_desc(),
                    $producto->getpro_categoria(),
                    $producto->getpro_precio(),
                    $producto->getpro_imagen()
                ]);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar(Producto $producto) {
        try {
            $consulta = "UPDATE producto SET 
                nombre = ?, descripcion = ?, id_categoria = ?, precio = ?, imagen = ?
                WHERE id = ?;";
            $this->pdo->prepare($consulta)
                ->execute([
                    $producto->getpro_nom(),
                    $producto->getpro_desc(),
                    $producto->getpro_categoria(),
                    $producto->getpro_precio(),
                    $producto->getpro_imagen(),
                    $producto->getpro_id()
                ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($id) {
        try {
            $consulta = $this->pdo->prepare("DELETE FROM producto WHERE id = ?");
            $consulta->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ProductoExiste($nombre) {
        try {
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM producto WHERE nombre = ?");
            $consulta->execute([$nombre]);
            $count = $consulta->fetchColumn();
            return $count > 0;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
