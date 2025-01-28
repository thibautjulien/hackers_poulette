<?php

require_once 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    // Récupérer les valeurs du formulaire
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

    // Vérifier si un fichier a été téléchargé
    $filePath = null; // Initialiser filePath à null
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $filePath = 'uploads/' . basename($_FILES['file']['name']);
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            $errors['file'] = 'Erreur lors du téléchargement du fichier.';
        }
    }

    // Validation des champs
    if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email is not valid';
    }
    if (empty($name) || !preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $errors['name'] = 'Name is not valid';
    }
    if (empty($firstname) || !preg_match('/^[a-zA-Z\s]+$/', $firstname)) {
        $errors['firstname'] = 'Firstname is not valid';
    }
    if (empty($description) || !preg_match('/^[a-zA-Z\s]+$/', $description)) {
        $errors['description'] = 'Description is not valid';
    }

    // Si aucune erreur, insérer dans la base de données
    if (empty($errors)) {
        try {
            // Préparer la requête d'insertion avec PDO
            $stmt = $bdd->prepare("INSERT INTO tickets (name, firstname, email, file, description) VALUES (:name, :firstname, :email, :file, :description)");

            // Lier les paramètres
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':file', $filePath); // filePath peut être null
            $stmt->bindParam(':description', $description);

            // Exécuter la requête
            if ($stmt->execute()) {
                echo "<h2 class='title'>Données insérées avec succès.</h2>";
            } else {
                echo "<h2 class='title'>Erreur lors de l'insertion des données.</h2>";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackers Poulette</title>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
    
    <script src="./assets/js/validation.js" defer></script>
</head>

<body>

<section class="get-in-touch">
    <h1 class="title">Send a ticket</h1>

    <form id="ticketForm" action="" method="post" enctype="multipart/form-data" class="contact-form row">
        <div class="form-field col-lg-6">
            <input type="text" class="input-text js-input" id="name" name="name" required>
            <label class="label" for="name">Your name</label>
            <span class="error" id="nameError"></span>
        </div>
        <div class="form-field col-lg-6">
            <input type="text" class="input-text js-input" id="firstname" name="firstname" required>
            <label class="label" for="firstname">Your firstname</label>
            <span class="error" id="firstnameError"></span>
        </div>
        <div class="form-field col-lg-6">
            <input type="email" class="input-text js-input" id="email" name="email" required>
            <label class="label" for="email">Your email</label>
            <span class="error" id="emailError"></span>
        </div>
        <div class="form-field col-lg-6">
            <input type="file" class="input-text js-input" id="file" name="file">
            <span class="error" id="fileError"></span>
        </div>
        <div class="form-field col-lg-12">
            <input class="input-text js-input" id="description" name="description" required>
            <label class="label" for="description">Your description</label>
            <span class="error" id="descriptionError"></span>
        </div>
        <div class="form-field col-lg-6">
            <button type="submit" id="submit" class="submit-btn">Submit</button>
        </div>
    </form>
</section>

</body>
</html>