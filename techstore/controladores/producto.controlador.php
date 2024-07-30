<?php

require_once "modelos/producto.modelo.php";
require_once "modelos/categoria.modelo.php"; // Incluye el modelo de categoría

class ProductoControlador {
    private $modeloProducto;
    private $modeloCategoria;

    public function __CONSTRUCT() {
        $this->modeloProducto = new Producto();
        $this->modeloCategoria = new Categoria();
    }

    public function Inicio() {      
        require_once "vistas/style.php";
        require_once "vistas/sidebar.vertical.php";
        require_once "vistas/producto/index.php";
        require_once "vistas/foother.php";
        require_once "vistas/scripts.php";
    }

    public function Agregar() {
        $categorias = $this->modeloCategoria->Listar(); // Obtener las categorías
        require_once "vistas/style.php";
        require_once "vistas/sidebar.vertical.php";
        require_once "vistas/producto/formulario.php";
        require_once "vistas/foother.php";
        require_once "vistas/scripts.php";
    }

    public function Movimiento() {
        $productos = $this->modeloProducto->Listar();
        require_once 'vistas/style.php';
        require_once 'vistas/producto/movimiento.php';
        require_once 'vistas/scripts.php';
    }

    public function Catalogo() {
        $categorias = $this->modeloCategoria->Listar(); // Obtener las categorías
        require_once "vistas/style.php";
        require_once "vistas/menu.php";
        require_once "vistas/producto/catalogo.php";
        require_once "vistas/foother.php";
        require_once "vistas/scripts.php";
    }

    public function Guardar() {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $id_categoria = $_POST['id_categoria'];
        $precio = $_POST['precio'];

        // Crear el objeto Producto
        $producto = new Producto();
        $producto->setpro_nom($nombre);
        $producto->setpro_desc($descripcion);
        $producto->setpro_categoria($id_categoria);
        $producto->setpro_precio($precio);

        // Manejo del archivo subido
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $targetDirectory = 'public/img/';
            $targetFile = $targetDirectory . basename($_FILES['imagen']['name']);
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $targetFile)) {
                $producto->setpro_imagen('img/' . basename($_FILES['imagen']['name']));
            }
        }

        // Verificar si el producto ya existe
        if ($this->modeloProducto->ProductoExiste($nombre)) {
            // Redirigir con un mensaje de error
            header("Location:?c=producto&a=agregar&error=product_exists");
            exit();
        }else {
            $this->modeloProducto->Insertar($producto);
            header("Location:?c=producto&a=inicio");
        }

    } 

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $id_categoria = $_POST['id_categoria'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            
            $producto = new Producto();
            $producto->setpro_id($id);
            $producto->setpro_nom($nombre);
            $producto->setpro_desc($descripcion);
            $producto->setpro_categoria($id_categoria);
            $producto->setpro_precio($precio);
            $producto->setpro_cant($cantidad);

            // Manejo del archivo subido
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = 'uploads/';
                $targetFile = $targetDirectory . basename($_FILES['imagen']['name']);
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $targetFile)) {
                    $producto->setpro_imagen($targetFile);
                }
            }

            $this->modeloProducto->actualizar($producto);
            header("location:?c=producto&a=inicio");
        }
    }

    public function RegistrarMovimiento() {
        $producto_id = $_POST['producto_id'];
        $cantidad = $_POST['cantidad'];
        $tipo = $_POST['tipo'];
        $observaciones = $_POST['observaciones'];

        $this->modeloProducto->RegistrarMovimiento($producto_id, $cantidad, $tipo, $observaciones);

        header('Location: ?c=producto&a=movimiento');
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            $this->modeloProducto->eliminar($id);
            header("location:?c=producto&a=inicio");
        }
    }


}
?>
