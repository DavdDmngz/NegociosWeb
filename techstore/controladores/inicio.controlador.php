<?php
    class ControladorInicio{
        private $modelo;

        public function __construct(){
            //$this->modelo=new Producto();
        }

        public function Inicio(){
            require_once('config/basedatos.php');
            $baseDatos = new BaseDatos();
            try{
                $conexion = $baseDatos->conectar();
                echo "Conexión exitosa a la base de datos";
                }catch (PDOException $e){
                echo "Error de conexión: " . $e->getMessage();
                }
            require_once "vistas/inicio/principal.php";
        }
    }
?>
