<?php
session_start();


if (!isset($_SESSION['id'])) {
    echo "Vous devez créer un compte ou vous connecter pour ajouter au panier.";
    exit;
}


if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Erreur : aucun produit sélectionné.";
    exit;
}

$id = intval($_GET['id']);


if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = [];
}


$_SESSION["panier"][] = $id;


header("Location: panier.php");
exit;
?>


