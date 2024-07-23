<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="public/css/login.css" rel="stylesheet">
</head>
<body>
    <div class="back">
        <div class="div-center">
            <div class="content">
                <h3>Iniciar sesión</h3>
                <hr />
                <form method="GET" action="?c=usuario&a=trylogin" class="formulario" id="formulario">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    <hr />
                    <a href="?c=usuario&a=signup" class="btn btn-link">Crear cuenta</a>
                    <button type="button" class="btn btn-link">Olvide mi contraseña</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
