@extends('layouts.app')

@section('title', __('site.nav.academy') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/sunset.jpg" :title="__('site.nav.academy')" :intro="__('pages.academy_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8]">
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
