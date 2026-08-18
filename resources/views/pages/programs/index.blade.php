@extends('layouts.app')

@section('title', 'Programmes — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/family.jpg" :title="__('site.nav.programs')" :intro="__('pages.programs_intro')" />

    <section class="max-w-7xl mx-auto px-4 pt-16 pb-6 reveal">
        <div class="grid sm:grid-cols-3 gap-5">
            @foreach ($programs->take(6) as $i => $program)
                <x-program-card :program="$program" :index="$i" />
            @endforeach
        </div>

        @if ($programs->count() > 6)
            <div class="grid sm:grid-cols-2 gap-5 mt-5">
                <x-program-card :program="$programs[6]" :index="6" />

                <div class="relative bg-[#F3EDE0] rounded-2xl overflow-hidden flex items-center min-h-[220px]">
                    <img src="{{ asset('images/architecture/identite-baobab.jpg') }}" alt=""
                         class="absolute inset-0 w-full h-full object-cover opacity-15">
                    <div class="relative z-10 flex items-center gap-4 p-8">
                        <div class="w-16 h-16 rounded-full bg-[#123D2E] flex items-center justify-center shrink-0">
                            <svg class="w-7 h-7 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s-7-4.5-7-10a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 5.5-7 10-7 10-1.3-1-2.6-1.9-4-3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                        </div>
                        <div>
                            <h3 class="font-display text-xl font-semibold text-[#123D2E]">{{ __('pages.programs_impact_title') }}</h3>
                            <p class="text-sm text-[#6F6759] mt-1.5 leading-relaxed">{{ __('pages.programs_impact_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
