document.getElementById('userMenu').addEventListener('click', function() {
    var subMenu = this.querySelector('.sub-menu');
    if (subMenu.style.display === 'block') {
        subMenu.style.display = 'none';
    } else {
        subMenu.style.display = 'block';
    }
});
