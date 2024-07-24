<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <button class="btn btn-primary" type="button">Botón</button>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->modelo->Listar() as $r): ?>
                        <tr>
                            <td><?=$r->id?></td>
                            <td><?=$r->nombre?></td>
                            <td><?=$r->descripcion?></td>
                            <td><?=$r->tipo_producto?></td>
                            <td><?=$r->precio_compra?></td>
                            <td><?=$r->precio_venta?></td>
                            <td><?=$r->marca?></td>
                            <td><?=$r->cantidad?></td>
                            <td><?=$r->imagen?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- INSERTAR PROD-->
<div class="col-xs-12">
	<h3>Nuevo producto</h3>
    <form method="POST" action="?c=producto&a=crear" class="formulario" id="formulario">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripción" required>
        </div>
        <div class="form-group">
            <label for="tipo_producto">Tipo</label>
            <input type="text" class="form-control" name="tipo_producto" placeholder="Tipo" required>
        </div>
        <div class="form-group">
            <label for="precio_venta">Precio venta</label>
            <input type="text" class="form-control" name="precio_venta" placeholder="Precio venta" required>
        </div>
        <div class="form-group">
            <label for="precio_compra">Precio compra</label>
            <input type="text" class="form-control" name="precio_compra" placeholder="Precio compra" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" name="marca" placeholder="Marca" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="text" class="form-control" name="cantidad" placeholder="CAntidad" required>
        </div>
        <div>
            <label for="imagen">Imagen del Producto:</label>
            <input class="form-control" name="imagen" type="file" id="imagen">
        </div>
        <button type="submit" class="btn btn-primary">Aceptar</button>
        <hr />
    </form>
</div>


<!-- EDITAR PROD-->
<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];

include_once "database.php";
include_once "producto.modelo.php";

// Crea una instancia del modelo Producto
$productoModel = new Producto($BaseDatos);
// Obtiene los datos del producto
$producto = $productoModel->obtenerProductoPorId($id);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}  
// Si el formulario ha sido enviado, actualizar el producto
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $tipo_producto = $_POST["tipo_producto"];
    $precio_compra = $_POST["precio_compra"];
    $precio_venta = $_POST["precio_venta"];
    $marca = $_POST["marca"];
    $cantidad = $_POST["cantidad"];
    $imagen = $_POST["imagen"];

    // Validar los datos
    if(empty($nombre) || empty($descripcion) || empty($tipo_producto) || empty($precio_compra) || empty($precio_venta) || empty($marca) || empty($cantidad) || empty($imagen)){
        echo "Todos los campos son obligatorios.";
    } else {
        // Actualizar el producto en la base de datos
        $sentencia = $BaseDatos->prepare("UPDATE productos SET nombre = ?, descripcion = ?, tipo_producto = ?, precio_compra = ?, precio_venta = ?, marca = ?, cantidad = ?, imagen = ? WHERE id = ?;");
        $resultado = $sentencia->execute([$nombre, $descripcion, $tipo_producto, $precio_compra, $precio_venta, $marca, $cantidad, $imagen, $id]);
        
        if($resultado === TRUE){
            echo "¡Producto actualizado correctamente!";
            header("Location: productos.php");
            exit();
        } else {
            echo "Hubo un error al actualizar el producto.";
        }
    }
}
?> 
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	
			<label for="nombre">Nombre del producto:</label>
			<input value="<?php echo $producto->nombre ?>" class="form-control" name="nombre+" required type="text" id="nombre" placeholder="Escribe el nombre">

			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $producto->descripcion ?></textarea>
            
            <label for="tipo">Tipo de Producto:</label>
            <input value="<?php echo $producto->tipo_producto ?>" class="form-control" name="tipo" required type="text" id="tipo" placeholder="Tipo de producto">
			
            <label for="precioVenta">Precio de venta:</label>
			<input value="<?php echo $producto->precio_venta ?>" class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">

			<label for="precioCompra">Precio de compra:</label>
			<input value="<?php echo $producto->precio_compra ?>" class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra">

			<label for="marca">Marca:</label>
		    <input class="form-control" name="marca" required type="text" id="marca" placeholder="Marca del producto">

            <label for="cantidad">Cantidad:</label>
		    <input class="form-control" name="cantidad" required type="number" id="cantidad" placeholder="Cantidad del producto">

            <label for="imagen">Imagen del Producto:</label>
            <input class="form-control" name="imagen" type="file" id="imagen">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>



<!-- ELIMINAR -->

<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];

include_once "database.php";
include_once "producto.modelo.php";

// Crear una instancia del modelo Producto
$productoModel = new Producto($BaseDatos);

// Obtener los datos del producto
$producto = $productoModel->obtenerProductoPorId($id);

if($producto === FALSE){
    echo "¡No existe algún producto con ese ID!";
    exit();
}

// Si se ha confirmado la eliminación, eliminar el producto
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $resultado = $productoModel->eliminarProducto($id);
    
    if($resultado === TRUE){
        echo "¡Producto eliminado correctamente!";
        header("Location: productos.php");
        exit();
    } else {
        echo "Hubo un error al eliminar el producto.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Producto</title>
</head>
<body>
    <h1>Eliminar Producto</h1>
    <p>¿Estás seguro de que deseas eliminar el producto <?php echo ($producto->nombre); ?>?</p>
    <form method="post">
        <button type="submit">Sí, eliminar</button>
        <a href="productos.php">Cancelar</a>
    </form>
</body>
</html>