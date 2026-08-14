@extends('layouts.app')

@section('title', __('founder.title') . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('founder.quote'))

@section('content')
    <x-page-hero image="founder/portrait.jpg" :title="__('founder.title')" :intro="__('founder.role')" />

    <section class="py-16 reveal">
        <div class="max-w-2xl mx-auto px-4">
            <img src="{{ asset('images/founder/quote-card.jpg') }}" alt="{{ __('founder.name') }}"
                 class="w-full hover-lift">
            <p class="text-center text-xs text-[#6F6759] uppercase tracking-[0.2em] mt-4">
                {{ __('founder.credentials') }}
            </p>
        </div>
    </section>

    @php
        $bgPhotos = ['statue.jpg', 'sunset.jpg', 'village.jpg', 'family.jpg'];
        $paragraphs = __('founder.paragraphs');
    @endphp

    <section class="pb-20 reveal">
        <div class="max-w-7xl mx-auto px-4">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ __('founder.name') }}</p>
            <h2 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E] mt-2">
                {{ __('founder.title') }}
            </h2>
        </div>

        <div class="relative mt-10">
            <div id="scroll-founder" class="content-scroll-viewport px-4">
                <div class="content-scroll-track gap-5 max-w-7xl mx-auto">
                    @foreach ($paragraphs as $i => $paragraph)
                        <div class="content-card group relative w-[320px] sm:w-[380px] min-h-[380px] shrink-0 overflow-hidden hover-lift">
                            <img src="{{ asset('images/community/' . $bgPhotos[$i % count($bgPhotos)]) }}" alt=""
                                 class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/93 via-[#123D2E]/70 to-[#123D2E]/35"></div>
                            <div class="relative z-10 flex flex-col h-full p-7">
                                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">0{{ $i + 1 }}</p>
                                <p class="text-white/90 mt-3 text-sm leading-relaxed">{{ $paragraph }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="button" aria-label="{{ __('pages.scroll_next') }}"
                    onclick="document.getElementById('scroll-founder').scrollBy({left: 400, behavior: 'smooth'})"
                    class="scroll-arrow-btn hidden md:flex absolute right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-[#C99A3E] text-[#123D2E] items-center justify-center shadow-lg z-20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </section>
@endsection
