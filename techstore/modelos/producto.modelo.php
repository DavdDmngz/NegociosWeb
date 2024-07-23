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

    public function getpro_nom() : ?string{
        return $this->nombre;
    }

    public function setpro_nom(string $nombre){
        $this->nombre=$nombre;
    }

    public function getpro_desc() : ?string{
        return $this->descripcion;
    }

    public function setpro_desc(string $descripcion){
        $this->descripcion=$descripcion;
    }

    public function getpro_tipo() : ?int{
        return $this->tipo_producto;
    }

    public function setpro_tipo(int $tipo_producto){
        $this->tipo_producto=$tipo_producto;
    }

    public function getpro_pre_c() : ?float{
        return $this->precio_compra;
    }

    public function setpro_pre_c(float $precio_compra){
        $this->precio_compra=$precio_compra;
    }

    public function getpro_pre_v() : ?float{
        return $this->precio_venta;
    }

    public function setpro_pre_v(float $precio_venta){
        $this->precio_venta=$precio_venta;
    }

    public function getpro_mar() : ?string{
        return $this->marca;
    }

    public function setpro_mar(string $marca){
        $this->marca=$marca;
    }

    public function getpro_cant() : ?int{
        return $this->cantidad;
    }

    public function setpro_cant(int $cantidad){
        $this->cantidad=$cantidad;
    }

    public function getpro_img() : ?string{
        return $this->imagen;
    }

    public function setpro_img(string $imagen){
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

public function Insertar(Producto $prod){
    try{
        $consulta="INSERT INTO productos (nombre, descripcion, tipo_producto, precio_compra, precio_venta, marca, cantidad, imagen) VALUES (?,?,?,?,?,?,?,?,?);";
        $this->pdo->prepare($consulta)
                ->execute(array(
                    $prod->getprod_nombre(),
                    $prod->getprod_descripcion(),
                    $prod->getprod_tipo_producto(),
                    $prod->getprod_precio_compra(),
                    $prod->getprod_precio_venta(),
                    $prod->getprod_marca(),
                    $prod->getprod_cantidad(),
                    $prod->getprod_imagen(),
                    
                ));
    } catch(Exception $e) {
        die($e->getMessage());
    }
}

// EDITAR PRODUCTO

public function obtenerProductoPorId($id) {
    $sentencia = $this->db->prepare("SELECT * FROM productos WHERE id = ?;");
    $sentencia->execute([$id]);
    return $sentencia->fetch(PDO::FETCH_OBJ);
}

public function actualizarProducto($id, $nombre, $precio, $descripcion) {
    $sentencia = $this->db->prepare("UPDATE productos SET nombre = ?, descripcion = ?, tipo_producto = ?, precio_compra = ?, precio_venta = ?, marca = ?, cantidad = ?, imagen = ? WHERE id = ?;");
    return $sentencia->execute([$nombre, $precio, $descripcion, $id]);
}

// ELIMINAR PRODUCTO
public function eliminarProducto($id) {
    $sentencia = $this->db->prepare("DELETE FROM productos WHERE id = ?;");
    return $sentencia->execute([$id]);
}

}
?>