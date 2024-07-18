<?php
class BaseDatos {
    private $host;
    private $db;      //nombre de la base de datos
    private $usuario;
    private $contrasena;
    private $caracteres; //tipo de codificacion que se va a utilizar

    public function __construct(){
        $this->host= 'localhost';
        $this->db= 'techstore';
        $this->usuario= 'root';
        $this->contrasena= '0955';
        $this->caracteres= 'utf8';       //codificacion para incluir teclas especiales, como el acento
    }
    function conectar(){
        try{
            $conexion = 'mysql:host=' . $this->host . ";port=3306;dbname=". $this->db . "" . ";charset=" .
            $this->caracteres;
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,   //PDO es una interfaz de datos de php, puede conectarse con difernetes tipos de base de datos
                PDO::ATTR_EMULATE_PREPARES => FALSE,
            ];
            $pdo = new PDO($conexion, $this->usuario,
            $this->contrasena, $opciones); 
            return $pdo;
        }catch (PDOException $e){
            print_r('Error de conexion: ' . $e->getMessage());
        }
    }
}
?>