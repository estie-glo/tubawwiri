@extends('layouts.app')

@section('title', __('site.nav.academy') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/sunset.jpg" :title="__('site.nav.academy')" :intro="__('pages.academy_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="flex justify-end mb-6">
            <a href="{{ route('academy.index', app()->getLocale()) }}" class="text-xs font-bold uppercase tracking-wider text-[#6B2A28] border-b border-[#6B2A28] pb-0.5">
                {{ __('pages.read_more') }} →
            </a>
        </div>

        <div class="relative">
            <div id="scroll-academy" class="content-scroll-viewport">
                <div class="content-scroll-track gap-5">
                    @foreach ($trainings as $i => $training)
                        <div class="w-[230px] shrink-0">
                            <x-training-card :training="$training" :index="$i" :highlighted="$i === 0" />
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="button" aria-label="{{ __('pages.scroll_next') }}"
                    onclick="document.getElementById('scroll-academy').scrollBy({left: 260, behavior: 'smooth'})"
                    class="scroll-arrow-btn hidden md:flex absolute -right-4 top-[40%] -translate-y-1/2 w-11 h-11 rounded-full bg-[#C99A3E] text-[#123D2E] items-center justify-center shadow-lg z-20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </section>
@endsection
