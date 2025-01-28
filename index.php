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

        } else {
            echo "<h2 class='title'>Erreur lors de l'insertion des données0.</h2>";
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
</head>

<body>
<section id="form" class="get-in-touch">
    <h1 class="title">Send a ticket</h1>
    <form action="" method="post" enctype="multipart/form-data" class="contact-form row">

        <div class="form-field col-lg-6">
            <!-- Input NAME -->
            <input type="text" class="input-text js-input" id="name" name="name"
                   minlength="2" maxlength="255" required>
            <label class="label" for="name">Your name</label>
        </div>

        <div class="form-field col-lg-6">
            <!-- Input FIRSTNAME -->
            <input type="text" class="input-text js-input" id="firstname" name="firstname"
                   minlength="2" maxlength="255" required>
            <label class="label" for="firstname">Your firstname</label>
        </div>

        <div class="form-field col-lg-6">
            <!-- Input EMAIL -->
            <input type="email" class="input-text js-input" id="email" name="email">
            <label class="label" for="email">Your email</label>
        </div>


        <div class="form-field col-lg-6">
            <!-- Input FILE -->
            <input type="file" class="input-text js-input" id="file" name="file">
        </div>

        <div class="form-field col-lg-12">
            <!-- Input DESCRIPTION -->
            <input type="text" class="input-text js-input" id="description" name="description" minlength="2"
                   maxlength="1000" required></input>
            <label class="label" for="description">Your description</label>
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

<!-- Validation FORM -->
<script src="./assets/js/validation.js"></script>
</body>

</html>