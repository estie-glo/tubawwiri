@extends('layouts.app')

@section('title', 'Nos impacts — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.home.impact_title') }}</h1>
        <p class="text-[#4a453c] mt-4 max-w-2xl leading-relaxed">{{ __('pages.impact_intro') }}</p>

        <div class="grid md:grid-cols-4 gap-px bg-[#e5ddc8] mt-12">
            @foreach ($stats as $stat)
                <div class="bg-white p-8 text-center">
                    <p class="font-display text-4xl font-semibold text-[#123D2E]">+{{ number_format($stat->value, 0, ',', ' ') }}</p>
                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mt-2">
                        {{ app()->getLocale() === 'en' && $stat->label_en ? $stat->label_en : $stat->label_fr }}
                    </p>
                </div>
            @endforeach
        </div>

        @if ($testimonials->isNotEmpty())
            <div class="mt-20">
                <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ __('pages.testimonials') }}</p>
                <h2 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E] mt-2 mb-10">{{ __('pages.testimonials_subtitle') }}</h2>

                <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8]">
                    @foreach ($testimonials as $testimonial)
                        <div class="bg-white p-8">
                            @if ($testimonial->photo)
                                <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->nom }}" class="w-16 h-16 rounded-full object-cover mb-4">
                            @endif
                            <p class="text-[#4a453c] leading-relaxed italic">« {{ $testimonial->content_fr }} »</p>
                            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mt-4">{{ $testimonial->nom }}</p>
                            @if ($testimonial->role)
                                <p class="text-xs text-[#8a8372]">{{ $testimonial->role }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
@endsection
