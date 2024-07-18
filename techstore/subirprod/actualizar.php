<?php
require 'config/database.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'description' => $description, 'price' => $price, 'id' => $id]);

    header('Location: index.php');
} else {
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $product = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="update.php?id=<?= $id ?>" method="post">
        <label for="name">Nombre del Producto:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required><?= htmlspecialchars($product['description']) ?></textarea><br>
        <label for="price">Precio:</label>
        <input type="number" step="0.01" name="price" id="price" value="<?= htmlspecialchars($product['price']) ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
