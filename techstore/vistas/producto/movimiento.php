<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Movimiento</title>
</head>
<body>
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Registrar Movimiento</h4>
                <p class="text-muted font-14 mb-4">Rellene todos los campos del formulario</p>

                <!-- Mostrar mensaje de error si existe -->
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger">
                        <?php
                        if ($_GET['error'] == 'no_stock') {
                            echo "Error: No hay suficientes existencias para completar esta operación.";
                        } else if ($_GET['error'] == 'no_product') {
                            echo "Error: El producto no existe en el inventario.";
                        }
                        ?>
                    </div>
                <?php endif; ?>

                <form action="?c=producto&a=RegistrarMovimiento" method="post">
                    <div class="form-group">
                        <label for="producto_id">Producto:</label>
                        <select class="form-control" id="producto_id" name="producto_id" required>
                            <?php foreach ($productos as $producto): ?>
                                <option value="<?= htmlspecialchars($producto->id) ?>"><?= htmlspecialchars($producto->nombre) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo de Movimiento:</label>
                        <select class="form-control" id="tipo" name="tipo" required>
                            <option value="entrada">Entrada</option>
                            <option value="salida">Salida</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="observaciones">Observaciones:</label>
                        <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar Movimiento</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
