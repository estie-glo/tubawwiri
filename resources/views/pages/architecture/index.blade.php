@extends('layouts.app')

@section('title', __('architecture.title') . ' — ' . $volet['name'] . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('architecture.intro'))

@section('content')
    @php
        $locale = app()->getLocale();
        $urlFor = fn (int $n) => $n <= 1 ? route('architecture.index', $locale) : route('architecture.show', [$locale, $n]);

        $icons = [
            '<path d="M12 21v-9m0 0c0-4.5-3-7-7-7 0 4.5 2.5 7 7 7Zm0 0c0-4.5 3-7 7-7 0 4.5-2.5 7-7 7Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>',
            '<path d="M4 5h16v10H8l-4 4V5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<path d="M9 4c-2 2-2.5 4.5-1.5 7-2 .5-3.5 2-4 4 2.5 1 5-.5 6-2.5 1 2.5 3.5 4 6 3.5-1-2-3-3-4.5-3 2-2 2-4.5.5-7-1 2-2.5 2.5-3.5 1.5-.5-1.5 0-2.5 1-3.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<circle cx="8" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="16" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3M11.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
            '<path d="M12 21s-7-4.5-7-10a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 5.5-7 10-7 10-1.3-1-2.6-1.9-4-3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<path d="M12 3.5 4.5 6v5c0 5 3 8 7.5 9.5C16.5 19 19.5 16 19.5 11V6L12 3.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<rect x="3.5" y="7" width="17" height="13" rx="1.2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M8 7V5.5A1.5 1.5 0 0 1 9.5 4h5A1.5 1.5 0 0 1 16 5.5V7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
            '<path d="M3 10v4h3l5 4V6L6 10H3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path stroke-linecap="round" d="M16 9a4 4 0 0 1 0 6"/>',
            '<rect x="7" y="8" width="10" height="9" rx="3" fill="none" stroke="currentColor" stroke-width="1.6"/><rect x="10" y="15" width="4" height="6" rx="1.5" fill="none" stroke="currentColor" stroke-width="1.6"/>',
            '<rect x="4" y="5" width="16" height="10" rx="1.2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M2 18h20l-2-3H4l-2 3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<path d="M12 21s6-5.5 6-11a6 6 0 1 0-12 0c0 5.5 6 11 6 11Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/>',
        ];
        $icon = $icons[($position - 1) % count($icons)];

        // ===== Visuels par volet (3.12.4 : "copie conforme" = y compris les
        // schémas/photos de chaque carte du mockup, pas seulement le texte) =====
        $diagramIconSets = [
            'cavamis' => [
                'center' => ['label' => 'CAVAMIS', 'icon' => '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>'],
                'nodes' => [
                    ['label' => 'Écoute', 'icon' => '<circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M9 9v6M12 7v10M15 9v6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'],
                    ['label' => 'Conseil', 'icon' => '<path d="M4 5h16v10H8l-4 4V5Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>'],
                    ['label' => 'Sensibilisation', 'icon' => '<path d="M3 10v4h3l5 4V6L6 10H3Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M16 9a4 4 0 0 1 0 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'],
                    ['label' => 'Éveil', 'icon' => '<circle cx="12" cy="12" r="2.6" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M12 3v3.5M12 17.5V21M3 12h3.5M17.5 12H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'],
                    ['label' => 'Motivation', 'icon' => '<path d="M12 19V5M6 11l6-6 6 6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>'],
                    ['label' => 'Transmission', 'icon' => '<path d="M4 5.5C4 4.7 4.7 4 5.5 4H12v16H5.5A1.5 1.5 0 0 1 4 18.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H12v16h6.5a1.5 1.5 0 0 0 1.5-1.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>'],
                    ['label' => 'Action', 'icon' => '<path d="M5 3v18M5 4h11l-2.5 3.5L16 11H5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>'],
                ],
            ],
            'doctrine3t' => [
                'center' => ['label' => '3T', 'icon' => '<path d="M12 21v-9m0 0c0-4.5-3-7-7-7 0 4.5 2.5 7 7 7Zm0 0c0-4.5 3-7 7-7 0 4.5-2.5 7-7 7Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>'],
                'nodes' => [
                    ['label' => 'TESIMAMA', 'icon' => '<path d="M9 4c-2 2-2.5 4.5-1.5 7-2 .5-3.5 2-4 4 2.5 1 5-.5 6-2.5 1 2.5 3.5 4 6 3.5-1-2-3-3-4.5-3 2-2 2-4.5.5-7-1 2-2.5 2.5-3.5 1.5-.5-1.5 0-2.5 1-3.5Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>'],
                    ['label' => 'TOLAMUKE', 'icon' => '<circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M12 3v2M12 19v2M4 12H2M22 12h-2M5.5 5.5l1.4 1.4M17.1 17.1l1.4 1.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'],
                    ['label' => 'TELUMIÈRE', 'icon' => '<path d="M12 2.5 14 9h6.5l-5.3 4 2 6.5L12 15.8 6.8 19.5l2-6.5-5.3-4H10L12 2.5Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>'],
                ],
            ],
            'composantes' => [
                'center' => ['label' => 'TBW', 'icon' => '<path d="M12 21v-9m0 0c0-4.5-3-7-7-7 0 4.5 2.5 7 7 7Zm0 0c0-4.5 3-7 7-7 0 4.5-2.5 7-7 7Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>'],
                'nodes' => [
                    ['label' => 'Fondation', 'icon' => '<path d="M12 21s-7-4.5-7-10a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 5.5-7 10-7 10-1.3-1-2.6-1.9-4-3Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>'],
                    ['label' => 'TBW Academy', 'icon' => '<path d="M12 4 2 8l10 4 10-4-10-4Zm-7 6.5V16c0 1.5 3 3.5 7 3.5s7-2 7-3.5v-5.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>'],
                    ['label' => 'TBW Consulting', 'icon' => '<rect x="3.5" y="7" width="17" height="13" rx="1.2" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M8 7V5.5A1.5 1.5 0 0 1 9.5 4h5A1.5 1.5 0 0 1 16 5.5V7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'],
                ],
            ],
        ];

        $rubriquesNames = ['Africa Watch', 'Allô Parentalité', "Voix de l'Enfant", 'Au Féminin', 'Au Masculin', 'Mémoire', 'Le Message', 'La Question', 'Campagnes', 'Voix TBW'];
        $rubriqueDot = '<circle cx="12" cy="12" r="3.5" fill="currentColor"/>';

        // Icônes qui composent le graphique "carte d'Afrique" du volet Observatoire
        $africaIcons = [
            ['label' => 'Analyses', 'icon' => '<rect x="4" y="12" width="3.5" height="8" fill="currentColor"/><rect x="10.25" y="7" width="3.5" height="13" fill="currentColor"/><rect x="16.5" y="4" width="3.5" height="16" fill="currentColor"/>'],
            ['label' => 'Baromètres', 'icon' => '<circle cx="12" cy="13" r="8" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M12 13 16 9M9 4h6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>'],
            ['label' => 'Recherches', 'icon' => '<circle cx="10.5" cy="10.5" r="6.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M15.3 15.3 21 21" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>'],
            ['label' => 'Population', 'icon' => '<circle cx="8" cy="8" r="2.6" fill="none" stroke="currentColor" stroke-width="1.5"/><circle cx="16" cy="8" r="2.6" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M2.7 19c.6-3 2.7-4.8 5.3-4.8s4.7 1.8 5.3 4.8M10.7 19c.6-3 2.7-4.8 5.3-4.8s4.7 1.8 5.3 4.8" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>'],
        ];

        $visuals = [
            1 => ['type' => 'photo', 'side' => 'right', 'src' => asset('images/architecture/identite-baobab.jpg')],
            2 => ['type' => 'diagram', 'diagram' => 'cavamis'],
            3 => ['type' => 'diagram', 'diagram' => 'doctrine3t'],
            4 => ['type' => 'diagram', 'diagram' => 'composantes'],
            5 => ['type' => 'diagram', 'diagram' => 'rubriques'],
            6 => ['type' => 'photo', 'side' => 'right', 'src' => asset('images/architecture/fondation-tubawwiri.jpg')],
            // 7 (TBW Academy), 8 (TBW Consulting), 9 (Communication), 10 (Campagnes),
            // 11 (Ressources) : quota Canva resté bloqué après 4 essais (15, 16, 17,
            // 27/08) — photos libres de droits (Pexels, sans attribution requise)
            // choisies pour correspondre au thème de chaque volet, voir CLAUDE.md 3.14.
            7 => ['type' => 'photo', 'side' => 'right', 'src' => asset('images/architecture/tbw-academy.jpg')],
            8 => ['type' => 'photo', 'side' => 'right', 'src' => asset('images/architecture/tbw-consulting.jpg')],
            9 => ['type' => 'photo', 'side' => 'left', 'src' => asset('images/architecture/communication.jpg')],
            10 => ['type' => 'photo', 'side' => 'left', 'src' => asset('images/architecture/campagnes.jpg'), 'position' => 'top'],
            11 => ['type' => 'photo', 'side' => 'left', 'src' => asset('images/architecture/ressources.jpg')],
            12 => ['type' => 'africa'],
        ];

        $visual = $visuals[$position] ?? ['type' => 'pending', 'side' => 'right'];
    @endphp

    <section class="min-h-[70vh] flex flex-col items-center justify-center px-4 py-16 reveal">
        <div class="w-full max-w-5xl">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em] text-center mb-2">Fondation TUBAWWIRI (TBW)</p>
            <h1 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E] text-center mb-10">
                {{ __('architecture.title') }}
            </h1>

            <div class="relative flex items-center gap-3 sm:gap-5">
                <a href="{{ $urlFor(max($position - 1, 1)) }}" id="page-nav-prev" aria-label="{{ __('pages.previous') }}" data-first-url="{{ $urlFor(1) }}"
                   class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-[#C99A3E] hover:bg-[#C99A3E] hover:text-white transition {{ $position <= 1 ? 'opacity-30 pointer-events-none' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </a>

                <div class="page-swipe-card relative flex-1 bg-white rounded-[2.5rem] overflow-hidden shadow-sm min-h-[440px] {{ $visual['type'] === 'diagram' ? 'grid md:grid-cols-2 items-center' : '' }}">
                    @if ($visual['type'] === 'photo')
                        <div class="absolute inset-0 p-8 md:p-14">
                            <img src="{{ $visual['src'] }}" alt="" class="absolute inset-0 w-full h-full object-cover hero-kenburns opacity-90" style="object-position: {{ $visual['position'] ?? 'center' }};">
                            <div class="absolute inset-0 bg-gradient-to-r {{ ($visual['side'] ?? 'right') === 'left' ? 'from-white/10 via-white/75 to-white' : 'from-white via-white/75 to-white/10' }}"></div>
                        </div>
                    @endif

                    @if ($visual['type'] === 'pending')
                        @php $pSide = $visual['side'] ?? 'right'; @endphp
                        <div class="absolute inset-y-0 {{ $pSide === 'left' ? 'left-0' : 'right-0' }} w-full md:w-1/2 bg-[#F3EDE0] flex flex-col items-center justify-center gap-2 overflow-hidden">
                            <img src="{{ asset('images/architecture/identite-baobab.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-10">
                            <svg class="w-16 h-16 text-[#C99A3E]/40 relative z-10" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 16.5 8.5 12l3 3L20 7.5M20 7.5V12M20 7.5h-4.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <span class="relative z-10 text-[10px] font-bold uppercase tracking-widest text-[#6B2A28]/60">{{ __('pages.photo_pending') }}</span>
                        </div>
                        <div class="absolute inset-0 md:w-1/2 {{ $pSide === 'left' ? 'md:left-1/2 bg-gradient-to-l' : 'bg-gradient-to-r' }} from-white via-white/85 to-transparent"></div>
                    @endif

                    @if ($visual['type'] === 'africa')
                        <div class="absolute inset-y-0 right-0 w-full md:w-1/2 bg-gradient-to-br from-[#123D2E] to-[#0b261c] flex items-center justify-center">
                            <div class="relative w-56 h-56">
                                <svg viewBox="0 0 109.39 122.88" class="w-full h-full text-[#C99A3E]/80" fill="currentColor" aria-hidden="true">
                                    <path d="M96.96,97.74c-1.23,0.04-2.61,0.09-3.09,0.11C93.39,97.87,93,97.84,93,97.8c0-0.17-0.18-0.01-0.89,0.82 c-1.73,2-2.86,2.99-4.08,3.57c-0.59,0.28-0.76,0.31-1.67,0.32c-0.9,0.02-1.09,0.05-1.59,0.3c-0.74,0.37-1.44,1.07-1.8,1.79 c-0.23,0.46-0.3,0.77-0.35,1.54c-0.11,1.55-0.43,2.24-1.93,4.1c-1.55,1.93-1.88,2.64-1.88,4.1c0,0.79,0.04,1.02,0.23,1.41 c0.34,0.67,1.01,1.3,1.65,1.54c0.7,0.27,0.92,0.26,1.66-0.03l0.61-0.25l3.26,0.13l3.26,0.13l0.48-0.25 c0.57-0.32,1.07-0.87,2.12-2.44c0.44-0.65,1.33-1.92,2-2.81c1.57-2.14,4.21-6.12,5.21-7.83c1-1.71,1.06-1.96,0.97-4.08 c-0.03-0.87-0.09-1.72-0.12-1.9c-0.06-0.31-0.08-0.32-0.52-0.3C99.39,97.65,98.18,97.7,96.96,97.74L96.96,97.74L96.96,97.74z M27.02,0.1c-0.3,0.08-0.94,0.37-1.43,0.64c-1.56,0.86-2.46,1.27-2.97,1.36c-0.77,0.15-1.29,0.4-1.94,0.91 c-0.72,0.57-1.36,1.39-1.76,2.22c-0.52,1.1-1.61,1.82-3.7,2.46c-1.82,0.56-2.82,0.94-3.34,1.24c-0.67,0.4-2.79,2.2-4.98,4.22 C4.43,15.44,4.32,15.64,3.65,19c-0.62,3.15-0.98,4.08-2.01,5.28c-0.71,0.82-1.1,1.51-1.41,2.52C0.04,27.43,0,27.76,0,28.88 c0.01,1.51,0.18,2.31,0.8,3.65c0.75,1.6,1.61,3.93,2.21,6c0.43,1.49,0.64,1.94,1.5,3.21c0.94,1.41,3.17,4.17,3.62,4.48 c0.73,0.5,1.48,0.66,3.07,0.66c0.78,0,1.56-0.03,1.74-0.07c0.47-0.09,1.56,0.22,2.86,0.79c1.71,0.76,1.85,0.8,3.01,0.79 c0.77,0,1.46-0.09,2.7-0.34l1.66-0.33l0.51,0.21c1.27,0.52,1.93,0.58,3.8,0.36l0.52-0.07l0.43,0.46c0.26,0.29,0.66,0.94,1.03,1.68 c0.96,1.93,1.71,2.51,3.47,2.63c1.07,0.08,1.54,0.27,2.23,0.91c0.24,0.22,0.55,0.65,0.7,0.96c0.24,0.47,0.28,0.66,0.27,1.34 c-0.02,1.12-0.24,1.84-1.13,3.71c-1,2.09-1.13,2.56-1.13,3.74c0,1.34,0.19,1.85,1.3,3.49c1.63,2.4,2.46,4.36,2.68,6.31 c0.28,2.44,0.62,8.74,0.51,9.14c-0.25,0.86-0.81,1.66-2.67,3.78c-1.17,1.34-1.51,2.02-1.75,3.46c-0.4,2.41-0.04,4.28,1.69,8.84 c0.4,1.03,0.77,2.12,0.84,2.42c0.08,0.34,0.15,1.81,0.2,3.9c0.09,3.92,0.05,3.74,1.26,6.57c1.32,3.06,1.7,4.62,1.49,6.12 c-0.06,0.41-0.08,0.96-0.05,1.23c0.13,1.15,1.13,2.44,2.11,2.75c0.3,0.1,1.12,0.17,2.28,0.21c2.43,0.09,3.21,0.21,3.42,0.52 c0.36,0.53,0.55,0.55,4.09,0.38c1.77-0.09,4.04-0.15,5.05-0.14c1.62,0.02,1.93-0.01,2.7-0.21c2.03-0.52,4.21-1.68,6.84-3.63 c1.73-1.28,2.92-2.54,3.61-3.77c0.68-1.24,1.3-1.74,2.96-2.38c1.54-0.59,2.31-1.17,2.67-2c0.19-0.43,0.23-0.77,0.29-2.43 c0.09-2.22,0.18-2.55,0.91-3.26c1.11-1.08,2.44-1.74,5.57-2.78c2.69-0.89,3.08-1.06,3.65-1.58c1.04-0.96,1.53-2.55,1.95-6.27 c0.09-0.85,0.09-1.53,0-3.06c-0.27-4.71-0.06-7.18,0.81-9.3c0.47-1.18,1.41-2.29,2.64-3.15c0.3-0.22,1.86-1.36,3.46-2.56 c1.6-1.2,3.59-2.59,4.4-3.1c3.15-1.98,4.51-3.06,5.67-4.51c0.97-1.2,3.47-5.36,4.43-7.36c0.48-1.02,0.54-1.19,0.49-1.6 c-0.16-1.3-1.48-2.45-2.71-2.32c-0.26,0.02-0.9,0.13-1.41,0.22c-0.56,0.11-1.41,0.18-2.12,0.18c-1.01,0-1.3-0.04-1.98-0.26 c-0.95-0.31-1.63-0.77-2.07-1.39c-0.39-0.55-0.52-0.9-1.05-2.73c-0.61-2.17-0.73-2.37-2.3-3.84c-1.2-1.12-2.26-3.04-2.88-5.25 c-0.17-0.58-0.54-1.46-0.99-2.32c-0.85-1.64-1.13-2.44-1.13-3.25c0-1.47-0.51-3.15-1.64-5.41c-0.8-1.6-1.28-2.78-1.52-3.68 c-0.1-0.38-0.6-1.84-1.12-3.22c-1.01-2.72-1.95-5.47-2.13-6.28c-0.31-1.3-1.64-1.98-4.26-2.16c-1.85-0.13-4.02-1.07-8-3.43 l-1.94-1.15l-3.82-0.43c-3.59-0.4-3.83-0.42-4.08-0.28l-0.27,0.17l-0.62-0.71c-1.17-1.33-2.33-2.11-3.5-2.33 c-0.74-0.14-1.25-0.42-1.8-0.95c-0.99-0.97-1.17-1.88-0.68-3.31c0.53-1.53,0.52-2.2-0.01-2.8c-0.3-0.35-0.31-0.35-1.11-0.35 c-1.45,0-2.38-0.16-6.33-1.09c-2.42-0.57-3.92-0.7-5.38-0.46c-0.7,0.12-0.92,0.1-4.05-0.35c-1.82-0.26-3.49-0.46-3.71-0.46 c-0.54-0.01-1.22,0.23-2.23,0.8l-0.85,0.47l-0.66-0.15c-0.87-0.21-1.51-0.45-2.09-0.81C28.33,0,27.73-0.09,27.02,0.1L27.02,0.1 L27.02,0.1z"/>
                                </svg>
                                @foreach ($africaIcons as $i => $node)
                                    @php
                                        $angle = -90 + $i * (360 / count($africaIcons));
                                        $x = 50 + 42 * cos(deg2rad($angle));
                                        $y = 50 + 42 * sin(deg2rad($angle));
                                    @endphp
                                    <div class="absolute w-9 h-9 rounded-full bg-[#F6F1E4] border border-[#C99A3E] flex items-center justify-center shadow" style="left: {{ $x }}%; top: {{ $y }}%; transform: translate(-50%, -50%);" title="{{ $node['label'] }}">
                                        <svg class="w-4 h-4 text-[#123D2E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $node['icon'] !!}</svg>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="absolute inset-0 md:w-1/2 bg-gradient-to-r from-white via-white/85 to-transparent"></div>
                    @endif

                    <div class="relative z-10 max-w-lg p-8 md:p-14 {{ $visual['type'] === 'diagram' ? 'md:pr-4' : '' }} {{ ($visual['side'] ?? null) === 'left' ? 'md:ml-auto' : '' }}">
                        <p class="text-xs font-bold text-[#C99A3E] tracking-[0.2em]">
                            {{ __('pages.volet') }} {{ str_pad($position, 2, '0', STR_PAD_LEFT) }} / {{ str_pad($total, 2, '0', STR_PAD_LEFT) }}
                        </p>
                        <div class="w-14 h-14 rounded-full bg-[#123D2E] border-2 border-[#C99A3E] flex items-center justify-center mt-4">
                            <svg class="w-6 h-6 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $icon !!}</svg>
                        </div>
                        <h2 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E] mt-5 leading-snug">
                            {{ $volet['name'] }}
                        </h2>
                        @if (!empty($volet['lead']))
                            <p class="text-sm italic text-[#6B2A28] mt-2">{{ $volet['lead'] }}</p>
                        @endif
                        <div class="w-12 h-[3px] bg-[#C99A3E] mt-4 mb-4"></div>
                        <div class="prose max-w-none text-[#4a453c] leading-relaxed max-h-[220px] overflow-y-auto pr-2">
                            {!! $volet['html'] !!}
                        </div>
                        @if (!empty($volet['link']))
                            <a href="{{ route($volet['link']['route'], $locale) }}"
                               class="btn-tbw inline-flex mt-5 bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] px-5 py-2.5 text-xs font-bold uppercase tracking-wider">
                                {{ $volet['link']['label'] }} →
                            </a>
                        @endif
                    </div>

                    @if ($visual['type'] === 'diagram')
                        <div class="relative z-10 py-10 flex items-center justify-center bg-[#F6F1E4]/60 h-full">
                            @if ($visual['diagram'] === 'rubriques')
                                <x-radial-diagram
                                    :center-label="'10 rubriques'"
                                    :center-icon="'<path d=\'M12 21v-9m0 0c0-4.5-3-7-7-7 0 4.5 2.5 7 7 7Zm0 0c0-4.5 3-7 7-7 0 4.5-2.5 7-7 7Z\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.6\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/>'"
                                    :nodes="collect($rubriquesNames)->map(fn ($n) => ['label' => $n, 'icon' => $rubriqueDot])->all()"
                                    :size="300" :radius="130" />
                            @else
                                <x-radial-diagram
                                    :center-label="$diagramIconSets[$visual['diagram']]['center']['label']"
                                    :center-icon="$diagramIconSets[$visual['diagram']]['center']['icon']"
                                    :nodes="$diagramIconSets[$visual['diagram']]['nodes']"
                                    :size="260" :radius="100" />
                            @endif
                        </div>
                    @endif
                </div>

                <a href="{{ $urlFor(min($position + 1, $total)) }}" id="page-nav-next" aria-label="{{ __('pages.next') }}"
                   class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-[#C99A3E] hover:bg-[#C99A3E] hover:text-white transition {{ $position >= $total ? 'opacity-30 pointer-events-none' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="flex sm:hidden items-center justify-between mt-5">
                <a href="{{ $urlFor(max($position - 1, 1)) }}" class="text-xs font-bold uppercase tracking-wider text-[#C99A3E] {{ $position <= 1 ? 'opacity-30 pointer-events-none' : '' }}">← {{ __('pages.previous') }}</a>
                <a href="{{ $urlFor(min($position + 1, $total)) }}" class="text-xs font-bold uppercase tracking-wider text-[#C99A3E] {{ $position >= $total ? 'opacity-30 pointer-events-none' : '' }}">{{ __('pages.next') }} →</a>
            </div>

            <div class="flex items-center justify-center flex-wrap gap-2 mt-7">
                @for ($n = 1; $n <= $total; $n++)
                    <a href="{{ $urlFor($n) }}" aria-label="{{ $n }}/{{ $total }}"
                       class="w-2.5 h-2.5 rounded-full transition {{ $n === $position ? 'bg-[#C99A3E]' : 'bg-[#d8cfb8] hover:bg-[#C99A3E]/50' }}"></a>
                @endfor
            </div>
        </div>
    </section>
@endsection
