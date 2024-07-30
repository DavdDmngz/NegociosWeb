<?php
// Asumimos que $productosCarrito es una lista de productos con cantidades
$productosCarrito = $this->modeloCarrito->listar(); 
$productos = [];
foreach ($productosCarrito as $id => $cantidad) {
    $producto = $this->modeloProducto->obtenerPorId($id);
    $producto->cantidad = $cantidad;
    $productos[] = $producto;
}
?>

<div class="main-content-inner">
    <div class="card-area">
        <div class="row">
        <?php foreach ($productos as $producto): ?>
            <?php $imagenRuta = $producto->getpro_imagen() ?>
            <div class="col-lg-4 col-md-6 mt-5">
                <div class="card card-bordered">
                    <img class="card-img-top img-fluid" src="<?=$imagenRuta?>" alt="<?=$imagenRuta?>">
                    <div class="card-body">
                        <h5 class="title"><?=$producto->getpro_nom()?></h5>
                        <p class="card-text"><?=$producto->getpro_desc()?></p>
                        <p class="card-price">$<?=$producto->getpro_precio()?></p>
                        <p class="card-quantity">Cantidad: <?=$producto->cantidad?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
