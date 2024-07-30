<?php

class Producto {

    private $pdo;

    private $id;
    private $nombre;
    private $descripcion;
    private $id_categoria;
    private $precio;
    private $cantidad;
    private $imagen; // Añadido para la imagen

    public function __CONSTRUCT(){
        $this->pdo = BaseDatos::conectar();
    }

    public function getpro_id() : ?int{
        return $this->id;
    }

    public function setpro_id(int $id){
        $this->id = $id;
    }

    public function getpro_nom() : ?string{
        return $this->nombre;
    }

    public function setpro_nom(string $nombre){
        $this->nombre = $nombre;
    }

    public function getpro_desc() : ?string{
        return $this->descripcion;
    }

    public function setpro_desc(string $descripcion){
        $this->descripcion = $descripcion;
    }

    public function getpro_categoria() : ?int{
        return $this->id_categoria;
    }

    public function setpro_categoria(int $id_categoria){
        $this->id_categoria = $id_categoria;
    }

    public function getpro_precio() : ?float{
        return $this->precio;
    }

    public function setpro_precio(float $precio){
        $this->precio = $precio;
    }

    public function getpro_cant() : ?int{
        return $this->cantidad;
    }

    public function setpro_cant(int $cantidad){
        $this->cantidad = $cantidad;
    }

    public function getpro_imagen() : ?string {
        return $this->imagen;
    }

    public function setpro_imagen(string $imagen) {
        $this->imagen = $imagen;
    }

    public function Listar() {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM producto");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
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
                nombre = ?, descripcion = ?, id_categoria = ?, precio = ?, cantidad = ?, imagen = ?
                WHERE id = ?;";
            $this->pdo->prepare($consulta)
                ->execute([
                    $producto->getpro_nom(),
                    $producto->getpro_desc(),
                    $producto->getpro_categoria(),
                    $producto->getpro_precio(),
                    $producto->getpro_cant(),
                    $producto->getpro_imagen(), // Añadido
                    $producto->getpro_id()
                ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($id) {
        try {
            $consulta = $this->pdo->prepare("DELETE FROM productos WHERE id = ?");
            $consulta->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarInventario($producto_id, $cantidad, $tipo, $observaciones = '') {
        try {
            // Registrar movimiento
            $consultaMovimiento = "INSERT INTO movimientos (producto_id, fecha, cantidad, tipo, observaciones) VALUES (?, NOW(), ?, ?, ?);";
            $this->pdo->prepare($consultaMovimiento)
                ->execute([$producto_id, $cantidad, $tipo, $observaciones]);
    
            // Actualizar inventario
            if ($tipo === 'entrada') {
                $consultaInventario = "INSERT INTO inventario (producto_id, cantidad) VALUES (?, ?) 
                                       ON DUPLICATE KEY UPDATE cantidad = cantidad + VALUES(cantidad);";
                $this->pdo->prepare($consultaInventario)
                    ->execute([$producto_id, $cantidad]);
            } else if ($tipo === 'salida') {
                $consultaInventario = "INSERT INTO inventario (producto_id, cantidad) VALUES (?, ?) 
                                       ON DUPLICATE KEY UPDATE cantidad = cantidad - VALUES(cantidad);";
                $this->pdo->prepare($consultaInventario)
                    ->execute([$producto_id, $cantidad]);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function obtenerInventario($producto_id) {
        try {
            $consulta = $this->pdo->prepare("SELECT cantidad FROM inventario WHERE producto_id = ?");
            $consulta->execute([$producto_id]);
            $resultado = $consulta->fetch(PDO::FETCH_OBJ);
            return $resultado ? $resultado->cantidad : 0;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ProductoExiste($nombre) {
        try {
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM productos WHERE nombre = ?");
            $consulta->execute([$nombre]);
            $count = $consulta->fetchColumn();
            return $count > 0;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarMovimiento($producto_id, $cantidad, $tipo, $observaciones) {
        try {
            $this->pdo->beginTransaction();

            // Insertar el movimiento en la tabla movimientos
            $stm = $this->pdo->prepare("INSERT INTO movimientos (producto_id, cantidad, tipo, observaciones) VALUES (?, ?, ?, ?)");
            $stm->execute(array($producto_id, $cantidad, $tipo, $observaciones));

            // Calcular la cantidad a actualizar en el inventario
            $cantidadMovimiento = $tipo === 'entrada' ? $cantidad : -$cantidad;

            // Comprobar si el producto ya existe en el inventario
            $stm = $this->pdo->prepare("SELECT cantidad FROM inventario WHERE producto_id = ?");
            $stm->execute(array($producto_id));
            $inventario = $stm->fetch(PDO::FETCH_OBJ);

            if ($inventario) {
                // Si existe, actualizar la cantidad
                $stm = $this->pdo->prepare("UPDATE inventario SET cantidad = cantidad + ? WHERE producto_id = ?");
                $stm->execute(array($cantidadMovimiento, $producto_id));
            } else {
                // Si no existe, insertar un nuevo registro en el inventario
                $stm = $this->pdo->prepare("INSERT INTO inventario (producto_id, cantidad) VALUES (?, ?)");
                $stm->execute(array($producto_id, $cantidadMovimiento));
            }

            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            die($e->getMessage());
        }
    }
    
    
}
