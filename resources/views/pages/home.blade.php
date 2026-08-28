@extends('layouts.app')

@section('title', __('site.home.title') . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('site.home.intro'))

@section('content')

    {{-- ===== HERO FULL-BLEED ===== --}}
    <section class="relative min-h-[88vh] flex items-end overflow-hidden">
        <img src="{{ asset('images/banner-tubawwiri.jpg') }}"
             alt="Fondation TUBAWWIRI"
             class="absolute inset-0 w-full h-full object-cover hero-kenburns">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0b261c]/92 via-[#123D2E]/78 to-[#123D2E]/35"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/75 via-transparent to-transparent"></div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 pb-16 pt-28 md:pb-20 md:pt-32 reveal">
            <p class="font-display text-[#C99A3E] text-xl md:text-2xl tracking-wide">TUBAWWIRI</p>
            <p class="text-[11px] font-semibold tracking-[0.28em] text-white/80 uppercase mt-1">(TBW) · To Be Wise · To Be Whole · To Be Worthy</p>

            <h1 class="font-display text-4xl md:text-6xl font-semibold text-white leading-[1.08] mt-6 max-w-3xl">
                {{ __('site.home.title') }}
            </h1>

            <p class="mt-5 text-white/85 max-w-xl text-base md:text-lg leading-relaxed">
                {{ __('site.home.intro') }}
            </p>

            <div class="mt-9 flex flex-wrap items-center gap-4">
                <a href="{{ route('about', app()->getLocale()) }}"
                   class="btn-tbw bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] px-7 py-3.5 text-xs font-bold uppercase tracking-wider">
                    {{ __('site.home.cta_discover') }}
                </a>
                <a href="{{ route('donation.index', app()->getLocale()) }}"
                   class="btn-tbw border border-white/70 text-white hover:bg-white hover:text-[#123D2E] px-7 py-3.5 text-xs font-bold uppercase tracking-wider">
                    {{ __('site.home.cta_donate') }}
                </a>
            </div>
        </div>
    </section>

    {{-- ===== DOMAINES ===== --}}
    {{-- Diaporama séquentiel (une image à la fois, chaque cadre remplit l'espace)
         sur demande explicite de la Fondatrice (28/08/2026) — remplace le
         défilement horizontal de petites cartes. Même mécanisme que la
         Doctrine des 3T (fondu, flèches, points, glisser souris/doigt). --}}
    @php
        $domainList = $actionDomains instanceof \Illuminate\Support\Collection ? $actionDomains : collect($actionDomains);
        $domainBgPhotos = ['village.jpg', 'family.jpg', 'statue.jpg', 'sunset.jpg'];
    @endphp
    <section class="bg-[#F3EDE0] py-20 reveal">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex items-end justify-between mb-10 flex-wrap gap-4">
                <div>
                    <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">TUBAWWIRI</p>
                    <h2 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.home.domains_title') }}</h2>
                </div>
                <a href="{{ route('action-domains.index', app()->getLocale()) }}" class="text-xs font-bold uppercase tracking-wider text-[#6B2A28] border-b border-[#6B2A28] pb-0.5">
                    {{ __('pages.read_more') }} →
                </a>
            </div>

            <div class="relative flex items-center gap-3 sm:gap-5">
                <button type="button" aria-label="{{ __('pages.previous') }}" data-domains-prev
                        class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-[#C99A3E] hover:bg-[#C99A3E] hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <div id="domains-slideshow" class="domains-slideshow relative flex-1 h-[520px] rounded-3xl overflow-hidden shadow-sm" data-autoplay-ms="4200">
                    @foreach ($domainList as $i => $domain)
                        @php
                            $photoUrl = $domain->cover_image ? asset('storage/' . $domain->cover_image) : asset('images/community/' . $domainBgPhotos[$i % count($domainBgPhotos)]);
                        @endphp
                        <a href="{{ route('action-domains.show', [app()->getLocale(), $domain->slug]) }}"
                           class="domains-slide absolute inset-0 {{ $i === 0 ? 'is-active' : '' }}" data-index="{{ $i }}">
                            <img src="{{ $photoUrl }}" alt="" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/92 via-[#123D2E]/40 to-transparent"></div>
                            <div class="absolute inset-x-0 bottom-0 p-6 md:p-8 border-l-2 border-[#C99A3E]">
                                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</p>
                                <p class="font-display text-2xl md:text-3xl font-semibold text-white mt-1">{{ localized($domain, 'title') }}</p>
                                <p class="text-white/80 text-sm mt-1 max-w-md line-clamp-2">{{ localized($domain, 'summary') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <button type="button" aria-label="{{ __('pages.next') }}" data-domains-next
                        class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-[#C99A3E] shadow-md items-center justify-center text-[#123D2E] hover:bg-[#b3872f] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>

            <div class="flex sm:hidden items-center justify-between mt-4">
                <button type="button" data-domains-prev class="text-xs font-bold uppercase tracking-wider text-[#C99A3E]">← {{ __('pages.previous') }}</button>
                <button type="button" data-domains-next class="text-xs font-bold uppercase tracking-wider text-[#C99A3E]">{{ __('pages.next') }} →</button>
            </div>

            <div class="flex items-center justify-center gap-2 mt-6" data-domains-dots>
                @foreach ($domainList as $i => $domain)
                    <button type="button" aria-label="{{ $i + 1 }}/{{ $domainList->count() }}" data-domains-dot="{{ $i }}"
                            class="w-2.5 h-2.5 rounded-full transition {{ $i === 0 ? 'bg-[#C99A3E]' : 'bg-[#d8cfb8] hover:bg-[#C99A3E]/50' }}"></button>
                @endforeach
            </div>
        </div>

        <style>
            .domains-slide { opacity: 0; transition: opacity 0.8s ease; pointer-events: none; touch-action: pan-y; display: block; }
            .domains-slide.is-active { opacity: 1; pointer-events: auto; }
            .domains-slide img { -webkit-user-drag: none; user-drag: none; }
        </style>
        <script>
            (function () {
                var root = document.getElementById('domains-slideshow');
                if (!root) return;
                var section = root.closest('section');
                var slides = root.querySelectorAll('.domains-slide');
                var dots = section.querySelectorAll('[data-domains-dot]');
                var total = slides.length;
                if (!total) return;
                var current = 0;
                var timer = null;
                var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

                function show(index) {
                    current = (index + total) % total;
                    slides.forEach(function (slide, i) { slide.classList.toggle('is-active', i === current); });
                    dots.forEach(function (dot, i) {
                        dot.classList.toggle('bg-[#C99A3E]', i === current);
                        dot.classList.toggle('bg-[#d8cfb8]', i !== current);
                    });
                }
                function next() { show(current + 1); }
                function prev() { show(current - 1); }

                function start() {
                    if (timer || reduceMotion) return;
                    timer = setInterval(next, parseInt(root.dataset.autoplayMs, 10) || 4200);
                }
                function stop() {
                    clearInterval(timer);
                    timer = null;
                }

                section.querySelectorAll('[data-domains-prev]').forEach(function (btn) { btn.addEventListener('click', function (e) { e.preventDefault(); prev(); stop(); start(); }); });
                section.querySelectorAll('[data-domains-next]').forEach(function (btn) { btn.addEventListener('click', function (e) { e.preventDefault(); next(); stop(); start(); }); });
                dots.forEach(function (dot, i) { dot.addEventListener('click', function () { show(i); stop(); start(); }); });

                root.addEventListener('mouseenter', stop);
                root.addEventListener('mouseleave', start);

                // Glisser à la souris/au doigt — gauche = suivant, droite = précédent
                var startX = 0, dragging = false, moved = 0;
                root.addEventListener('mousedown', function (e) { dragging = true; moved = 0; startX = e.pageX; stop(); });
                root.addEventListener('touchstart', function (e) { dragging = true; moved = 0; startX = e.touches[0].pageX; stop(); }, { passive: true });
                window.addEventListener('mousemove', function (e) { if (dragging) moved = Math.max(moved, Math.abs(e.pageX - startX)); });
                window.addEventListener('mouseup', function (e) {
                    if (!dragging) return;
                    dragging = false;
                    var delta = e.pageX - startX;
                    if (Math.abs(delta) > 80) {
                        var activeLink = root.querySelector('.domains-slide.is-active');
                        if (activeLink) {
                            var suppress = function (ev) { ev.preventDefault(); activeLink.removeEventListener('click', suppress, true); };
                            activeLink.addEventListener('click', suppress, true);
                        }
                        delta < 0 ? next() : prev();
                    }
                    start();
                });
                root.addEventListener('touchend', function (e) {
                    if (!dragging) return;
                    dragging = false;
                    var delta = e.changedTouches[0].pageX - startX;
                    if (Math.abs(delta) > 80) { delta < 0 ? next() : prev(); }
                    start();
                }, { passive: true });

                start();
            })();
        </script>
    </section>

    {{-- ===== CAVAMIS ===== --}}
    @php
        $cavamisPillars = [
            ['key' => 'cavamis_ecoute', 'icon' => '<circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="1.6"/><path stroke-linecap="round" d="M9 9v6M12 7v10M15 9v6"/>'],
            ['key' => 'cavamis_conseil', 'icon' => '<path d="M4 5h16v10H8l-4 4V5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>'],
            ['key' => 'cavamis_sensibilisation', 'icon' => '<path d="M3 10v4h3l5 4V6L6 10H3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path stroke-linecap="round" d="M16 9a4 4 0 0 1 0 6"/>'],
            ['key' => 'cavamis_eveil', 'icon' => '<circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="1.6"/><path stroke-linecap="round" d="M12 3v2M12 19v2M4 12H2M22 12h-2M5.5 5.5l1.4 1.4M17.1 17.1l1.4 1.4M18.5 5.5l-1.4 1.4M6.9 17.1l-1.4 1.4"/>'],
            ['key' => 'cavamis_motivation', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" fill="none" stroke="currentColor" stroke-width="1.6" d="M12 19V5M6 11l6-6 6 6"/>'],
            ['key' => 'cavamis_transmission', 'icon' => '<path d="M4 5.5C4 4.7 4.7 4 5.5 4H12v16H5.5A1.5 1.5 0 0 1 4 18.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H12v16h6.5a1.5 1.5 0 0 0 1.5-1.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>'],
            ['key' => 'cavamis_action', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" fill="none" stroke="currentColor" stroke-width="1.6" d="M5 3v18M5 4h11l-2.5 3.5L16 11H5"/>'],
        ];
    @endphp
    <section class="relative overflow-hidden bg-[#123D2E] text-white py-20 reveal">
        {{-- Filigrane du vrai logo (arbre + soleil + texte arqué + racines) --}}
        <img src="{{ asset('images/logo-mark.png') }}" alt=""
             class="ambient-bg-motif absolute -top-24 -right-16 w-[560px] md:w-[720px] h-auto opacity-[0.07] pointer-events-none hidden lg:block"
             style="filter: invert(1) brightness(1.7) contrast(0.9);"
             aria-hidden="true">

        <div class="relative max-w-7xl mx-auto px-4">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Méthodologie</p>
            <div class="w-10 h-[2px] bg-[#C99A3E] mt-3"></div>
            <h3 class="font-display text-3xl md:text-4xl font-semibold mt-3">{{ __('site.home.method_title') }}</h3>
            <p class="text-sm text-[#C99A3E] italic mt-3">{{ __('site.home.method_acronym') }}</p>
            <p class="text-sm text-[#8fae9d] mt-2 leading-relaxed">{{ __('site.home.method_subtitle') }}</p>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-10">
                @foreach ($cavamisPillars as $pillar)
                    <div class="hover-lift border border-white/15 bg-white/[0.03] rounded-2xl p-5">
                        <div class="w-11 h-11 rounded-full bg-[#0b261c] border border-[#C99A3E]/30 flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $pillar['icon'] !!}</svg>
                        </div>
                        <p class="font-display font-semibold text-white mt-4 leading-snug">{{ __('site.home.' . $pillar['key']) }}</p>
                        <div class="w-8 h-[2px] bg-[#C99A3E]/60 mt-2 mb-2"></div>
                        <p class="text-xs text-[#8fae9d] leading-relaxed">{{ __('site.home.' . $pillar['key'] . '_desc') }}</p>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('approach', app()->getLocale()) }}"
               class="btn-tbw inline-flex items-center gap-2 mt-10 border border-[#C99A3E] text-[#C99A3E] hover:bg-[#C99A3E] hover:text-[#123D2E] px-6 py-3 text-xs font-bold uppercase tracking-wider">
                {{ __('site.nav.approach') }} →
            </a>
        </div>
    </section>

    {{-- ===== DOCTRINE DES 3T ===== --}}
    {{-- Diaporama séquentiel (une image à la fois, façon PowerPoint) sur demande
         explicite de la Fondatrice (28/08/2026) — remplace l'ancienne grille de
         3 cartes simultanées. Images : symboletesimama/tolamuke/telumiere (les
         mêmes posters, en version haute résolution "Symbole du défi X.jpeg" —
         490x630 dans la version demandée, 1254x1254 dans cette variante, même
         visuel, juste plus net une fois recadré en grand format). --}}
    <section class="bg-[#F3EDE0] py-20 reveal">
        <div class="max-w-4xl mx-auto px-4">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Doctrine</p>
            <h3 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.home.doctrine_title') }}</h3>

            @php
                $doctrineSteps = [
                    ['name' => 'TESIMAMA', 'text' => __('site.home.tesimama'), 'photo' => 'tesimama-symbole.jpg'],
                    ['name' => 'TOLAMUKE', 'text' => __('site.home.tolamuke'), 'photo' => 'tolamuke-symbole.jpg'],
                    ['name' => 'TELUMIERE', 'text' => __('site.home.telumiere'), 'photo' => 'telumiere-symbole.jpg'],
                ];
            @endphp

            <div class="relative mt-10 flex items-center gap-3 sm:gap-5">
                <button type="button" aria-label="{{ __('pages.previous') }}" data-doctrine-prev
                        class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-[#C99A3E] hover:bg-[#C99A3E] hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <div id="doctrine-slideshow" class="doctrine-slideshow relative flex-1 h-[520px] rounded-3xl overflow-hidden shadow-sm" data-autoplay-ms="4200">
                    @foreach ($doctrineSteps as $i => $step)
                        <div class="doctrine-slide absolute inset-0 {{ $i === 0 ? 'is-active' : '' }}" data-index="{{ $i }}">
                            <img src="{{ asset('images/doctrine/' . $step['photo']) }}" alt=""
                                 class="absolute inset-0 w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/92 via-[#123D2E]/40 to-transparent"></div>
                            <div class="absolute inset-x-0 bottom-0 p-6 md:p-8 border-l-2 border-[#C99A3E]">
                                <p class="font-display text-3xl italic text-white">{{ $step['name'] }}</p>
                                <p class="text-white/80 text-sm mt-1 max-w-md">{{ $step['text'] }}</p>
                            </div>
                            <p class="absolute top-5 right-5 text-[11px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">0{{ $i + 1 }} / {{ count($doctrineSteps) }}</p>
                        </div>
                    @endforeach
                </div>

                <button type="button" aria-label="{{ __('pages.next') }}" data-doctrine-next
                        class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-[#C99A3E] shadow-md items-center justify-center text-[#123D2E] hover:bg-[#b3872f] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>

            <div class="flex sm:hidden items-center justify-between mt-4">
                <button type="button" data-doctrine-prev class="text-xs font-bold uppercase tracking-wider text-[#C99A3E]">← {{ __('pages.previous') }}</button>
                <button type="button" data-doctrine-next class="text-xs font-bold uppercase tracking-wider text-[#C99A3E]">{{ __('pages.next') }} →</button>
            </div>

            <div class="flex items-center justify-center gap-2 mt-6" data-doctrine-dots>
                @foreach ($doctrineSteps as $i => $step)
                    <button type="button" aria-label="{{ $i + 1 }}/{{ count($doctrineSteps) }}" data-doctrine-dot="{{ $i }}"
                            class="w-2.5 h-2.5 rounded-full transition {{ $i === 0 ? 'bg-[#C99A3E]' : 'bg-[#d8cfb8] hover:bg-[#C99A3E]/50' }}"></button>
                @endforeach
            </div>
        </div>

        <style>
            .doctrine-slide { opacity: 0; transition: opacity 0.8s ease; pointer-events: none; touch-action: pan-y; }
            .doctrine-slide.is-active { opacity: 1; pointer-events: auto; }
            .doctrine-slide img { -webkit-user-drag: none; user-drag: none; }
        </style>
        <script>
            (function () {
                var root = document.getElementById('doctrine-slideshow');
                if (!root) return;
                var section = root.closest('section');
                var slides = root.querySelectorAll('.doctrine-slide');
                var dots = section.querySelectorAll('[data-doctrine-dot]');
                var total = slides.length;
                var current = 0;
                var timer = null;
                var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

                function show(index) {
                    current = (index + total) % total;
                    slides.forEach(function (slide, i) {
                        slide.classList.toggle('is-active', i === current);
                    });
                    dots.forEach(function (dot, i) {
                        dot.classList.toggle('bg-[#C99A3E]', i === current);
                        dot.classList.toggle('bg-[#d8cfb8]', i !== current);
                    });
                }
                function next() { show(current + 1); }
                function prev() { show(current - 1); }

                function start() {
                    if (timer || reduceMotion) return;
                    timer = setInterval(next, parseInt(root.dataset.autoplayMs, 10) || 4200);
                }
                function stop() {
                    clearInterval(timer);
                    timer = null;
                }

                section.querySelectorAll('[data-doctrine-prev]').forEach(function (btn) { btn.addEventListener('click', function () { prev(); stop(); start(); }); });
                section.querySelectorAll('[data-doctrine-next]').forEach(function (btn) { btn.addEventListener('click', function () { next(); stop(); start(); }); });
                dots.forEach(function (dot, i) { dot.addEventListener('click', function () { show(i); stop(); start(); }); });

                root.addEventListener('mouseenter', stop);
                root.addEventListener('mouseleave', start);

                // Glisser à la souris/au doigt — gauche = suivant, droite = précédent
                var startX = 0, dragging = false;
                root.addEventListener('mousedown', function (e) { dragging = true; startX = e.pageX; stop(); });
                root.addEventListener('touchstart', function (e) { dragging = true; startX = e.touches[0].pageX; stop(); }, { passive: true });
                window.addEventListener('mouseup', function (e) {
                    if (!dragging) return;
                    dragging = false;
                    var delta = e.pageX - startX;
                    if (Math.abs(delta) > 80) { delta < 0 ? next() : prev(); }
                    start();
                });
                root.addEventListener('touchend', function (e) {
                    if (!dragging) return;
                    dragging = false;
                    var delta = e.changedTouches[0].pageX - startX;
                    if (Math.abs(delta) > 80) { delta < 0 ? next() : prev(); }
                    start();
                }, { passive: true });

                start();
            })();
        </script>
    </section>

    {{-- ===== ACTUALITÉS + IMPACT + REJOINDRE ===== --}}
    <section class="max-w-7xl mx-auto px-4 py-20 grid lg:grid-cols-3 gap-10 reveal">
        <div class="lg:col-span-1">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em] mb-5">{{ __('site.home.news_title') }}</p>
            <div class="space-y-4">
                @forelse ($latestArticles as $article)
                    <a href="{{ route('news.show', [app()->getLocale(), $article->slug]) }}"
                       class="block group bg-white border-t-2 border-[#C99A3E] border-x border-b border-x-[#eadfca] border-b-[#eadfca] rounded-2xl p-5 hover-lift">
                        <p class="text-sm font-semibold text-[#123D2E] group-hover:text-[#6B2A28]">{{ localized($article, 'title') }}</p>
                        <p class="text-xs text-[#6F6759] mt-2 line-clamp-2">{{ localized($article, 'excerpt') }}</p>
                    </a>
                @empty
                    <p class="text-sm text-[#6F6759]">{{ __('pages.no_news') }}</p>
                @endforelse
            </div>
        </div>

        <div class="lg:col-span-1">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em] mb-5">{{ __('site.home.impact_title') }}</p>
            <div class="grid grid-cols-2 gap-4">
                @foreach ($impactStats as $stat)
                    <div class="bg-white border-t-2 border-[#C99A3E] border-x border-b border-x-[#eadfca] border-b-[#eadfca] rounded-2xl p-5 hover-lift">
                        <svg class="w-5 h-5 text-[#6B2A28]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 2 4 14h6l-1 8 9-12h-6l1-8Z"/></svg>
                        <p class="font-display text-3xl font-semibold text-[#123D2E] mt-2">+{{ number_format($stat->value, 0, ',', ' ') }}</p>
                        <p class="text-xs text-[#6F6759] mt-2 leading-snug">{{ localized($stat, 'label') }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="lg:col-span-1 relative overflow-hidden rounded-3xl p-8 min-h-[280px] flex flex-col justify-end hover-lift">
            <img src="{{ asset('images/community/femme-lance.png') }}" alt="" class="absolute inset-0 w-full h-full object-cover object-top">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/95 via-[#123D2E]/70 to-[#123D2E]/30"></div>
            <p class="relative text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ __('site.home.join_title') }}</p>
            <p class="relative font-display italic text-2xl mt-3 text-white">{{ __('site.home.join_subtitle') }}</p>
            <div class="relative mt-8 space-y-3 text-sm">
                <a href="{{ route('join.index', app()->getLocale()) }}" class="block text-white border-b border-white/15 pb-2 hover:text-[#C99A3E] transition">{{ __('site.nav.join') }} →</a>
                <a href="{{ route('contact.index', app()->getLocale()) }}" class="block text-white border-b border-white/15 pb-2 hover:text-[#C99A3E] transition">{{ __('site.home.cta_partner') }} →</a>
                <a href="{{ route('donation.index', app()->getLocale()) }}" class="btn-tbw inline-flex mt-4 bg-[#C99A3E] text-[#123D2E] px-5 py-2.5 text-xs font-bold uppercase tracking-wider hover:bg-[#b3872f]">
                    {{ __('site.home.cta_donate') }}
                </a>
            </div>
        </div>
    </section>

@endsection
