<?php
// Asumiendo que $detalle contiene la información del detalle obtenido
?>

<!-- Mostrar detalles -->
<h1>Detalles del Pedido</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Producto Id</th>
            <th>Descripción Producto</th>
            <th>Nombre Producto</th>
            <th>Precio Producto</th>
            <th>Categoría</th>
            <th>Cantidad</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detalle as $item): ?>
        <tr>
            <td><?php echo $item->id; ?></td>
            <td><?php echo $item->producto_id; ?></td>
            <td><?php echo $item->producto_descripcion; ?></td>
            <td><?php echo $item->producto_nombre; ?></td>
            <td><?php echo $item->producto_precio; ?></td>
            <td><?php echo $item->categoria; ?></td>
            <td><?php echo $item->cantidad; ?></td>
            <td><img src="<?php echo $item->imagen; ?>" alt="Imagen del producto"></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Enlace para regresar a la lista de pedidos -->
<a href="?c=pedido&a=inicio">Volver a la lista de pedidos</a>
