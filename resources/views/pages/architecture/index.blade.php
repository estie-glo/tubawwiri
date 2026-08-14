@extends('layouts.app')

@section('title', __('architecture.title') . ' — ' . $volet['name'] . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('architecture.intro'))

@section('content')
    @php
        $locale = app()->getLocale();
        $urlFor = fn (int $n) => $n <= 1 ? route('architecture.index', $locale) : route('architecture.show', [$locale, $n]);
        $bgPhotos = ['village.jpg', 'family.jpg', 'statue.jpg', 'sunset.jpg'];
        $photo = $bgPhotos[($position - 1) % count($bgPhotos)];

        $icons = [
            '<path d="M12 21v-9m0 0c0-4.5-3-7-7-7 0 4.5 2.5 7 7 7Zm0 0c0-4.5 3-7 7-7 0 4.5-2.5 7-7 7Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>',
            '<path d="M4 5h16v10H8l-4 4V5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<path d="M9 4c-2 2-2.5 4.5-1.5 7-2 .5-3.5 2-4 4 2.5 1 5-.5 6-2.5 1 2.5 3.5 4 6 3.5-1-2-3-3-4.5-3 2-2 2-4.5.5-7-1 2-2.5 2.5-3.5 1.5-.5-1.5 0-2.5 1-3.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<circle cx="12" cy="12" r="2.6" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M12 3v3.5M12 17.5V21M3 12h3.5M17.5 12H21M5.6 5.6l2.5 2.5M15.9 15.9l2.5 2.5M18.4 5.6l-2.5 2.5M8.1 15.9l-2.5 2.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
            '<path d="M12 21s-7-4.5-7-10a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 5.5-7 10-7 10-1.3-1-2.6-1.9-4-3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<path d="M12 3.5 4.5 6v5c0 5 3 8 7.5 9.5C16.5 19 19.5 16 19.5 11V6L12 3.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<rect x="3.5" y="7" width="17" height="13" rx="1.2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M8 7V5.5A1.5 1.5 0 0 1 9.5 4h5A1.5 1.5 0 0 1 16 5.5V7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
            '<path d="M3 10v4h3l5 4V6L6 10H3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path stroke-linecap="round" d="M16 9a4 4 0 0 1 0 6"/>',
            '<path d="M12 2.5 14 9h6.5l-5.3 4 2 6.5L12 15.8 6.8 19.5l2-6.5-5.3-4H10L12 2.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<path d="M4 5.5C4 4.7 4.7 4 5.5 4H12v16H5.5A1.5 1.5 0 0 1 4 18.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H12v16h6.5a1.5 1.5 0 0 0 1.5-1.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path stroke-linecap="round" d="M4 12h16M12 3.5c2.2 2.4 3.4 5.4 3.4 8.5s-1.2 6.1-3.4 8.5c-2.2-2.4-3.4-5.4-3.4-8.5S9.8 5.9 12 3.5Z"/>',
            '<path d="M4 20V10M10 20V4M16 20v-7M22 20H2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
        ];
        $icon = $icons[($position - 1) % count($icons)];
    @endphp

    <section class="min-h-[70vh] flex flex-col items-center justify-center px-4 py-16 reveal">
        <div class="w-full max-w-5xl">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em] text-center mb-2">Fondation TUBAWWIRI (TBW)</p>
            <h1 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E] text-center mb-10">
                {{ __('architecture.title') }}
            </h1>

            <div class="relative flex items-center gap-3 sm:gap-5">
                <a href="{{ $urlFor(max($position - 1, 1)) }}" aria-label="{{ __('pages.previous') }}"
                   class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-[#C99A3E] hover:bg-[#C99A3E] hover:text-white transition {{ $position <= 1 ? 'opacity-30 pointer-events-none' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </a>

                <div class="relative flex-1 bg-white rounded-[2.5rem] overflow-hidden shadow-sm min-h-[440px] p-8 md:p-14">
                    <img src="{{ asset('images/community/' . $photo) }}" alt=""
                         class="absolute inset-0 w-full h-full object-cover opacity-90">
                    <div class="absolute inset-0 bg-gradient-to-r from-white via-white/75 to-white/10"></div>

                    <div class="relative z-10 max-w-lg">
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
                </div>

                <a href="{{ $urlFor(min($position + 1, $total)) }}" aria-label="{{ __('pages.next') }}"
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
