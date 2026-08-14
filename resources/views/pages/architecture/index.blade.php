@extends('layouts.app')

@section('title', __('architecture.title') . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('architecture.intro'))

@section('content')
    <x-page-hero image="doctrine/tolamuke.jpg" :title="__('architecture.title')" :intro="__('architecture.intro')" />

    @php
        $bgPhotos = ['village.jpg', 'family.jpg', 'statue.jpg', 'sunset.jpg'];
        $sections = __('architecture.sections');
        $locale = app()->getLocale();
    @endphp

    <section class="py-16 reveal">
        <div class="relative">
            <div id="scroll-architecture" class="content-scroll-viewport px-4">
                <div class="content-scroll-track gap-5 max-w-7xl mx-auto">
                    @foreach ($sections as $i => $section)
                        <div class="content-card group relative w-[340px] sm:w-[400px] min-h-[460px] shrink-0 overflow-hidden hover-lift">
                            <img src="{{ asset('images/community/' . $bgPhotos[$i % count($bgPhotos)]) }}" alt=""
                                 class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/95 via-[#123D2E]/75 to-[#123D2E]/40"></div>
                            <div class="relative z-10 flex flex-col h-full p-7">
                                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} / 12</p>
                                <h2 class="font-display text-lg font-semibold text-white mt-3 leading-snug">{{ $section['name'] }}</h2>
                                <div class="prose max-w-none text-white/85 mt-3 text-sm leading-relaxed overflow-y-auto">
                                    {!! $section['html'] !!}
                                </div>
                                @if (!empty($section['link']))
                                    <a href="{{ route($section['link']['route'], $locale) }}"
                                       class="mt-auto pt-4 inline-flex items-center gap-1.5 text-xs font-bold text-[#C99A3E] uppercase tracking-wider hover:text-white transition">
                                        {{ $section['link']['label'] }} →
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="button" aria-label="{{ __('pages.scroll_next') }}"
                    onclick="document.getElementById('scroll-architecture').scrollBy({left: 420, behavior: 'smooth'})"
                    class="scroll-arrow-btn hidden md:flex absolute right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-[#C99A3E] text-[#123D2E] items-center justify-center shadow-lg z-20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </section>
@endsection
