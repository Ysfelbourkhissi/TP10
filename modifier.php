<?php
require 'config.php';
require 'header.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
$stmt->execute([$id]);
$produit = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];

    $sql = "UPDATE produits SET nom = ?, quantite = ?, prix = ? WHERE id = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$nom, $quantite, $prix, $id]);
    header("Location: index.php");
}
?>

<h2>Modifier le Produit</h2>
<form method="post">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom du produit</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($produit['nom']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité</label>
        <input type="number" class="form-control" id="quantite" name="quantite" value="<?= $produit['quantite'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix (MAD)</label>
        <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="<?= $produit['prix'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>

<?php require 'footer.php'; ?>
