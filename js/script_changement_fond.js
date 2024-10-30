window.addEventListener("scroll", function() {
    if (window.scrollY > 2400) {
        document.body.style.background = "#E6A2D3"; // Rose pastel
    } else if (window.scrollY > 1600) {
        document.body.style.background = "#A9D18E"; // Vert pastel
    } else if (window.scrollY > 800) {
        document.body.style.background = "#A0C1D1"; // Bleu pastel
    } else {
        document.body.style.background = "#B19CD9"; // Violet pastel
    }
});

