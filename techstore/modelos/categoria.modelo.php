<?php

class Categoria{

    private $pdo;

    private $id;
    private $descripcion;

    public function __CONSTRUCT(){
        $this->pdo = BaseDatos::conectar();
    }

    public function getcat_id() : ?int{
        return $this->id;
    }

    public function setcat_id(int $id){
        $this->id=$id;
    }

    public function getcat_desc() : ?string{
        return $this->descripcion;
    }

    public function setcat_desc(string $descripcion){
        $this->descripcion=$descripcion;
    }

public function Listar(){
    try{
        $consulta = $this->pdo->prepare("SELECT * FROM techstore.categoria");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch(Exception $e) {
        die($e->getMessage());
    }
}

public function Insertar(Categoria $categoria){
    try{
        $consulta="INSERT INTO categoria (id, descripcion) VALUES (?,?);";
        $this->pdo->prepare($consulta)
                ->execute(array(
                    $categoria->getcat_id(),
                    $categoria->getcat_desc(),
                ));
    } catch(Exception $e) {
        die($e->getMessage());
    }
}
}