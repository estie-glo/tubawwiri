{{--
    Fond vidéo en boucle, muet, discret — remplace le motif décoratif <x-ambient-bg>
    sur les pages sans photo (demande explicite de la Fondatrice, 28/08/2026).
    Respecte prefers-reduced-motion (la vidéo est mise en pause via video-bg.js,
    l'image poster reste visible comme fond statique).
--}}
@props(['src', 'poster' => null])

<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
    <video class="video-bg-el absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline
           @if($poster) poster="{{ $poster }}" @endif preload="metadata">
        <source src="{{ $src }}" type="video/mp4">
    </video>
    <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/90 via-[#123D2E]/60 to-[#123D2E]/25"></div>
</div>
