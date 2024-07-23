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

    public function getpro_mar() : ?int{
        return $this->marca;
    }

    public function setpro_mar(int $marca){
        $this->marca=$marca;
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

public function Insertar(Usuario $user){
    try{
        $consulta="INSERT INTO usuarios (nombre, apellido, email, contrasena, rol) VALUES (?,?,?,?);";
        $this->pdo->prepare($consulta)
                ->execute(array(
                    $user->getusr_nombre(),
                    $user->getusr_apellido(),
                    $user->getusr_email(),
                    $user->getusr_pass(),
                ));
    } catch(Exception $e) {
        die($e->getMessage());
    }
}
}