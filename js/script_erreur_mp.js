function afficherAlerte() {
    Swal.fire({
        icon: 'error', // Icône d'erreur
        title: 'Oops...',
        text: 'Les mots de passe ne correspondent pas.',
        customClass: {
            popup: 'sweetalert-popup', // Classe CSS personnalisée pour la boîte de dialogue
            title: 'sweetalert-title', // Classe CSS personnalisée pour le titre
            content: 'sweetalert-content' 
        },
        background: '#070303', 
        confirmButtonColor: '#34075c', 
        confirmButtonText: 'OK',
        iconColor: '#1c1a1a'
    });
}


function verifierMotsDePasse() {
    var password = document.getElementsByName("password")[0].value;
    var passwordConfirm = document.getElementsByName("password_confirm")[0].value;

    if (password !== passwordConfirm) {
        afficherAlerte(); 
        return false;
    }

    return true; 
}
