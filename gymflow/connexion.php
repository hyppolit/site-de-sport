<?php
session_start();
$conn = new mysqli("localhost","root","","gymflow");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    $sql = "SELECT * FROM utilisateurs WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();

    if ($res && password_verify($motdepasse, $res['motdepasse'])) {
        $_SESSION['id'] = $res['id'];
        $_SESSION['nom'] = $res['nom'];
        header("Location: produits.php");
        exit;
    } else {
        $erreur = "Email ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
<h2>Connexion</h2>
<?php if(isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>
<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="motdepasse" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>
</body>
</html>


