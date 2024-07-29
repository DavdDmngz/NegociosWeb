<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>
</head>
<body>
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Añadir categoría</h4>
                <p class="text-muted font-14 mb-4">Rellene todos los campos del formulario</p>
                <?php if (isset($_GET['error']) && $_GET['error'] == 'category_exists'): ?>
                        <div class="alert alert-danger">
                            Ésta categoría ya existe.
                        </div>
                    <?php endif; ?>
                <form action="?c=categoria&a=guardar" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripción</label>
                        <input class="form-control" type="text" id="descripcion" name="descripcion" required>
                    </div>
                    <button class="btn btn-secondary" onclick="location.href='?c=categoria&a=inicio'">Volver</button>
                    <button type="submit" class="btn btn-primary">Añadir categoría</button>
                </form>
            </div>
        </div>
    </div>
    <script></script>
</body>
</html>
