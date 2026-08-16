@extends('layouts.app')

@section('title', "Domaines d'action — Fondation TUBAWWIRI (TBW)")

@section('content')
    <x-page-hero image="community/family.jpg" :title="__('site.home.domains_title')" :intro="__('pages.domains_intro')" />

    @php
        $cavamisPillars = [
            ['key' => 'cavamis_ecoute', 'desc' => __('pages.domains_cavamis_ecoute_desc'), 'icon' => '<circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="1.6"/><path stroke-linecap="round" d="M9 9v6M12 7v10M15 9v6"/>'],
            ['key' => 'cavamis_conseil', 'desc' => __('pages.domains_cavamis_conseil_desc'), 'icon' => '<path d="M4 5h16v10H8l-4 4V5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>'],
            ['key' => 'cavamis_sensibilisation', 'desc' => __('pages.domains_cavamis_sensibilisation_desc'), 'icon' => '<path d="M3 10v4h3l5 4V6L6 10H3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path stroke-linecap="round" d="M16 9a4 4 0 0 1 0 6"/>'],
            ['key' => 'cavamis_motivation', 'desc' => __('pages.domains_cavamis_motivation_desc'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" fill="none" stroke="currentColor" stroke-width="1.6" d="M12 19V5M6 11l6-6 6 6"/>'],
            ['key' => 'cavamis_action', 'desc' => __('pages.domains_cavamis_action_desc'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" fill="none" stroke="currentColor" stroke-width="1.6" d="M5 3v18M5 4h11l-2.5 3.5L16 11H5"/>'],
        ];
    @endphp

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="flex justify-end mb-6">
            <a href="#methode-cavamis" class="text-xs font-bold uppercase tracking-wider text-[#6B2A28] border-b border-[#6B2A28] pb-0.5">
                {{ __('pages.read_more') }} →
            </a>
        </div>

        <div class="relative">
            <div id="scroll-domains" class="content-scroll-viewport">
                <div class="content-scroll-track gap-5">
                    @foreach ($actionDomains as $i => $domain)
                        <div class="content-card w-[230px] shrink-0">
                            <x-domain-card :domain="$domain" :index="$i" :highlighted="$i === 0" />
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="button" aria-label="{{ __('pages.previous') }}"
                    onclick="document.getElementById('scroll-domains').scrollBy({left: -260, behavior: 'smooth'})"
                    class="scroll-arrow-btn hidden md:flex absolute -left-4 top-[40%] -translate-y-1/2 w-11 h-11 rounded-full bg-white text-[#C99A3E] items-center justify-center shadow-lg z-20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button type="button" aria-label="{{ __('pages.scroll_next') }}"
                    onclick="document.getElementById('scroll-domains').scrollBy({left: 260, behavior: 'smooth'})"
                    class="scroll-arrow-btn hidden md:flex absolute -right-4 top-[40%] -translate-y-1/2 w-11 h-11 rounded-full bg-[#C99A3E] text-[#123D2E] items-center justify-center shadow-lg z-20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </section>

    <section id="methode-cavamis" class="relative bg-[#123D2E] py-16 overflow-hidden reveal">
        <svg class="absolute -right-10 top-1/2 -translate-y-1/2 w-[420px] h-[420px] text-[#C99A3E]/10 pointer-events-none" viewBox="0 0 100 100" fill="none" aria-hidden="true">
            <path d="M50 50 50 5M50 50 71 12M50 50 88 29M50 50 95 50M50 50 5 50M50 50 29 12M50 50 12 29M50 50 71 88M50 50 12 71" stroke="currentColor" stroke-width="2"/>
            <circle cx="50" cy="50" r="16" stroke="currentColor" stroke-width="2"/>
        </svg>

        <div class="relative z-10 max-w-7xl mx-auto px-4">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ __('pages.domains_cavamis_kicker') }}</p>
            <h2 class="font-display text-2xl md:text-3xl font-semibold text-white mt-2">{{ __('pages.domains_cavamis_title') }}</h2>
            <p class="text-[#C99A3E] italic mt-2 text-sm">{{ __('pages.domains_cavamis_lead') }}</p>
            <p class="text-white/80 mt-1 text-sm max-w-xl">{{ __('pages.domains_cavamis_desc') }}</p>

            <div class="grid grid-cols-2 sm:grid-cols-5 gap-6 mt-10">
                @foreach ($cavamisPillars as $i => $pillar)
                    <div class="{{ $i > 0 ? 'sm:border-l sm:border-white/10 sm:pl-6' : '' }}">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $pillar['icon'] !!}</svg>
                            <p class="text-xs font-bold uppercase tracking-wider text-[#C99A3E]">{{ __('site.home.' . $pillar['key']) }}</p>
                        </div>
                        <p class="text-xs text-white/70 mt-2 leading-relaxed">{{ $pillar['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
