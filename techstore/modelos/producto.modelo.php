<?php

class Producto{

    private $pdo;

    private $id;
    private $nombre;
    private $descripcion;
    private $categoria;
    private $precio;
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

    public function getpro_categoria() : ?int{
        return $this->id_categoria;
    }

    public function setpro_categoria(int $id_categoria){
        $this->categoria=$id_categoria;
    }

    public function getpro_precio() : ?float{
        return $this->precio;
    }

    public function setpro_precio(float $precio){
        $this->precio=$precio;
    }

    public function getpro_cant() : ?int{
        return $this->cantidad;
    }

    public function setpro_cant(int $cantidad){
        $this->cantidad=$cantidad;
    }

    public function getpro_img() : ?int{
        return $this->imagen;
    }

    public function setpro_img(int $imagen){
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
        $consulta="INSERT INTO productos (nombre, descripcion, id_categoria, precio, cantidad, imagen) VALUES (?,?,?,?,?,?);";
        $this->pdo->prepare($consulta)
                ->execute(array(
                    $producto->getpro_nom(),
                    $producto->getpro_desc(),
                    $producto->getpro_categoria(),
                    $producto->getpro_precio(),
                    $producto->getpro_cant(),
                    $producto->getpro_img(),
                ));
    } catch(Exception $e) {
        die($e->getMessage());
    }
}
}