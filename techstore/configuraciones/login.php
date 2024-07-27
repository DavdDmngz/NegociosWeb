<?php
// Definir las variables de conexión como constantes
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_NAME', 'techstore');
define('DB_USER', 'root');
define('DB_PASS', '0955');
define('DB_CHARSET', 'utf8');

$email = $_POST['email'];
$pass = $_POST['contrasena'];
session_start();
$_SESSION['email'] = $email;

try {
    // Crear la conexión utilizando PDO
    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
    $conexion = new PDO($dsn, DB_USER, DB_PASS);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la consulta
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email AND contrasena = :contrasena");
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':contrasena', $pass);

    // Ejecutar la consulta
    $consulta->execute();
    $filas = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($filas) {
        if ($filas['id'] == 1) {
            header("Location: vistas/admin/index.php");
        } else if ($filas['id'] == 2) {
            header("Location: vistas/inicio/index.php");
        }
    } else {
        include("index.php");
        echo '<h1 class="bad">ERROR</h1>';
    }

    // Liberar el resultado
    $consulta->closeCursor();

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

// Cerrar la conexión
$conexion = null;
?>
