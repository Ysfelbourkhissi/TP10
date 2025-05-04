<?php
// Informations de connexion à la base de données
$host = "localhost";
$user = "root";
$password = "";
$database = "gestion_stock";

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
?>
