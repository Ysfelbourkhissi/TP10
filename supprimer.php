<?php
require 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM produits WHERE id = ?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php");
?>
