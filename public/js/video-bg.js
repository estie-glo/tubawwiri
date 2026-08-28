// Respecte prefers-reduced-motion : les vidéos de fond (composant <x-video-bg>)
// sont mises en pause immédiatement, l'image poster reste visible en fond statique.
document.addEventListener('DOMContentLoaded', function () {
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    document.querySelectorAll('.video-bg-el').forEach(function (video) {
        video.pause();
        video.removeAttribute('autoplay');
    });
});
