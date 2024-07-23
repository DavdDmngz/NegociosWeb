<h1>Lista de Facturas</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Total</th>
        <th>Metodo pago</th>
    </tr>
    <?php foreach($facturas as $factura): ?>
    <tr>
        <td><?php echo $factura->id; ?></td>
        <td><?php echo $factura->fecha; ?></td>
        <td><?php echo $factura->total; ?></td>
        <td><?php echo $factura->metodo_pago; ?></td>
        <td>
            <a href="?c=factura&a=detalle&id=<?php echo $factura->id; ?>">Ver Detalles</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
