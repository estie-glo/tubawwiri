@extends('layouts.app')

@section('title', (localized($page, 'meta_title') ?? localized($page, 'title')) . ' — ' . ($block['heading'] ?? '') . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', localized($page, 'meta_description'))

@section('content')
    @php
        $locale = app()->getLocale();
        $routeBase = $page->slug === 'notre-approche' ? 'approach' : 'about';
        $urlFor = fn (int $n) => $n <= 1 ? route($routeBase, $locale) : route($routeBase . '.show', [$locale, $n]);
        $isWatermark = $page->slug === 'notre-approche';
        $bgPhotos = ['village.jpg', 'family.jpg', 'statue.jpg', 'sunset.jpg'];
        $photo = $bgPhotos[($position - 1) % count($bgPhotos)];

        $icons = [
            '<path d="M12 21v-9m0 0c0-4.5-3-7-7-7 0 4.5 2.5 7 7 7Zm0 0c0-4.5 3-7 7-7 0 4.5-2.5 7-7 7Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>',
            '<circle cx="8" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="16" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3M11.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
            '<circle cx="12" cy="6.5" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M12 8.8v6M8 21l4-6 4 6M9 12h6" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>',
            '<path d="M9 4c-2 2-2.5 4.5-1.5 7-2 .5-3.5 2-4 4 2.5 1 5-.5 6-2.5 1 2.5 3.5 4 6 3.5-1-2-3-3-4.5-3 2-2 2-4.5.5-7-1 2-2.5 2.5-3.5 1.5-.5-1.5 0-2.5 1-3.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path stroke-linecap="round" d="m13 2 -9 12h6l-1 8 9-12h-6l1-8Z" fill="none"/>',
            '<circle cx="12" cy="12" r="3.4" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M2.5 12s3.2-6 9.5-6 9.5 6 9.5 6-3.2 6-9.5 6-9.5-6-9.5-6Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>',
            '<path d="M12 3.5 4.5 6v5c0 5 3 8 7.5 9.5C16.5 19 19.5 16 19.5 11V6L12 3.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            '<path d="M12 2.5 14 9h6.5l-5.3 4 2 6.5L12 15.8 6.8 19.5l2-6.5-5.3-4H10L12 2.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
        ];
        $icon = $icons[($position - 1) % count($icons)];

        // Les paragraphes d'introduction (avant tout <h3>) n'ont pas de titre
        // en base — on dérive un titre visuel depuis la première phrase,
        // pour reproduire fidèlement le rendu validé par la Fondatrice
        // (exemplequisommesnous.jpeg / exemplenotreapproche.jpeg, section 3.12.4).
        $title = $block['heading'];
        $bodyHtml = $block['html'];
        if (! $title) {
            $plain = trim(strip_tags($block['html']));
            if (preg_match('/^(.+?[.!?])\s+(.*)$/su', $plain, $m)) {
                $title = $m[1];
                $bodyHtml = '<p>' . e($m[2]) . '</p>';
            } else {
                $title = $plain;
                $bodyHtml = '';
            }
        }
    @endphp

    <section class="min-h-[70vh] flex flex-col items-center justify-center px-4 py-16 reveal">
        <div class="w-full max-w-5xl">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em] text-center mb-2">Fondation TUBAWWIRI (TBW)</p>
            <h1 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E] text-center mb-10">
                {{ localized($page, 'title') }}
            </h1>

            <div class="relative flex items-center gap-3 sm:gap-5">
                <a href="{{ $urlFor(max($position - 1, 1)) }}" id="page-nav-prev" aria-label="{{ __('pages.previous') }}" data-first-url="{{ $urlFor(1) }}"
                   class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-[#C99A3E] hover:bg-[#C99A3E] hover:text-white transition {{ $position <= 1 ? 'opacity-30 pointer-events-none' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </a>

                <div class="page-swipe-card relative flex-1 bg-white rounded-[2.5rem] overflow-hidden shadow-sm min-h-[420px] p-8 md:p-14">
                    <img src="{{ asset('images/community/' . $photo) }}" alt=""
                         class="absolute inset-0 w-full h-full object-cover hero-kenburns {{ $isWatermark ? 'opacity-[0.08]' : 'opacity-90' }}">
                    @unless ($isWatermark)
                        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/75 to-white/10"></div>
                    @endunless

                    <div class="relative z-10 max-w-lg">
                        <p class="text-xs font-bold text-[#C99A3E] tracking-[0.2em]">
                            {{ str_pad($position, 2, '0', STR_PAD_LEFT) }}
                        </p>
                        <div class="w-14 h-14 rounded-full bg-[#123D2E] border-2 border-[#C99A3E] flex items-center justify-center mt-4">
                            <svg class="w-6 h-6 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $icon !!}</svg>
                        </div>
                        <h2 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E] mt-5 leading-snug">
                            {{ $title }}
                        </h2>
                        <div class="w-12 h-[3px] bg-[#C99A3E] mt-4 mb-4"></div>
                        @if ($bodyHtml)
                            <div class="prose max-w-none text-[#4a453c] leading-relaxed">{!! $bodyHtml !!}</div>
                        @endif
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
