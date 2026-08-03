@extends('layouts.app')

@section('title', __('site.nav.academy') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.nav.academy') }}</h1>
        <p class="text-[#4a453c] mt-4 max-w-2xl leading-relaxed">{{ __('pages.academy_intro') }}</p>

        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8] mt-12">
            @foreach ($trainings as $training)
                <a href="{{ route('academy.show', [app()->getLocale(), $training->slug]) }}"
                   class="bg-white p-8 group hover:bg-[#F6F1E4] hover-lift transition">
                    <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-widest">{{ ucfirst(str_replace('_', ' ', $training->mode)) }}</p>
                    <h2 class="font-display font-semibold text-[#123D2E] mt-2">{{ localized($training, 'title') }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2 line-clamp-2">{{ localized($training, 'description') }}</p>
                </a>
            @endforeach
        </div>
    </section>
@endsection
