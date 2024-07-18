<?php
class ControladorLogin {
    private $modelo;

    public function __construct(){
        //$this->modelo = new Producto();
    }

    public function login(){
        require_once('config/basedatos.php');
        $baseDatos = new BaseDatos();
        try {
            $conexion = $baseDatos->conectar();
            echo "Conexión exitosa a la base de datos";
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        
        // Ruta a la vista de inicio de sesión
        $rutaVista = 'vistas/login/index.php';
        
        // Verificar si el archivo de la vista existe antes de incluirlo
        if (file_exists($rutaVista)) {
            require_once $rutaVista;
        } else {
            echo "Error: La vista no pudo ser encontrada.";
        }
    }
}
?>
