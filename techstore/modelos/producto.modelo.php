<?php

class Producto{

    private $pdo;

    private $id;
    private $nombre;
    private $descripcion;
    private $tipo_producto;
    private $precio_compra;
    private $precio_venta;
    private $marca;
    private $cantidad;
    private $imagen;

    public function __CONSTRUCT(){
        $this->pdo = BaseDatos::conectar();
    }

    public function getpro_id() : ?int{
        return $this->id;
    }

    public function setpro_id(int $id){
        $this->id=$id;
    }

    public function getpro_nombre() : ?string{
        return $this->nombre;
    }

    public function setpro_nombre(string $nombre){
        $this->nombre=$nombre;
    }

    public function getpro_descripcion() : ?string{
        return $this->descripcion;
    }

    public function setpro_descripcion(string $descripcion){
        $this->descripcion=$descripcion;
    }

    public function getpro_tipo_producto() : ?int{
        return $this->tipo_producto;
    }

    public function setpro_tipo_producto(int $tipo_producto){
        $this->tipo_producto=$tipo_producto;
    }

    public function getpro_precio_compra() : ?float{
        return $this->precio_compra;
    }

    public function setpro_precio_compra(float $precio_compra){
        $this->precio_compra=$precio_compra;
    }

    public function getpro_precio_venta() : ?float{
        return $this->precio_venta;
    }

    public function setpro_precio_venta(float $precio_venta){
        $this->precio_venta=$precio_venta;
    }

    public function getpro_marca() : ?string{
        return $this->marca;
    }

    public function setpro_marca(string $marca){
        $this->marca=$marca;
    }

    public function getpro_cantidad() : ?int{
        return $this->cantidad;
    }

    public function setpro_cantidad(int $cantidad){
        $this->cantidad=$cantidad;
    }

    public function getpro_imagen() : ?string{
        return $this->imagen;
    }

    public function setpro_imagen(string $imagen){
        $this->imagen=$imagen;
    }

public function Listar(){
    try{
        $consulta = $this->pdo->prepare("SELECT * FROM techstore.productos");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch(Exception $e) {
        die($e->getMessage());
    }
}

public function Insertar(Producto $producto){
    try{
        $consulta="INSERT INTO productos (nombre, descripcion, tipo_producto, precio_compra, precio_venta, marca, cantidad, imagen) VALUES (?,?,?,?,?,?,?,?);";
        $this->pdo->prepare($consulta)
                ->execute(array(
                    $producto->getpro_nombre(),
                    $producto->getpro_descripcion(),
                    $producto->getpro_tipo_producto(),
                    $producto->getpro_precio_compra(),
                    $producto->getpro_precio_venta(),
                    $producto->getpro_marca(),
                    $producto->getpro_cantidad(),
                    $producto->getpro_imagen(),
                    
                ));
    } catch(Exception $e) {
        die($e->getMessage());
    }
}

// EDITAR PRODUCTO

public function obtenerProductoPorId($id) {
    $sentencia = $this->pdo->prepare("SELECT * FROM productos WHERE id = ?;");
    $sentencia->execute([$id]);
    return $sentencia->fetch(PDO::FETCH_OBJ);
}

public function actualizarProducto($id, $nombre, $precio, $descripcion) {
    $sentencia = $this->pdo->prepare("UPDATE productos SET nombre = ?, descripcion = ?, tipo_producto = ?, precio_compra = ?, precio_venta = ?, marca = ?, cantidad = ?, imagen = ? WHERE id = ?;");
    return $sentencia->execute([$nombre, $precio, $descripcion, $id]);
}

// ELIMINAR PRODUCTO
public function eliminarProducto($id) {
    $sentencia = $this->pdo->prepare("DELETE FROM productos WHERE id = ?;");
    return $sentencia->execute([$id]);
}

}
?>