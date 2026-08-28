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
            // 11 (Ressources) : photos du mockup pas encore disponibles — quota Canva
            // atteint pendant cette session. Ne pas approximer avec une image qui ne
            // correspond pas (femme+enfants, coucher de soleil, statue...) : conservées
            // en fond neutre le temps de régénérer les bonnes photos. Voir CLAUDE.md.
            7 => ['type' => 'pending', 'side' => 'right'],
            8 => ['type' => 'pending', 'side' => 'right'],
            9 => ['type' => 'pending', 'side' => 'left'],
            10 => ['type' => 'pending', 'side' => 'left'],
            11 => ['type' => 'pending', 'side' => 'left'],
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
                            <img src="{{ $visual['src'] }}" alt="" class="absolute inset-0 w-full h-full object-cover hero-kenburns opacity-90">
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
                                <svg viewBox="0 0 200 220" class="w-full h-full text-[#C99A3E]/80" fill="currentColor" aria-hidden="true">
                                    <path d="M96 6c14 0 22 9 34 12 10 3 22 0 28 9 5 8 0 18 6 25 7 8 20 10 22 21 2 10-9 16-10 26-1 11 9 18 6 29-3 10-16 12-20 22-3 9 3 19-4 27-6 8-19 6-27 12-7 6-9 18-18 21-9 3-17-6-27-6s-17 10-27 7c-9-3-10-15-18-21-8-6-21-4-27-12-7-8 0-18-3-27-4-10-17-12-20-22-3-11 7-18 6-29-1-11-12-13-10-26 2-11 15-13 22-21 6-7 1-17 6-25 6-9 18-6 28-9 12-3 20-12 34-12Z"/>
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
                            {{ __('pages.volet') }} {{ str_pad($position, 2, '0', STR_PAD_LEFT) }}
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
