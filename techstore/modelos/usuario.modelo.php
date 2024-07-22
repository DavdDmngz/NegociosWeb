<?php

class Usuario{

    private $pdo;

    private $user_id;
    private $nombre;
    private $apellido;
    private $email;
    private $contrasena;

    public function __CONSTRUCT(){
        $this->pdo = BaseDatos::conectar();
    }

    public function getusr_id() : ?int{
        return $this->user_id;
    }

    public function setusr_id(int $id){
        $this->user_id=$id;
    }

    public function getusr_nombre() : ?string{
        return $this->user_nombre;
    }

    public function setusr_nombre(string $nombre){
        $this->user_nombre=$nombre;
    }

    public function getusr_apellido() : ?string{
        return $this->user_apellido;
    }

    public function setusr_apellido(string $apellido){
        $this->user_apellido=$apellido;
    }

    public function getusr_email() : ?string{
        return $this->user_email;
    }

    public function setusr_email(string $email){
        $this->user_email=$email;
    }

    public function getusr_pass() : ?string{
        return $this->user_pass;
    }

    public function setusr_pass(string $contrasena){
        $this->user_pass=$contrasena;
    }

    public function getusr_rol() : ?int{
        return $this->user_rol;
    }

    public function setusr_rol(int $rol){
        $this->user_rol=$rol;
    }

    public function Cantidad(){
    try{
        $consulta = $this->pdo->prepare("SELECT SUM(id) as CANTIDAD FROM techstore.usuarios");
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_OBJ);
    } catch(Exception $e) {
        die($e->getMessage());
    }
}

public function Listar(){
    try{
        $consulta = $this->pdo->prepare("SELECT * FROM techstore.usuarios");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch(Exception $e) {
        die($e->getMessage());
    }
}

public function Insertar(Usuario $user){
    try{
        $consulta="INSERT INTO usuarios (nombre, apellido, email, contrasena, rol) VALUES (?,?,?,?,?);";
        $this->pdo->prepare($consulta)
                ->execute(array(
                    $user->getusr_nombre(),
                    $user->getusr_apellido(),
                    $user->getusr_email(),
                    $user->getusr_pass(),
                    '3'
                ));
    } catch(Exception $e) {
        die($e->getMessage());
    }
}
}