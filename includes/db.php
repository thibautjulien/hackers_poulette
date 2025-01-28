<?php
    require_once __DIR__ . '../../vendor/autoload.php';
    use Dotenv\Dotenv;

    // Initialiser Dotenv et charger les variables d'environnement
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    try {
        $password = $_ENV['PASSWORD_DB'] ?? '';

        $bdd = new PDO('mysql:host=localhost;dbname=hackers_poulette;charset=utf8', 'root', $password);
        // Affichage des erreurs pour afficher les erreurs SQL
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
?>