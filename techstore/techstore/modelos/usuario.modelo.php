<?php

class Usuario{

    private $pdo;

    private $user_id;
    private $nombre;
    private $apellido;
    private $email;
    private $contrasena;
    private $rol;

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
        return $this->nombre;
    }

    public function setusr_nombre(string $nombre){
        $this->nombre=$nombre;
    }

    public function getusr_apellido() : ?string{
        return $this->apellido;
    }

    public function setusr_apellido(string $apellido){
        $this->apellido=$apellido;
    }

    public function getusr_email() : ?string{
        return $this->email;
    }

    public function setusr_email(string $email){
        $this->email=$email;
    }

    public function getusr_pass() : ?string{
        return $this->contrasena;
    }

    public function setusr_pass(string $contrasena){
        $this->contrasena=$contrasena;
    }

    public function getusr_rol() : ?int{
        return $this->rol;
    }

    public function setusr_rol(int $rol){
        $this->rol=$rol;
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

public function Validar(Usuario $user){
    try{
        $consulta="SELECT COUNT(*) FROM usuarios WHERE email = :email AND contrasena = :contrasena LIMIT 1";
        $this->pdo->prepare($consulta)
                ->execute(array(
                    $user->getusr_email(),
                    $user->getusr_pass(),
                ));
    } catch(Exception $e) {
        die($e->getMessage());
    }
}
}