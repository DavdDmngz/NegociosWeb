<?php
require_once 'modelos/pedido.modelo.php';

class PedidoControlador {
    private $modeloPedido;

    public function __CONSTRUCT() {
        $this->modeloPedido = new Pedido();
    }

    public function Inicio() {
        // Obtener los pedidos desde el modelo
        $pedidos = $this->modeloPedido->Listar();

        // Incluir la vista y pasar los datos
        require_once "vistas/header.php";
        require_once "vistas/menu.php";
        require_once "vistas/style.php";

        // Aquí se pasa la variable $pedidos a la vista
        require_once "vistas/pedido/index.php"; 

        require_once "vistas/scripts.php";
    }
}
?>
