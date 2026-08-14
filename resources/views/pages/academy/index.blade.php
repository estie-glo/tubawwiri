@extends('layouts.app')

@section('title', __('site.nav.academy') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/sunset.jpg" :title="__('site.nav.academy')" :intro="__('pages.academy_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="grid md:grid-cols-3 gap-5">
            @foreach ($trainings as $i => $training)
                <a href="{{ route('academy.show', [app()->getLocale(), $training->slug]) }}"
                   class="reveal bg-white border border-[#eadfca] rounded-2xl p-8 group hover:bg-[#F6F1E4] hover-lift transition" style="transition-delay: {{ ($i % 3) * 80 }}ms">
                    <div class="flex items-center justify-between">
                        <div class="w-11 h-11 rounded-full bg-[#123D2E] flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 4 2 8l10 4 10-4-10-4Zm-7 6.5V16c0 1.5 3 3.5 7 3.5s7-2 7-3.5v-5.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-widest">{{ ucfirst(str_replace('_', ' ', $training->mode)) }}</p>
                    </div>
                    <h2 class="font-display font-semibold text-[#123D2E] mt-4">{{ localized($training, 'title') }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2 line-clamp-2">{{ localized($training, 'description') }}</p>
                </a>
            @endforeach
        </div>
    </section>
@endsection
