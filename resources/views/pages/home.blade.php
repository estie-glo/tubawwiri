@extends('layouts.app')

@section('title', __('site.home.title') . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('site.home.intro'))

@section('content')

    {{-- ===== HERO FULL-BLEED ===== --}}
    <section class="relative min-h-[88vh] flex items-end overflow-hidden">
        <img src="{{ asset('images/banner-tubawwiri-corrige.png') }}"
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
    @php
        $domainList = $actionDomains instanceof \Illuminate\Support\Collection ? $actionDomains : collect($actionDomains);
    @endphp
    <section class="bg-[#F3EDE0] py-20 reveal">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-end justify-between mb-10 flex-wrap gap-4">
                <div>
                    <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">TUBAWWIRI</p>
                    <h2 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.home.domains_title') }}</h2>
                </div>
                <a href="{{ route('action-domains.index', app()->getLocale()) }}" class="text-xs font-bold uppercase tracking-wider text-[#6B2A28] border-b border-[#6B2A28] pb-0.5">
                    {{ __('pages.read_more') }} →
                </a>
            </div>

            <div class="relative">
                <div id="scroll-domains" class="content-scroll-viewport">
                    <div class="content-scroll-track gap-5">
                        @foreach ($domainList as $i => $domain)
                            <div class="w-[230px] shrink-0">
                                <x-domain-card :domain="$domain" :index="$i" :highlighted="$i === 0" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="button" aria-label="{{ __('pages.scroll_next') }}"
                        onclick="document.getElementById('scroll-domains').scrollBy({left: 260, behavior: 'smooth'})"
                        class="scroll-arrow-btn hidden md:flex absolute -right-4 top-[45%] -translate-y-1/2 w-11 h-11 rounded-full bg-[#C99A3E] text-[#123D2E] items-center justify-center shadow-lg z-20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
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
        {{-- Filigrane soleil/arbre + texte arqué "TESIMAMA TOLAMUKE TELUMIERE" --}}
        <svg class="absolute -top-10 right-0 w-[420px] h-[420px] text-[#C99A3E]/10 pointer-events-none hidden lg:block" viewBox="0 0 200 200" fill="none" aria-hidden="true">
            <path id="cavamis-arc" d="M 30 130 A 70 70 0 1 1 170 130" fill="none" stroke="none"/>
            <text font-size="9" letter-spacing="2" fill="currentColor" font-weight="600">
                <textPath href="#cavamis-arc" startOffset="50%" text-anchor="middle">TESIMAMA • TOLAMUKE • TELUMIÈRE</textPath>
            </text>
            <g stroke="currentColor" stroke-width="2">
                <path d="M100 100 100 20M100 100 137 27M100 100 165 55M100 100 178 92M100 100 100 180M100 100 63 173M100 100 35 145M100 100 22 108M100 100 137 173M100 100 63 27"/>
            </g>
            <circle cx="100" cy="100" r="22" stroke="currentColor" stroke-width="2"/>
            <path d="M100 122v34M100 122c-10-8-14-18-10-30M100 122c10-8 14-18 10-30M90 156h20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
        <svg class="absolute -bottom-16 -left-10 w-64 h-64 text-[#C99A3E]/10 pointer-events-none hidden lg:block" viewBox="0 0 100 100" fill="none" aria-hidden="true">
            <path d="M50 10v40M50 50c-15 5-25 18-28 40M50 50c-8 10-12 22-11 42M50 50c8 10 12 22 11 42M50 50c15 5 25 18 28 40" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>

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
    <section class="bg-[#F3EDE0] py-20 reveal">
        <div class="max-w-7xl mx-auto px-4">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Doctrine</p>
            <h3 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.home.doctrine_title') }}</h3>

            <div class="grid md:grid-cols-3 gap-5 mt-10">
                @php
                    $doctrineSteps = [
                        ['name' => 'TESIMAMA', 'text' => __('site.home.tesimama'), 'photo' => 'tesimama.jpg', 'accent' => '#C99A3E'],
                        ['name' => 'TOLAMUKE', 'text' => __('site.home.tolamuke'), 'photo' => 'tolamuke.jpg', 'accent' => '#C99A3E'],
                        ['name' => 'TELUMIERE', 'text' => __('site.home.telumiere'), 'photo' => 'telumiere.jpg', 'accent' => '#9b7fd1'],
                    ];
                @endphp
                @foreach ($doctrineSteps as $step)
                    <div class="group relative h-[480px] overflow-hidden rounded-3xl hover-lift">
                        <img src="{{ asset('images/doctrine/' . $step['photo']) }}" alt=""
                             class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/92 via-[#123D2E]/45 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-6 border-l-2" style="border-color: {{ $step['accent'] }};">
                            <p class="font-display text-2xl italic text-white">{{ $step['name'] }}</p>
                            <p class="text-white/80 text-sm mt-1">{{ $step['text'] }}</p>
                        </div>
                        <p class="absolute top-4 right-4 text-[11px] font-bold uppercase tracking-[0.2em]" style="color: {{ $step['accent'] }};">0{{ $loop->iteration }}</p>
                    </div>
                @endforeach
            </div>
        </div>
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
