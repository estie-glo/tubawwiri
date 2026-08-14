@extends('layouts.app')

@section('title', 'Programmes — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/village.jpg" :title="__('site.nav.programs')" :intro="__('pages.programs_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="grid md:grid-cols-3 gap-5">
            @foreach ($programs as $program)
                <a href="{{ route('programs.show', [app()->getLocale(), $program->slug]) }}"
                   class="bg-white border border-[#eadfca] rounded-2xl p-8 group hover:bg-[#F6F1E4] hover-lift transition">
                    @if ($program->actionDomain)
                        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-widest">{{ localized($program->actionDomain, 'title') }}</p>
                    @endif
                    <h2 class="font-display font-semibold text-[#123D2E] mt-2">{{ localized($program, 'title') }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2">{{ localized($program, 'summary') }}</p>
                </a>
            @endforeach
        </div>
    </section>
@endsection
