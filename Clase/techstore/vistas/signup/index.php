<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <form class="card" action="index.php?c=signup&a=registrarUsuario" method="post">
                        <h5 class="card-title fw-400">Sign Up</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" required>
                            </div>
                            <button type="submit" class="btn btn-block btn-bold btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
