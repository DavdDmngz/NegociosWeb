<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="public/css/login.css" rel="stylesheet">
</head>
<body>
<!-- login area start -->
<div class="login-area login-s2">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="POST" action="?c=inicio&a=trylogin">
                <div class="login-form-head">
                    <h4>Iniciar sesión</h4>
                    <p>Accede a tu cuenta para desbloquear opciones adicionales.</p>
                    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                        <div class="alert alert-danger">Correo o contraseña incorrectos.</div>
                    <?php endif; ?>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email">
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Mantener sesión</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#">Olvidé mi contraseña</a>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Aceptar <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">¿No tienes una cuenta? <a href="?c=usuario&a=signup">Crear una cuenta.</a></p>
                        <a href="?c=inicio&a=inicio">Iniciar sesión después</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->
</body>
</html>
