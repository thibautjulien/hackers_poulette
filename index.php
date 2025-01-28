<?php

require_once 'includes/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $file = $_FILES['file'];

    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $filePath = 'uploads/' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
    }

    try {
        // Préparer la requête d'insertion avec PDO
        $stmt = $bdd->prepare("INSERT INTO tickets (name, firstname, email, file , description) VALUES (:name, :firstname,:email , :file, :description)");

        // Lier les paramètres
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':file', $filePath);
        $stmt->bindParam(':description', $description);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "Données insérées avec succès.";
        } else {
            echo "Erreur lors de l'insertion des données.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackers Poulette</title>

    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Validation FORM -->
    <script src="./assets/js/validation.js" defer></script>
</head>

<body>

<section id="form" class="get-in-touch">
    <h1 class="title">Send a ticket</h1>

    <form id="form" action="" method="post" enctype="multipart/form-data" class="contact-form row">


        <!-- Input NAME -->
        <div class="form-field col-lg-6">
            <input type="text" class="input-text js-input" id="name" name="name">
            <label class="label" for="name">Your name</label>
            <span class="error" id="nameError"></span>
        </div>

        <!-- Input FIRSTNAME -->
        <div class="form-field col-lg-6">
            <input type="text" class="input-text js-input" id="firstname" name="firstname">
            <label class="label" for="firstname">Your firstname</label>
            <span class="error" id="firstnameError"></span>
        </div>


        <!-- Input EMAIL -->
        <div class="form-field col-lg-6">
            <input type="email" class="input-text js-input" id="email" name="email">
            <span class="error" id="emailError"></span>
            <label class="label" for="email">Your email</label>
        </div>

        <!-- Input FILE -->
        <div class="form-field col-lg-6">
            <input type="file" class="input-text js-input" id="file" name="file">
            <span class="error" id="fileError"></span>
        </div>

        <!-- Input DESCRIPTION -->
        <div class="form-field col-lg-12">
            <input class="input-text js-input" id="description" name="description"></input>
            <label class="label" for="name">Your description</label>

            <span class="error" id="descriptionError"></span>
        </div>

        <div class="form-field col-lg-6">
            <button type="submit" id="submit" class="submit-btn">Submit</button>
        </div>


    </form>
</section>

<!-- Connexion DB -->
<?php
require_once 'includes/db.php';
?>
</body>

</html>