document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll(".card");
    cards.forEach(card => {
        card.addEventListener("click", function() {
            const url = card.getAttribute("data-url");
            if (url) {
                window.location.href = url;
            }
        });
    });
});
