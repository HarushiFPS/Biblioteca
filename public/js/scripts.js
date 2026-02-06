document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const navBar = document.querySelector('nav');

    // Lógica del Menú Hamburguesa
    if(menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
        });

        // Cerrar al hacer scroll
        window.addEventListener('scroll', () => {
            if(mobileMenu.classList.contains('open')){
                mobileMenu.classList.remove('open');
            }
        });
    }

    // Efecto Navbar al hacer scroll
    window.addEventListener('scroll', () => {
        if (navBar) {
            if (window.scrollY > 50) {
                navBar.classList.add('bg-slate-950/90');
            } else {
                navBar.classList.remove('bg-slate-950/90');
            }
        }
    });
});