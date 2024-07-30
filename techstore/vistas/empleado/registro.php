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
                <h4 class="header-title">Añadir producto</h4>
                <p class="text-muted font-14 mb-4">Rellene todos los campos del formulario</p>
                <?php if (isset($_GET['error']) && $_GET['error'] == 'email_exists'): ?>
                        <div class="alert alert-danger">
                            Ya existe una cuenta con ese correo electrónico.
                        </div>
                    <?php endif; ?>
                <form action="?c=producto&a=guardar" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre" class="col-form-label">Nombre</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">email</label>
                        <input class="form-control" type="text" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Categoría</label>
                        <select class="custom-select" name="id_categoria" required>
                            <?php
                            foreach ($categorias as $categoria) {
                                echo '<option value="' . $categoria->id . '">' . $categoria->descripcion . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Precio</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control" name="precio" aria-label="Amount (to the nearest dollar)" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Imagen</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="imagen" required>
                                <label class="custom-file-label" for="inputGroupFile01"></label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Añadir Producto</button>
                </form>
            </div>
        </div>
    </div>
    <script></script>
</body>
</html>
