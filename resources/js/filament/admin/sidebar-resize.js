/*
 * Poignée de redimensionnement de la sidebar admin (Fondation TUBAWWIRI).
 *
 * Un premier essai utilisait la propriété CSS native `resize: horizontal`
 * directement sur .fi-sidebar. Ça casse la mise en page : Filament positionne
 * la sidebar en `position: fixed` et décale le contenu principal via la
 * variable CSS --sidebar-width, fixée une seule fois au chargement de la
 * page. Le `resize` natif ne change que la largeur visuelle de l'élément,
 * jamais cette variable : la sidebar élargie finissait par recouvrir (et
 * bloquer les clics sur) la barre du haut et le contenu de la page.
 *
 * Cette poignée met donc à jour --sidebar-width elle-même au glisser-déposer,
 * ce qui garde la sidebar et le contenu principal synchronisés (ils lisent
 * tous les deux cette même variable).
 */
(function () {
    var MIN_WIDTH = 224; // 14rem
    var MAX_WIDTH = 416; // 26rem
    var STORAGE_KEY = 'tbw-admin-sidebar-width';

    function init() {
        var sidebar = document.querySelector('.fi-sidebar');

        if (!sidebar || sidebar.querySelector('.tbw-sidebar-resize-handle')) {
            return;
        }

        var currentWidth = sidebar.getBoundingClientRect().width || 320;

        function setWidth(px) {
            currentWidth = Math.min(MAX_WIDTH, Math.max(MIN_WIDTH, px));
            document.documentElement.style.setProperty('--sidebar-width', currentWidth + 'px');
            localStorage.setItem(STORAGE_KEY, currentWidth);
        }

        var saved = parseInt(localStorage.getItem(STORAGE_KEY), 10);
        if (!isNaN(saved)) {
            setWidth(saved);
        }

        var handle = document.createElement('div');
        handle.className = 'tbw-sidebar-resize-handle';
        handle.setAttribute('role', 'separator');
        handle.setAttribute('aria-orientation', 'vertical');
        handle.setAttribute('aria-label', 'Redimensionner la barre latérale');
        handle.setAttribute('tabindex', '0');
        sidebar.appendChild(handle);

        var dragging = false;

        handle.addEventListener('mousedown', function (event) {
            dragging = true;
            handle.classList.add('tbw-resizing');
            document.body.style.userSelect = 'none';
            event.preventDefault();
        });

        document.addEventListener('mousemove', function (event) {
            if (!dragging) {
                return;
            }

            var rect = sidebar.getBoundingClientRect();
            setWidth(event.clientX - rect.left);
        });

        document.addEventListener('mouseup', function () {
            if (!dragging) {
                return;
            }

            dragging = false;
            handle.classList.remove('tbw-resizing');
            document.body.style.userSelect = '';
        });

        // Accessibilité clavier : flèches gauche/droite une fois la poignée focus.
        handle.addEventListener('keydown', function (event) {
            if (event.key === 'ArrowLeft') {
                setWidth(currentWidth - 16);
                event.preventDefault();
            } else if (event.key === 'ArrowRight') {
                setWidth(currentWidth + 16);
                event.preventDefault();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', init);
    document.addEventListener('livewire:navigated', init);
})();
