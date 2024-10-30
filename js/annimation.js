// typed.js
const titleElement = document.getElementById("typed-title");
const titleText = "BIENVENUE SUR NOTRE PLATEFORME DE JEU !"; // Le texte que vous voulez faire apparaître

let currentIndex = 0;

function typeText() {
    if (currentIndex < titleText.length) {
        titleElement.innerHTML += titleText.charAt(currentIndex);
        currentIndex++;
        setTimeout(typeText, 100); // Contrôle la vitesse de frappe (100 millisecondes par caractère)
    }
}

window.addEventListener("load", typeText); // Démarre l'animation lorsque la page est chargée