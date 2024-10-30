// script.js

document.addEventListener('DOMContentLoaded', function () {
    const erreurMessage = document.getElementById('erreurMessage');

    const newPasswordInput = document.getElementById('newPassword');
    const passwordConfirmInput = document.getElementById('password_confirm');
    
    // Gérer le formulaire soumis
    const form = document.getElementById('votreFormulaire');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Empêcher la soumission du formulaire

        const newPassword = newPasswordInput.value;
        const passwordConfirm = passwordConfirmInput.value;
        
        // Réinitialiser le message d'erreur
        erreurMessage.textContent = '';

        // Gérer les différentes erreurs
        if (newPassword !== passwordConfirm) {
            erreurMessage.textContent = 'Les mots de passe ne correspondent pas.';
        }
    });
});
