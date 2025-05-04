<?php
require 'config.php';
require 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];

    $sql = "INSERT INTO produits (nom, quantite, prix) VALUES (?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$nom, $quantite, $prix]);
    header("Location: index.php");
}
?>

<h2>Ajouter un Produit</h2>
<form method="post">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom du produit</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité</label>
        <input type="number" class="form-control" id="quantite" name="quantite" required>
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix (dh)</label>
        <input type="number" step="" class="form-control" id="prix" name="prix" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php require 'footer.php'; ?>
