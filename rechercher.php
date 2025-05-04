<?php
include 'db.php';

$resultat = null;
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['produit']);

    if (!empty($nom)) {
        $stmt = $conn->prepare("SELECT * FROM produits WHERE nom = ?");
        $stmt->bind_param("s", $nom);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultat = $result->fetch_assoc();

        if (!$resultat) {
            $message = "Produit non trouvé.";
        }

        $stmt->close();
    } else {
        $message = "Veuillez saisir un nom de produit.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Recherche Produit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="mb-4"> Rechercher un produit</h2>

  <form method="post" class="row g-3">
    <div class="col-md-6">
      <input type="text" name="produit" class="form-control" placeholder="Nom du produit" required>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>
  </form>

  <?php if ($message): ?>
    <div class="alert alert-warning mt-4"><?= htmlspecialchars($message) ?></div>
  <?php endif; ?>

  <?php if ($resultat): ?>
    <div class="card mt-4">
      <div class="card-header bg-success text-white">Informations du produit</div>
      <div class="card-body">
        <p><strong>Nom :</strong> <?= htmlspecialchars($resultat['nom']) ?></p>
        <p><strong>Quantité :</strong> <?= htmlspecialchars($resultat['quantite']) ?></p>
        <p><strong>Prix :</strong> <?= htmlspecialchars($resultat['prix']) ?> €</p>
    </div>
  <?php endif; ?>
</div>

</body>
</html>
