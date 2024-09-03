document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los elementos con la clase 'menu-toggle'
    var menuToggles = document.querySelectorAll('.menu-toggle');

    menuToggles.forEach(function(menuToggle) {
        menuToggle.addEventListener('click', function() {
            var parentLi = menuToggle.closest('li.menu-item');
            var subMenu = parentLi.querySelector('.menu-sub');

            if (subMenu) {
                // Cierra todos los submenús excepto el clicado
                closeAllSubMenus(parentLi);

                // Alterna el despliegue del submenú clicado
                if (subMenu.style.display === 'none' || subMenu.style.display === '') {
                    subMenu.style.display = 'block';
                } else {
                    subMenu.style.display = 'none';
                }
            }
        });
    });

    function closeAllSubMenus(exceptionLi) {
        var allSubMenus = document.querySelectorAll('.menu-sub');

        allSubMenus.forEach(function(subMenu) {
            if (subMenu.closest('li.menu-item') !== exceptionLi) {
                subMenu.style.display = 'none';
            }
        });
    }
});
