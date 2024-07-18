<?php
require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, description, price) VALUES (:name, :description, :price)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'description' => $description, 'price' => $price]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>Crear Producto</h1>
    <form action="create.php" method="post">
        <label for="name">Nombre del Producto:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required></textarea><br>
        <label for="price">Precio:</label>
        <input type="number" step="0.01" name="price" id="price" required><br>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
