<?php

require_once "modelos/factura.modelo.php";

class FacturaControlador {
    private $modelo;

    public function __CONSTRUCT() {
        $this->modelo = new Factura();
    }

    public function Inicio() {
        require_once "vistas/encabezado.php";
        require_once "vistas/factura/index.php";
        require_once "vistas/scripts.php";
    }

    public function Crear() {
        require_once "vistas/encabezado.php";
        require_once "vistas/factura/crear.php";
        require_once "vistas/scripts.php";
    }

    public function Guardar() {
        $factura = new Factura();
        $factura->setUsuarioId($_POST['usuario_id']);
        $factura->setFecha($_POST['fecha']);
        $factura->setTotal($_POST['total']);
        $factura->setMetodoPago($_POST['metodo_pago']);

        $this->modelo->Insertar($factura);

        header("location:?c=factura&a=inicio");
    }

    public function Mostrar() {
        $facturas = $this->modelo->Listar();
        require_once "vistas/encabezado.php";
        require_once "vistas/factura/lista.php";
        require_once "vistas/scripts.php";
    }

    public function Detalle() {
        $factura = $this->modelo->ObtenerPorId($_GET['id']);
        require_once "vistas/encabezado.php";
        require_once "vistas/factura/detalle.php";
        require_once "vistas/scripts.php";
    }
}
?>
