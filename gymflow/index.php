<?php
session_start();


$produits = [
    1 => ['nom' => 'Haltères 10kg', 'prix' => 30, 'image' => 'images/halteres.jpg'],
    2 => ['nom' => 'Tapis de sport', 'prix' => 15, 'image' => 'images/tapis.jpg'],
    3 => ['nom' => 'Gants de muscu', 'prix' => 12, 'image' => 'images/gants.jpg'],
];


if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = [];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Produits GymFlow</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Nos Produits</h1>

<div class="produit-container">
    <?php foreach($produits as $id => $produit): ?>
        <div class="produit">
            <img src="<?= $produit['image'] ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
            <h3><?= htmlspecialchars($produit['nom']) ?></h3>
            <p><?= $produit['prix'] ?>€</p>
            <form action="ajouter_panier.php" method="get">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit">Ajouter au panier</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<a class="voir-panier" href="panier.php">Voir mon panier</a>

</body>
</html>


