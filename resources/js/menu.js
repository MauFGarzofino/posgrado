document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los elementos con la clase 'menu-toggle'
    var menuToggles = document.querySelectorAll('.menu-toggle');

    menuToggles.forEach(function(menuToggle) {
        menuToggle.addEventListener('click', function() {
            var parentLi = menuToggle.closest('li.menu-item');
            var subMenu = parentLi.querySelector('.menu-sub');

            if (subMenu) {
                // Alterna el despliegue del submenú
                if (subMenu.style.display === 'none' || subMenu.style.display === '') {
                    subMenu.style.display = 'block';
                } else {
                    subMenu.style.display = 'none';
                }
            }
        });
    });
});
