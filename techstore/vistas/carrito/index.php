<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Agrega tus estilos aquí -->
</head>
<body>
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
            <?php if (isset($carrito) && is_array($carrito) && !empty($carrito)): ?>
                <?php foreach ($carrito as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item->producto_nombre) ?></td>
                        <td><?= htmlspecialchars($item->cantidad) ?></td>
                        <td><?= htmlspecialchars(number_format($item->precio, 2)) ?></td>
                        <td><?= htmlspecialchars(number_format($item->total, 2)) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">El carrito está vacío.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <form method="post" action="procesar_pedido.php">
        <button type="submit">Realizar Pedido</button>
    </form>
</body>
</html>