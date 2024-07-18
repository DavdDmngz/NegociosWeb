<?php
require 'config/database.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

header('Location: index.php');
?>
