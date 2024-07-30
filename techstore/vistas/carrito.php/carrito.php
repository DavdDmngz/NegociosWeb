<!-- vistas/carrito/ver_carrito.php -->
<h1>Carrito de Compras</h1>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($carrito as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item->producto); ?></td>
                <td><?php echo htmlspecialchars($item->cantidad); ?></td>
                <td><?php echo htmlspecialchars($item->precio); ?></td>
                <td><?php echo htmlspecialchars($item->total); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form method="post" action="ruta_para_realizar_pedido">
    <button type="submit">Realizar Pedido</button>
</form>

<form method="post" action="ruta_para_vaciar_carrito">
    <button type="submit">Vaciar Carrito</button>
</form>
