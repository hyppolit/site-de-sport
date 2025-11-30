<?php
session_start();

// Détruire toutes les sessions
session_unset();
session_destroy();

// Redirection vers la page d'accueil
header("Location: main.html");
exit;
?>
