// Animation légère : les éléments avec la classe "reveal" apparaissent
// en fondu + léger décalage vers le haut quand ils entrent dans l'écran.
document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.reveal');

    if (!('IntersectionObserver' in window) || items.length === 0) {
        items.forEach((el) => el.classList.add('reveal-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    items.forEach((el) => observer.observe(el));
});
