@extends('layouts.app')

@section('title', "Observatoire Africain de la Résilience — Fondation TUBAWWIRI (TBW)")

@section('content')
    <x-page-hero image="community/village.jpg" title="Observatoire Africain de la Résilience" :intro="__('pages.observatory_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="grid md:grid-cols-3 gap-5">
            @forelse ($reports as $report)
                <a href="{{ route('observatory.show', [app()->getLocale(), $report->slug]) }}"
                   class="bg-white border border-[#eadfca] rounded-2xl p-8 group hover:bg-[#F6F1E4] hover-lift transition">
                    <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-widest">{{ $report->type }}</p>
                    <h2 class="font-display font-semibold text-[#123D2E] mt-2">{{ localized($report, 'title') }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2">{{ localized($report, 'summary') }}</p>
                    @if ($report->published_on)
                        <p class="flex items-center gap-1.5 text-xs text-[#8a8372] mt-3">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="5" width="17" height="15" rx="1.5"/><path stroke-linecap="round" d="M3.5 9.5h17M8 3v3.5M16 3v3.5"/></svg>
                            {{ $report->published_on->format('d/m/Y') }}
                        </p>
                    @endif
                </a>
            @empty
                <p class="text-[#8a8372] text-sm p-8 bg-white rounded-2xl border border-[#eadfca]">{{ __('pages.no_reports') }}</p>
            @endforelse

            @if ($reports->count() <= 2)
                <div class="relative bg-[#F3EDE0] rounded-2xl overflow-hidden flex items-center justify-center min-h-[220px]">
                    <div class="relative w-32 h-32 flex items-center justify-center">
                        @for ($r = 1; $r <= 3; $r++)
                            <div class="absolute rounded-full border border-dashed border-[#C99A3E]/40" style="width: {{ $r * 40 }}px; height: {{ $r * 40 }}px;"></div>
                        @endfor
                        <svg viewBox="0 0 200 220" class="w-14 h-14 text-[#C99A3E] relative z-10" fill="currentColor" aria-hidden="true">
                            <path d="M96 6c14 0 22 9 34 12 10 3 22 0 28 9 5 8 0 18 6 25 7 8 20 10 22 21 2 10-9 16-10 26-1 11 9 18 6 29-3 10-16 12-20 22-3 9 3 19-4 27-6 8-19 6-27 12-7 6-9 18-18 21-9 3-17-6-27-6s-17 10-27 7c-9-3-10-15-18-21-8-6-21-4-27-12-7-8 0-18-3-27-4-10-17-12-20-22-3-11 7-18 6-29-1-11-12-13-10-26 2-11 15-13 22-21 6-7 1-17 6-25 6-9 18-6 28-9 12-3 20-12 34-12Z"/>
                        </svg>
                    </div>
                </div>
            @endif
        </div>

        @if ($reports->count() > 2)
            <div class="mt-10">{{ $reports->links() }}</div>
        @endif

        <div class="flex justify-center mt-10">
            <a href="{{ route('observatory.index', app()->getLocale()) }}"
               class="btn-tbw inline-flex border border-[#C99A3E] text-[#6B2A28] hover:bg-[#C99A3E] hover:text-[#123D2E] px-7 py-3 text-xs font-bold uppercase tracking-wider">
                {{ __('pages.observatory_more') }}
            </a>
        </div>
    </section>
@endsection
