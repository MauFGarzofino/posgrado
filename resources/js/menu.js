document.addEventListener('DOMContentLoaded', function() {
    var menuToggles = document.querySelectorAll('.menu-toggle');

    menuToggles.forEach(function(menuToggle) {
        menuToggle.addEventListener('click', function() {
            var parentLi = menuToggle.closest('li.menu-item');
            var subMenu = parentLi.querySelector('.menu-sub');

            if (subMenu) {
                if (subMenu.style.display === 'none' || subMenu.style.display === '') {
                    subMenu.style.display = 'block';
                } else {
                    subMenu.style.display = 'none';
                }
            }
        });
    });
});
