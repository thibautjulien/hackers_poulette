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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"
        defer></script>

    <!-- Validation FORM -->
    <script src="./assets/js/validation.js" defer></script>
</head>

<body>
    <section id="form">
        <form id="form" action="" method="post" enctype="multipart/form-data">
            <div class="card w-50 p-5">
                <div class="d-flex flex-row my-3">
                    <!-- Input NAME -->
                    <input type="text" class="form-control me-3" id="name" name="name" placeholder="Your name">
                    <span class="error" id="nameError"></span>

                    <!-- Input FIRSTNAME -->
                    <input type="text" class="form-control" id="firstname" name="firstname"
                        placeholder="Your firstname">
                    <span class="error" id="firstnameError"></span>
                </div>

                <!-- Input EMAIL -->
                <div class="my-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your email">
                    <span class="error" id="emailError"></span>
                </div>

                <!-- Input FILE -->
                <div class="my-3">
                    <input type="file" class="form-control" id="file" name="file">
                    <span class="error" id="fileError"></span>
                </div>

                <!-- Input DESCRIPTION -->
                <textarea class="form-control my-3" id="description" name="description"
                    placeholder="Your description"></textarea>
                <span class="error" id="descriptionError"></span>

                <button type="submit" class="my-3">Submit</button>
            </div>
        </form>
    </section>

    <!-- Connexion DB -->
    <?php
        require_once 'includes/db.php';
    ?>
</body>

</html>