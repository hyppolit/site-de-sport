<?php
session_start();


if (!isset($_SESSION['id'])) {
    header("Location: main.html");
    exit;
}


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
    <title>Profil - GymFlow</title>
    <link rel="stylesheet" href="styleprofil.css">
</head>
<body>

<div class="header-buttons">
    <button onclick="window.location.href='produits.php'">Produits</button>
    <button onclick="window.location.href='panier.php'">Panier</button>
    <button onclick="window.location.href='main.html'">Accueil</button>
</div>

<h1>Profil de <?= htmlspecialchars($_SESSION['nom']) ?></h1>

<h2>Mes commandes</h2>

<?php if(empty($panier)): ?>
    <p class="aucune-commande">Vous n'avez encore passé aucune commande.</p>
<?php else: ?>
    <div class="commande-container">
    <?php foreach($panier as $id_produit):
        $nom = $produits[$id_produit]['nom'] ?? "Produit inconnu";
        $prix = $produits[$id_produit]['prix'] ?? 0;
        $total += $prix;
    ?>
        <div class="commande">
            <img src="<?= $produits[$id_produit]['image'] ?? 'images/default.jpg' ?>" alt="<?= htmlspecialchars($nom) ?>">
            <h3><?= htmlspecialchars($nom) ?></h3>
            <p><?= $prix ?>€</p>
        </div>
    <?php endforeach; ?>
    </div>
    <p class="total">Total : <?= $total ?>€</p>
<?php endif; ?>


<form action="deconnexion.php" method="POST">
    <button type="submit" class="logout-btn">Déconnexion</button>
</form>

</body>
</html>

