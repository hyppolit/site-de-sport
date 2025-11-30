<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    echo "Vous devez créer un compte ou vous connecter pour ajouter au panier.";
    exit;
}

// Vérifier si l'ID du produit est passé
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Erreur : aucun produit sélectionné.";
    exit;
}

$id = intval($_GET['id']);

// Initialiser le panier si nécessaire
if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = [];
}

// Ajouter le produit au panier (plusieurs fois possible)
$_SESSION["panier"][] = $id;

// Redirection vers le panier
header("Location: panier.php");
exit;
?>

