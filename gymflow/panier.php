<?php
session_start();

// Liste de produits (même que sur produits.php)
$produits = [
    1 => ['nom' => 'T-shirt GymFlow', 'prix' => 25, 'image' => 'images/tshirt.jpg'],
    2 => ['nom' => 'Short de sport', 'prix' => 30, 'image' => 'images/short.jpg'],
    3 => ['nom' => 'Chaussures de sport', 'prix' => 60, 'image' => 'images/chaussures.jpg'],
    4 => ['nom' => 'Haltères 10kg', 'prix' => 30, 'image' => 'images/halteres.jpg'],
    5 => ['nom' => 'Tapis de sport', 'prix' => 15, 'image' => 'images/tapis.jpg'],
    6 => ['nom' => 'Gants de muscu', 'prix' => 12, 'image' => 'images/gants.jpg'],
];

$panier = $_SESSION['panier'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier</title>
    <link rel="stylesheet" href="stylepanier.css">
</head>
<body>
<h2>Mon Panier</h2>

<?php if(empty($panier)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>
    <div class="panier-container">
        <?php foreach($panier as $key => $id_produit):
            $produit = $produits[$id_produit] ?? null;
            if (!$produit) continue;
            $total += $produit['prix'];
        ?>
            <div class="panier-item">
                <img src="<?= $produit['image'] ?>" alt="<?= htmlspecialchars($produit['nom']) ?>" class="panier-image">
                <div class="panier-info">
                    <span class="nom-produit"><?= htmlspecialchars($produit['nom']) ?></span>
                    <span class="prix-produit"><?= $produit['prix'] ?>€</span>
                </div>
                <form action="supprimer_panier.php" method="get">
                    <input type="hidden" name="index" value="<?= $key ?>">
                    <button class="supprimer" type="submit">Supprimer</button>
                </form>
            </div>
        <?php endforeach; ?>
        <p class="total-panier">Total : <?= $total ?>€</p>
    </div>
<?php endif; ?>

<a href="produits.php">Retour aux produits</a>
</body>
</html>


