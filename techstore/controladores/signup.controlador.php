<?php

require_once 'modelo.usuario.php'; // Incluir el modelo de Usuario

class ControladorSignup {
    private $modelo;

    public function __construct($db){
        $this->modelo = new Usuario($db); // Crear una instancia del modelo Usuario
    }

    public function mostrarFormulario(){
        // Ruta a la vista del formulario de signup
        $rutaVista = 'vistas/signup/index.php';
        
        // Verificar si el archivo de la vista existe antes de incluirlo
        if (file_exists($rutaVista)) {
            require_once $rutaVista;
        } else {
            echo "Error: La vista no pudo ser encontrada.";
        }
    }

    public function registrarUsuario(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Verificar que las contraseñas coincidan
            if ($password !== $confirm_password) {
                echo "Las contraseñas no coinciden.";
                return;
            }
    
            // Llamar al método del modelo para registrar el usuario
            if ($this->modelo->registrarUsuario($email, $password)) {
                // Usuario registrado correctamente, redireccionar a otra página
                header('Location: signup_success.php');
                exit; // Asegurar que se detiene la ejecución después de la redirección
            } else {
                echo "Error al registrar usuario.";
            }
        }
    }
}

?>
