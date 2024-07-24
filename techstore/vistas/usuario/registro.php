<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="public/css/login.css" rel="stylesheet">
</head>
<body>
    <div class="back">
        <div class="div-center">
            <div class="content">
                <h3>Registro</h3>
                <hr />
                <form method="POST" action="?c=usuario&a=crear" class="formulario" id="formulario">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                    <hr />
                </form>
            </div>
        </div>
    </div>
</body>
</html>
