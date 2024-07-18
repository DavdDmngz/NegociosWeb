<?php
require 'config/database.php';

$sql = 'SELECT * FROM products';
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Productos Tecnológicos</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>Tienda de Productos Tecnológicos</h1>
    <a href="create.php">Crear Producto</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= escape($product['id']) ?></td>
                    <td><?= escape($product['name']) ?></td>
                    <td><?= escape($product['description']) ?></td>
                    <td><?= escape($product['price']) ?></td>
                    <td>
                        <a href="update.php?id=<?= $product['id'] ?>">Editar</a>
                        <a href="delete.php?id=<?= $product['id'] ?>" onclick="return confirm('¿Está seguro de que desea eliminar este producto?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html
