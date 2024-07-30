<?php

require_once "modelos/empleado.modelo.php";
require_once "helpers/session.php";

class EmpleadoControlador {
    private $modelo;

    public function __CONSTRUCT() {
        $this->modelo = new Empleado();
    }

    public function Inicio() {
        require_once "vistas/style.php";
        require_once "vistas/sidebar.vertical.php";
        require_once "vistas/empleado/index.php";
        require_once "vistas/foother.php";
        require_once "vistas/scripts.php";
    }

    public function Agregar() {
        if (Session::isLoggedIn()) {
            if (Session::isAdmin()) {
                require_once "vistas/style.php";
                require_once "vistas/sidebar.vertical.php";
                require_once "vistas/empleado/registro.php";
                require_once "vistas/scripts.php";
            } else {
                header("location:?c=empleado&a=inicio&error=no_access");
            }
        } else {
            header("location:?c=empleado&a=inicio&error=no_access");
        }
    }
    
    public function Crear() {
        $user = new Usuario();
        $user->setusr_nombre($_POST['nombre']);
        $user->setusr_apellido($_POST['apellido']);
        $user->setusr_email($_POST['email']);
        $user->setusr_pass($_POST['contrasena']);
        $user->setusr_rol(2); // Asignar rol por defecto, cambiar según sea necesario
    
        if ($this->modelo->EmailExiste($user->getusr_email())) {
            header("location:?c=usuario&a=signup&error=email_exists");
        } else {
            $this->modelo->Insertar($user);
            header("location:?c=usuario&a=inicio");
        }
    }
}
?>
