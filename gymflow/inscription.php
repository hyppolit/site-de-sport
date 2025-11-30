<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gymflow";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, email, motdepasse) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nom, $email, $motdepasse);
    $stmt->execute();

    header("Location: connexion.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
<h2>Créer un compte</h2>
<form action="" method="POST">
    <input type="text" name="nom" placeholder="Nom complet" required>
    <input type="email" name="email" placeholder="Adresse email" required>
    <input type="password" name="motdepasse" placeholder="Mot de passe" required>
    <button type="submit">Créer mon compte</button>
</form>
</body>
</html>
