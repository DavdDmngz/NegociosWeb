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
                                    <th>Usuario Id</th>
                                    <th>Fecha</th>
                                    <th>Detalles</th> <!-- Columna para el botón de detalles -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($pedidos) && is_array($pedidos)): ?>
                                <?php foreach ($pedidos as $r): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($r->pedido_id) ?></td>
                                        <td><?= htmlspecialchars($r->id_usuario) ?></td>
                                        <td><?= htmlspecialchars($r->fecha) ?></td>
                                        <td>
                                            <!-- Botón para ver los detalles del pedido -->
                                            <a href="detalle_pedido.php?pedido_id=<?= htmlspecialchars($r->pedido_id) ?>" class="btn btn-info">Ver Detalles</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">No se encontraron pedidos.</td>
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
