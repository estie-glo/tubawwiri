@extends('layouts.app')

@section('title', 'Nos impacts — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/statue.jpg" :title="__('site.home.impact_title')" :intro="__('pages.impact_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        @php
            $statIcons = [
                '<circle cx="8" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="16" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3M11.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
                '<path d="M12 21s-7-4.5-7-10a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 5.5-7 10-7 10-1.3-1-2.6-1.9-4-3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
                '<path d="M4 5.5C4 4.7 4.7 4 5.5 4H12v16H5.5A1.5 1.5 0 0 1 4 18.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H12v16h6.5a1.5 1.5 0 0 0 1.5-1.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
                '<circle cx="7" cy="9" r="2" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="17" cy="9" r="2" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="7" r="2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M2.8 18c.5-2.3 2.1-3.6 4.2-3.6M21.2 18c-.5-2.3-2.1-3.6-4.2-3.6M8.2 19c.6-2.6 2.1-4 3.8-4s3.2 1.4 3.8 4" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
            ];
        @endphp
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-5">
            @foreach ($stats as $i => $stat)
                <div class="reveal bg-white border border-[#eadfca] rounded-2xl p-8 text-center" style="transition-delay: {{ ($i % 4) * 80 }}ms">
                    <div class="w-11 h-11 rounded-full bg-[#F3EDE0] flex items-center justify-center mx-auto">
                        <svg class="w-5 h-5 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $statIcons[$i % count($statIcons)] !!}</svg>
                    </div>
                    <p class="font-display text-4xl font-semibold text-[#123D2E] mt-4">+{{ number_format($stat->value, 0, ',', ' ') }}</p>
                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mt-2">
                        {{ localized($stat, 'label') }}
                    </p>
                </div>
            @endforeach
        </div>

        @if ($testimonials->isNotEmpty())
            <div class="mt-20">
                <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ __('pages.testimonials') }}</p>
                <h2 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E] mt-2 mb-10">{{ __('pages.testimonials_subtitle') }}</h2>

                <div class="grid md:grid-cols-3 gap-5">
                    @foreach ($testimonials as $testimonial)
                        <div class="bg-white border border-[#eadfca] rounded-2xl p-8">
                            <p class="text-[#4a453c] leading-relaxed italic">« {{ localized($testimonial, 'content') }} »</p>
                            <div class="flex items-center gap-3 mt-5">
                                @if ($testimonial->photo)
                                    <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->nom }}" class="w-11 h-11 rounded-full object-cover shrink-0">
                                @else
                                    <span class="w-11 h-11 rounded-full bg-[#F3EDE0] flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="3.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M5 20c1-3.5 4-5.5 7-5.5s6 2 7 5.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                                    </span>
                                @endif
                                <div>
                                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest">{{ $testimonial->nom }}</p>
                                    @if ($testimonial->role)
                                        <p class="text-xs text-[#8a8372]">{{ $testimonial->role }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if ($testimonials->count() <= 2)
                        <div class="relative bg-[#F3EDE0] rounded-2xl overflow-hidden hidden md:block">
                            <svg class="absolute -bottom-4 -right-4 w-40 h-40 text-[#6B2A28]/10 pointer-events-none" viewBox="0 0 100 100" fill="none" aria-hidden="true">
                                <path d="M90 90C60 90 30 70 20 30M90 90C70 60 55 45 30 38M90 90C75 75 68 65 60 50" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <ellipse cx="55" cy="75" rx="7" ry="3" transform="rotate(-35 55 75)" fill="currentColor"/>
                                <ellipse cx="40" cy="58" rx="7" ry="3" transform="rotate(-45 40 58)" fill="currentColor"/>
                                <ellipse cx="28" cy="42" rx="6" ry="3" transform="rotate(-55 28 42)" fill="currentColor"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </section>
@endsection
