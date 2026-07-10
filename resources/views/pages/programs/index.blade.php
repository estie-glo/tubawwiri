@extends('layouts.app')

@section('title', 'Programmes — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.nav.programs') }}</h1>
        <p class="text-[#4a453c] mt-4 max-w-2xl leading-relaxed">Familles résilientes, Écoles résilientes, Communautés résilientes, Défi TESIMAMA, Défi TOLAMUKE, Défi TELUMIERE, Parents TBW...</p>

        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8] mt-12">
            @foreach ($programs as $program)
                <a href="{{ route('programs.show', [app()->getLocale(), $program->slug]) }}"
                   class="bg-white p-8 group hover:bg-[#F6F1E4] transition">
                    @if ($program->actionDomain)
                        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-widest">{{ $program->actionDomain->title_fr }}</p>
                    @endif
                    <h2 class="font-display font-semibold text-[#123D2E] mt-2">{{ $program->title_fr }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2">{{ $program->summary_fr }}</p>
                </a>
            @endforeach
        </div>
    </section>
@endsection
