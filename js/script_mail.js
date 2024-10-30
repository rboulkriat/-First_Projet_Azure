// Fonction pour vérifier le format de l'email avec .fr ou .com à la fin
function verifierFormatEmail(email) {
    var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.(fr|com)$/i;
    return regexEmail.test(email);
}

// Fonction pour appeler la vérification lorsque l'utilisateur tape dans le champ email
$("#email").on("input", function() {
    var email = $(this).val();
    if (!verifierFormatEmail(email)) {
        // Si l'email ne respecte pas le format
        $("#messageErreur").text("Format d'email invalide. Veuillez vérifier.");
    } else {
        // Si l'email est correct
        $("#messageErreur").text("");
    }
});
