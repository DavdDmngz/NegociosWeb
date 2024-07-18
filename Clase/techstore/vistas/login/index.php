<!DOCTYPE html>
<html lang="en">
<body>
    <div class="back">
        <div class="div-center">
            <div class="content">
                <h3>Login</h3>
                <hr />
                <form action="login.php" method="post"> <!-- Ajusta el action al archivo donde manejas el login -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <hr />
                    <a href="vistas/signup/index.php" class="btn btn-link">Signup</a> <!-- Enlace directo a la carpeta de vistas/signup/index.php -->
                    <button type="button" class="btn btn-link">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
