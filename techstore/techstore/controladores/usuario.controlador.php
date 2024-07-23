<?php

require_once "modelos/usuario.modelo.php";

class UsuarioControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Usuario();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/cuenta/index.php";
        require_once "vistas/scripts.php";
    }
    public function Login(){
        require_once "vistas/encabezado.php";
        require_once "vistas/cuenta/inicio.sesion.php";
        require_once "vistas/scripts.php";
    }
    
    public function Signup(){
        require_once "vistas/encabezado.php";
        require_once "vistas/cuenta/registro.php";
        require_once "vistas/scripts.php";
    }
    public function Prueba(){
        require_once "vistas/cuenta/dot.html";
    }

    public function Crear(){
        $user=new Usuario();
        $user->setusr_nombre($_POST['nombre']);
        $user->setusr_apellido($_POST['apellido']);
        $user->setusr_email($_POST['email']);
        $user->setusr_pass($_POST['contrasena']);

        $this->modelo->Insertar($user);

        header("location:?c=usuario&a=inicio");
    }
}