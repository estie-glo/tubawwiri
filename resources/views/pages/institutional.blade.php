@extends('layouts.app')

@section('title', (localized($page, 'meta_title') ?? localized($page, 'title')) . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', localized($page, 'meta_description'))

@section('content')
    @php
        $blocks = split_content_blocks(localized($page, 'content'));
        $bgPhotos = ['village.jpg', 'family.jpg', 'statue.jpg', 'sunset.jpg'];
        $scrollId = 'scroll-' . $page->slug;
    @endphp

    <section class="py-20 reveal">
        <div class="max-w-7xl mx-auto px-4">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
            <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">
                {{ localized($page, 'title') }}
            </h1>
        </div>

        @if (count($blocks))
            <div class="relative mt-10">
                <div id="{{ $scrollId }}" class="content-scroll-viewport px-4">
                    <div class="content-scroll-track gap-5 max-w-7xl mx-auto">
                        @foreach ($blocks as $i => $block)
                            <div class="content-card group relative w-[320px] sm:w-[380px] min-h-[420px] shrink-0 overflow-hidden hover-lift">
                                <img src="{{ asset('images/community/' . $bgPhotos[$i % count($bgPhotos)]) }}" alt=""
                                     class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/93 via-[#123D2E]/70 to-[#123D2E]/35"></div>
                                <div class="relative z-10 flex flex-col h-full p-7">
                                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">0{{ $i + 1 }}</p>
                                    @if ($block['heading'])
                                        <h3 class="font-display text-xl font-semibold text-white mt-3">{{ $block['heading'] }}</h3>
                                    @endif
                                    <div class="prose max-w-none text-white/85 mt-3 text-sm leading-relaxed">
                                        {!! $block['html'] !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="button" aria-label="{{ __('pages.scroll_next') }}"
                        onclick="document.getElementById('{{ $scrollId }}').scrollBy({left: 400, behavior: 'smooth'})"
                        class="scroll-arrow-btn hidden md:flex absolute right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-[#C99A3E] text-[#123D2E] items-center justify-center shadow-lg z-20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        @endif
    </section>
@endsection
