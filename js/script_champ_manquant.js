// script.js

// Fonction pour valider le formulaire
function validateForm() {
    var loginField = document.getElementById("login");
    var loginValue = loginField.value.trim();
    
    // Ajoutez ici votre logique de validation, par exemple, vérifiez si le champ de connexion est rempli
    if (loginValue === "") {
        afficherMessageErreur("Veuillez entrer un nom d'utilisateur.");
        loginField.focus();
        return false; // Empêche la soumission du formulaire si la validation échoue
    }

    
    return true; // Permet la soumission du formulaire si la validation réussit
}
