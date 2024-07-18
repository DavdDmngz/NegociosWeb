<?php

class Usuario{

    private $pdo;

    private $user_id;
    private $email;
    private $password;

    public function __CONSTRUCT(){
        $this->pdo = BaseDatos::conectar();
    }

    public function getusr_id() : ?int{
        return $this->user_id;
    }

    public function setusr_id(int $id){
        $this->user_id=$id;
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

    public function setusr_pass(string $password){
        $this->user_pass=$password;
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

public function TotalUsuarios(){
    try{
        $consulta = $this->pdo->prepare("SELECT * FROM techstore.usuarios");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch(Exception $e) {
        die($e->getMessage());
    }
}

}