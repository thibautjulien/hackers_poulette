document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("ticketForm");

    form.addEventListener("submit", function (event) {
        // Empêcher l'envoi du formulaire si les validations échouent
        event.preventDefault();

        // Effacer les anciens messages d'erreur
        clearErrors();

        // Récupérer les champs
        const name = document.getElementById("name");
        const firstname = document.getElementById("firstname");
        const email = document.getElementById("email");
        const file = document.getElementById("file");
        const description = document.getElementById("description");

        let isValid = true;

        // Valider le champ "Nom"
        if (!validateString(name.value, 2, 255)) {
            showError("nameError", "Le nom est requis (2-255 caractères).");
            isValid = false;
        }

        // Valider le champ "Prénom"
        if (!validateString(firstname.value, 2, 255)) {
            showError("firstnameError", "Le prénom est requis (2-255 caractères).");
            isValid = false;
        }

        // Valider le champ "Email"
        if (!validateEmail(email.value)) {
            showError("emailError", "L'adresse e-mail est invalide.");
            isValid = false;
        }

        // Valider le champ "Fichier"
        if (file.files.length > 0) {
            const fileTypes = ["image/jpeg", "image/png", "image/gif"];
            const maxSize = 2 * 1024 * 1024; // 2 MB

            if (!fileTypes.includes(file.files[0].type)) {
                showError("fileError", "Le fichier doit être de type jpg, png ou gif.");
                isValid = false;
            } else if (file.files[0].size > maxSize) {
                showError("fileError", "La taille du fichier ne doit pas dépasser 2 MB.");
                isValid = false;
            }
        }

        // Valider le champ "Description"
        if (!validateString(description.value, 10, 500)) {
            showError("descriptionError", "La description doit contenir entre 10 et 500 caractères.");
            isValid = false;
        }

        // Si tout est valide, on peut soumettre le formulaire
        if (isValid) {
            form.requestSubmit(); // Utiliser requestSubmit() pour éviter les conflits
        }
    });

    // Fonction pour afficher un message d'erreur
    function showError(elementId, message) {
        const errorElement = document.getElementById(elementId);
        errorElement.textContent = message;
    }

    // Fonction pour effacer les messages d'erreur
    function clearErrors() {
        const errorElements = document.querySelectorAll('.error');
        errorElements.forEach(element => {
            element.textContent = '';
        });
    }

    // Fonction pour valider une chaîne de caractères avec une taille minimale et maximale
    function validateString(value, minLength, maxLength) {
        const trimmedValue = value.trim();
        return trimmedValue.length >= minLength && trimmedValue.length <= maxLength;
    }

    // Fonction pour valider une adresse email
    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }
});