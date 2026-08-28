{{--
    Fond animé discret pour les pages sans photo (Contact, Nous rejoindre, Faire un don).
    Le motif "globe" (cercles concentriques + croix) est exclu sur Nous rejoindre
    (:globe="false") — retour direct de la Fondatrice : "un symbole comme la terre
    qui n'a pas sa place" sur cette page.
--}}
@props(['globe' => true])
<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
    @if ($globe)
        <svg class="ambient-bg-motif absolute -top-16 -right-24 w-[520px] h-[520px] text-[#6B2A28]/[0.05]" viewBox="0 0 100 100" fill="none">
            <circle cx="50" cy="50" r="46" stroke="currentColor" stroke-width="1.2"/>
            <circle cx="50" cy="50" r="34" stroke="currentColor" stroke-width="1.2"/>
            <circle cx="50" cy="50" r="22" stroke="currentColor" stroke-width="1.2"/>
            <path d="M50 4v92M4 50h92" stroke="currentColor" stroke-width="1"/>
        </svg>
    @endif
    <svg class="ambient-bg-motif absolute -bottom-24 -left-16 w-96 h-96 text-[#C99A3E]/[0.06]" viewBox="0 0 100 100" fill="none" style="animation-delay: -12s;">
        <path d="M50 10v40M50 50c-15 5-25 18-28 40M50 50c-8 10-12 22-11 42M50 50c8 10 12 22 11 42M50 50c15 5 25 18 28 40" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
    </svg>
</div>
