<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=hackers_poulette;charset=utf8', 'root', '');

        // Affichage des erreurs pour afficher les erreurs SQL
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexion à la base de données réussie";
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        echo "Connexion à la base de données échouée";
    }
?>