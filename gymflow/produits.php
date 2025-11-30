<?php
session_start();

// Exemple de produits (tu peux récupérer depuis ta base de données)
$produits = [
    1 => ['nom' => 'T-shirt GymFlow', 'prix' => 25, 'image' => 'images/tshirt.jpg'],
    2 => ['nom' => 'Short de sport', 'prix' => 30, 'image' => 'images/short.jpg'],
    3 => ['nom' => 'Chaussures de sport', 'prix' => 60, 'image' => 'images/chaussures.jpg'],
    4 => ['nom' => 'Haltères 10kg', 'prix' => 30, 'image' => 'images/halteres.jpg'],
    5 => ['nom' => 'Tapis de sport', 'prix' => 15, 'image' => 'images/tapis.jpg'],
    6 => ['nom' => 'Gants de muscu', 'prix' => 12, 'image' => 'images/gants.jpg'],
];

// Initialiser le panier si nécessaire
if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = [];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Produits GymFlow</title>
<link rel="stylesheet" href="stylep.css">
</head>
<body>

<!-- Boutons en haut à droite -->
<div class="header-buttons">
    <?php if(isset($_SESSION['id'])): ?>
        <button onclick="window.location.href='profil.php'">Profil</button>
    <?php endif; ?>
    <button onclick="window.location.href='connexion.php'">Connexion</button>
    <button onclick="window.location.href='panier.php'">Panier</button>
    <button onclick="window.location.href='main.html'">Accueil</button>
</div>

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

</body>
</html>

