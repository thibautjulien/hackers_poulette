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
</head>

<body>
    <section id="form">
        <form action="">
            <div class="card w-50 p-5">
                <div class="d-flex flex-row my-3">
                    <!-- Input NAME -->
                    <input type="text" class="form-control me-3" id="name" name="name" placeholder="Your name"
                        minlength="2" maxlength="255" required>

                    <!-- Input FIRSTNAME -->
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Your firstname"
                        minlength="2" maxlength="255" required>
                </div>

                <div class="my-3">
                    <!-- Input EMAIL -->
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your email" required>
                </div>

                <!-- Input FILE -->
                <input type="file" class="form-control my-3" id="file" name="file" placeholder="Your file">

                <!-- Input DESCRIPTION -->
                <textarea type="text" class="form-control my-3" id="text" name="text" placeholder="Your description"
                    minlength="2" maxlength="1000" required></textarea>

                <button type="submit" class="my-3">Submit</button>
            </div>

        </form>
    </section>

    <?php
            require_once 'includes/db.php';
        ?>
</body>

</html>