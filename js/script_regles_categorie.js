document.addEventListener('DOMContentLoaded', function() {
    var cartes = document.querySelectorAll('.card-boutique');
    cartes.forEach(function(carte) {
        carte.addEventListener('mouseenter', function() {
            this.querySelector('.carte-details').style.display = 'block';
        });

        carte.addEventListener('mouseleave', function() {
            this.querySelector('.carte-details').style.display = 'none';
        });
    });
});
