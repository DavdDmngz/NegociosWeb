<?php

require_once "modelos/usuario.modelo.php";
require_once "modelos/producto.modelo.php"; // Asegúrate de incluir el modelo de productos
require_once "helpers/session.php";

class InicioControlador {
    private $modelo;
    private $modeloProducto;

    public function __CONSTRUCT() {
        $this->modelo = new Usuario();
        $this->modeloProducto = new Producto();
    }

    public function Inicio() {
        if (Session::isLoggedIn()) {
            if (Session::isAdmin()) {
                header("location:?c=admin&a=inicio");
            } else {
                $productos = $this->modeloProducto->Listar();
                require_once "vistas/style.php";
                require_once "vistas/header.session.php";
                require_once "vistas/menu.php";
                require_once "vistas/inicio/tienda.php"; // Asegúrate de que la vista reciba los productos
                require_once "vistas/foother.php";
                require_once "vistas/scripts.php";
            }
        } else {
            // Redirige al login si no está autenticado
            require_once "vistas/style.php";
            require_once "vistas/header.php";
            require_once "vistas/menu.php";
            require_once "vistas/inicio/index.php"; // Asegúrate de que la vista reciba los productos
            require_once "vistas/foother.php";
            require_once "vistas/scripts.php";
        }
    }

    public function TryLogin() {
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];

        $user = $this->modelo->Login($email, $contrasena);

        if ($user) {
            Session::set('user_id', $user->id);
            Session::set('rol', $user->rol);
            // Redirige según el rol
            if ($user->rol == 1) { // Ejemplo para administrador
                header("location:?c=usuario&a=inicio");
            } else {
                header("location:?c=inicio&a=inicio");
            }
        } else {
            header("location:?c=inicio&a=login&error=1");
        }
    }

    public function Logout() {
        Session::destroy();
        header("location:?c=inicio&a=inicio");
    }

    public function Signup() {
        require_once "vistas/style.php";
        require_once "vistas/usuario/registro.php";
        require_once "vistas/scripts.php";
    }

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

}
?>
