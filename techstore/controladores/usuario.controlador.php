<?php
require_once "modelos/usuario.modelo.php";
require_once "helpers/session.php";

class UsuarioControlador {
    private $modelo;

    public function __CONSTRUCT() {
        $this->modelo = new Usuario();
    }

    public function Inicio() {      
        require_once "vistas/style.php";
<<<<<<< Updated upstream
        require_once "vistas/sidebar.vertical.php";
        require_once "vistas/usuario/index.php";
=======
        if (Session::isLoggedIn()) {
            if (Session::isAdmin()) {
                require_once "vistas/sidebar.vertical.php";
                require_once "vistas/usuario/index.php"; // Vista para administrador
            } else {
                require_once "vistas/header.session.php";
                require_once "vistas/menu.php";
                require_once "vistas/inicio/principal.php"; // Vista para usuarios regulares
            }
        } else {
            require_once "vistas/header.php";
            require_once "vistas/menu.php";
            require_once "vistas/inicio/principal.php"; // Vista para usuarios regulares
        }
>>>>>>> Stashed changes
        require_once "vistas/foother.php";
        require_once "vistas/scripts.php";
    }

    public function Login() {
        require_once "vistas/style.php";
        require_once "vistas/usuario/inicio.sesion.php";
        require_once "vistas/scripts.php";
    }

    public function Signup() {
        require_once "vistas/style.php";
        require_once "vistas/usuario/registro.php";
        require_once "vistas/scripts.php";
    }

<<<<<<< Updated upstream

    public function Crear() {
        $user = new Usuario();
        $user->setusr_nombre($_POST['nombre']);
        $user->setusr_email($_POST['email']);
        $user->setusr_pass($_POST['contrasena']);
        $user->setusr_rol(3); // Asignar rol por defecto, cambiar según sea necesario
    
        if ($this->modelo->EmailExiste($user->getusr_email())) {
            header("location:?c=usuario&a=signup&error=email_exists");
        } else {
            $this->modelo->Insertar($user);
            header("location:?c=usuario&a=inicio");
        }
    }
    

=======
>>>>>>> Stashed changes
    public function TryLogin() {
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];

        $user = $this->modelo->Login($email, $contrasena);

        if ($user) {
            Session::set('user_id', $user->id);
            Session::set('rol', $user->rol);
            header("location:?c=usuario&a=inicio");
        } else {
            header("location:?c=usuario&a=login&error=1");
        }
    }

    public function Logout() {
        Session::destroy();
        header("location:?c=usuario&a=inicio");
    }

    public function Nuevousuario() {
        $user = new Usuario();
        $user->setusr_nombre($_POST['nombre']);
        $user->setusr_apellido($_POST['apellido']);
        $user->setusr_email($_POST['email']);
        $user->setusr_pass($_POST['contrasena']);
        $user->setusr_rol(3); // Asignar rol por defecto, cambiar según sea necesario
    
        if ($this->modelo->EmailExiste($user->getusr_email())) {
            header("location:?c=usuario&a=signup&error=email_exists");
        } else {
            $this->modelo->Insertar($user);
            header("location:?c=usuario&a=inicio");
        }
    }
}
?>

