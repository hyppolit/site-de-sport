function ajouter(produit_id) {
    fetch("ajouter_panier.php?id=" + produit_id)
        .then(r => r.text())
        .then(msg => alert(msg));
}

