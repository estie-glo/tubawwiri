@extends('layouts.app')

@section('title', __('founder.title') . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('founder.quote'))

@section('content')
    @php
        $locale = app()->getLocale();
        $urlFor = fn (int $n) => $n <= 1 ? route('founder.index', $locale) : route('founder.show', [$locale, $n]);
        $badges = array_map('trim', explode('•', __('founder.credentials')));
        $badgeIcons = [
            '<path d="M12 3v18M6 8l-3 5.5a3.5 3.5 0 0 0 6 0L6 8Zm12 0-3 5.5a3.5 3.5 0 0 0 6 0L18 8ZM4 8h4l-2-2.5L4 8Zm12 0h4l-2-2.5L16 8ZM9 21h6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>',
            '<path d="M12 4 2 8l10 4 10-4-10-4Zm-7 6.5V16c0 1.5 3 3.5 7 3.5s7-2 7-3.5v-5.5M22 8v6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>',
            '<circle cx="12" cy="8" r="3.3" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M5 20c1-3.5 4-5.5 7-5.5s6 2 7 5.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
        ];
    @endphp

    <section class="relative min-h-[52vh] flex items-end overflow-hidden">
        <img src="{{ asset('images/founder/portrait-hero.jpg') }}" alt="{{ __('founder.name') }}"
             class="absolute inset-0 w-full h-full object-cover" style="object-position: 60% 20%;">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0b261c]/95 via-[#123D2E]/70 to-[#123D2E]/20"></div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 pb-10 pt-28">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
            <h1 class="font-display text-3xl md:text-5xl font-semibold text-white leading-[1.1] mt-3 max-w-xl">
                {{ __('founder.title') }}
            </h1>
            <p class="text-white/85 mt-4 max-w-lg text-sm md:text-base">{{ __('founder.role') }}</p>
        </div>
    </section>

    <section class="bg-[#123D2E] py-5 reveal">
        <div class="max-w-7xl mx-auto px-4 flex flex-wrap gap-x-10 gap-y-3">
            @foreach ($badges as $i => $badge)
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-white/10 border border-[#C99A3E]/50 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $badgeIcons[$i % count($badgeIcons)] !!}</svg>
                    </div>
                    <span class="text-sm text-white/90">{{ $badge }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="min-h-[60vh] flex flex-col items-center justify-center px-4 py-16 reveal">
        <div class="w-full max-w-5xl">
            <div class="relative flex items-center gap-3 sm:gap-5">
                <a href="{{ $urlFor(max($position - 1, 1)) }}" id="page-nav-prev" aria-label="{{ __('pages.previous') }}"
                   class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-[#C99A3E] hover:bg-[#C99A3E] hover:text-white transition {{ $position <= 1 ? 'opacity-30 pointer-events-none' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </a>

                <div class="relative flex-1 bg-white rounded-[2.5rem] overflow-hidden shadow-sm min-h-[360px] p-8 md:p-14 grid md:grid-cols-[1.4fr,1fr] gap-8 items-start">
                    <div>
                        <p class="text-xs font-bold text-[#C99A3E] tracking-[0.2em]">
                            {{ __('founder.name') }} · {{ str_pad($position, 2, '0', STR_PAD_LEFT) }} / {{ str_pad($total, 2, '0', STR_PAD_LEFT) }}
                        </p>
                        <div class="w-12 h-[3px] bg-[#C99A3E] mt-4 mb-5"></div>
                        <p class="text-[#4a453c] leading-relaxed text-base md:text-lg">{{ $paragraph }}</p>

                        @if ($position >= $total)
                            <div class="mt-8 border-t-2 border-[#C99A3E] bg-[#F6F1E4] rounded-2xl p-6 flex items-start gap-4">
                                <img src="{{ asset('images/founder/quote-card.jpg') }}" alt="{{ __('founder.name') }}"
                                     class="w-16 h-16 rounded-full object-cover shrink-0 hidden sm:block">
                                <div>
                                    <p class="font-display italic text-[#123D2E] leading-relaxed">« {{ __('founder.quote') }} »</p>
                                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mt-3">— {{ __('founder.name') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="hidden md:flex flex-col gap-4">
                        <div class="rounded-2xl overflow-hidden aspect-[4/5]">
                            <img src="{{ asset('images/founder/portrait-hero.jpg') }}" alt="{{ __('founder.name') }}"
                                 class="w-full h-full object-cover" style="object-position: 60% 20%;">
                        </div>
                        <div class="bg-[#F6F1E4] rounded-2xl p-5 flex items-center gap-3">
                            <img src="{{ asset('images/logo-mark.png') }}" alt="TUBAWWIRI" class="h-10 w-10 object-contain shrink-0">
                            <div>
                                <p class="font-display font-semibold text-[#123D2E] text-sm leading-tight">Fondation TUBAWWIRI (TBW)</p>
                                <p class="text-[10px] text-[#6B2A28] uppercase tracking-widest">{{ __('site.tagline') }}</p>
                            </div>
                        </div>
                    </div>
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

            <div class="flex items-center justify-center gap-2 mt-7">
                @for ($n = 1; $n <= $total; $n++)
                    <a href="{{ $urlFor($n) }}" aria-label="{{ $n }}/{{ $total }}"
                       class="w-2.5 h-2.5 rounded-full transition {{ $n === $position ? 'bg-[#C99A3E]' : 'bg-[#d8cfb8] hover:bg-[#C99A3E]/50' }}"></a>
                @endfor
            </div>
        </div>
    </section>
@endsection
