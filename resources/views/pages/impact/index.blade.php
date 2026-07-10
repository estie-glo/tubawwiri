@extends('layouts.app')

@section('title', 'Nos impacts — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-14">{{ __('site.home.impact_title') }}</h1>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 mb-20">
            @foreach ($impactStats as $stat)
                <div class="border-l-2 border-[#6B2A28] pl-4">
                    <p class="font-display text-4xl font-semibold text-[#123D2E]">+{{ number_format($stat->value, 0, ',', ' ') }}</p>
                    <p class="text-sm text-[#8a8372] mt-1">{{ app()->getLocale() === 'en' && $stat->label_en ? $stat->label_en : $stat->label_fr }}</p>
                </div>
            @endforeach
        </div>

        @if ($testimonials->isNotEmpty())
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-8">Témoignages</p>
            <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8]">
                @foreach ($testimonials as $testimonial)
                    <div class="bg-white p-8">
                        <p class="font-display italic text-[#4a453c]">"{{ $testimonial->content_fr }}"</p>
                        <p class="mt-4 font-semibold text-[#123D2E] text-sm">{{ $testimonial->nom }}</p>
                        @if ($testimonial->role)
                            <p class="text-xs text-[#8a8372]">{{ $testimonial->role }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
