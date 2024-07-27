<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="login-area login-s2">
    <div class="container">
        <div class="login-box ptb--100">
            <form id="registroForm" method="POST" action="?c=usuario&a=crear">
                <div class="login-form-head">
                    <h4>Crear cuenta</h4>
                    <p>Crea una cuenta para acceder a nuevas funciones.</p>
                </div>
                <div class="login-form-body">
                <?php if (isset($_GET['error']) && $_GET['error'] == 'email_exists'): ?>
                        <div class="alert alert-danger">
                            Ya existe una cuenta con ese correo electrónico.
                        </div>
                    <?php endif; ?>
                    <div class="form-gp">
                        <label for="nombre">Tu nombre</label>
                        <input type="text" id="nombre" name="nombre" required>
                        <i class="ti-user"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" required>
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena" required>
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="contrasena2">Confirmar contraseña</label>
                        <input type="password" id="contrasena2" name="contrasena2" required>
                        <i class="ti-lock"></i>
                        <div class="text-danger" id="contrasenaError"></div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Aceptar <i class="ti-arrow-right"></i></button>
                        <div class="login-other row mt-4">
                            <div class="col-6">
                                <a class="fb-login" href="#">Registrarse con <i class="fa fa-facebook"></i></a>
                            </div>
                            <div class="col-6">
                                <a class="google-login" href="#">Registrarse con <i class="fa fa-google"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">¿Ya tienes una cuenta? <a href="?c=usuario&a=login">Inicia sesión aquí.</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/signup.js"></script>
</body>
</html>
