@extends('layouts.app')

@section('title', "Domaines d'action — Fondation TUBAWWIRI (TBW)")

@section('content')
    <x-page-hero image="community/family.jpg" :title="__('site.home.domains_title')" :intro="__('pages.domains_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
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

        <div class="flex items-center justify-center gap-2 mt-6">
            @foreach ($actionDomains as $i => $domain)
                <button type="button" aria-label="{{ $i + 1 }}/{{ $actionDomains->count() }}"
                        onclick="document.getElementById('scroll-domains').scrollTo({left: {{ $i * 250 }}, behavior: 'smooth'})"
                        class="w-2.5 h-2.5 rounded-full transition {{ $i === 0 ? 'bg-[#C99A3E]' : 'bg-[#d8cfb8] hover:bg-[#C99A3E]/50' }}"></button>
            @endforeach
        </div>
    </section>
@endsection
