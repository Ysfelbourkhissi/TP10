<?php
require 'config.php';
require 'header.php';

$stmt = $pdo->query('SELECT * FROM produits');
?>

<h2>Liste des Produits</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nom']) ?></td>
            <td><?= $row['quantite'] ?></td>
            <td><?= $row['prix'] ?> MAD</td>
            <td>
                <a href="modifier.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                <a href="supprimer.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">Supprimer</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require 'footer.php'; ?>
