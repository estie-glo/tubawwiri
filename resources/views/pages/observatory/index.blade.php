@extends('layouts.app')

@section('title', "Observatoire Africain de la Résilience — Fondation TUBAWWIRI (TBW)")

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">Observatoire Africain de la Résilience</h1>
        <p class="text-[#4a453c] mt-4 max-w-2xl leading-relaxed">{{ __('pages.observatory_intro') }}</p>

        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8] mt-12">
            @forelse ($reports as $report)
                <a href="{{ route('observatory.show', [app()->getLocale(), $report->slug]) }}"
                   class="bg-white p-8 group hover:bg-[#F6F1E4] hover-lift transition">
                    <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-widest">{{ $report->type }}</p>
                    <h2 class="font-display font-semibold text-[#123D2E] mt-2">{{ $report->title_fr }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2">{{ $report->summary_fr }}</p>
                    @if ($report->published_on)
                        <p class="text-xs text-[#8a8372] mt-3">{{ $report->published_on->format('d/m/Y') }}</p>
                    @endif
                </a>
            @empty
                <p class="text-[#8a8372] text-sm p-8 bg-white">{{ __('pages.no_reports') }}</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $reports->links() }}</div>
    </section>
@endsection
