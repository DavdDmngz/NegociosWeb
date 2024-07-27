<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="header-title">Pedidos</h4>
                    </div>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Pedido Id</th>
                                    <th>Producto</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Detalles</th> <!-- Nueva columna para el botón -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($pedidos) && is_array($pedidos)): ?>
                                <?php foreach ($pedidos as $r): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($r->pedido_id) ?></td>
                                        <td><?= htmlspecialchars($r->producto) ?></td>
                                        <td><?= htmlspecialchars($r->nombre) ?></td>
                                        <td><?= htmlspecialchars($r->id_categoria) ?></td>
                                        <td><?= htmlspecialchars($r->precio) ?></td>
                                        <td><?= htmlspecialchars($r->cantidad) ?></td>
                                        <td><?= htmlspecialchars($r->total) ?></td>
                                        <td>
                                            <!-- Botón para ver los detalles del pedido -->
                                            <a href="detalle_pedido.php?pedido_id=<?= htmlspecialchars($r->pedido_id) ?>" class="btn btn-info">Ver Detalles</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">No se encontraron pedidos.</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
