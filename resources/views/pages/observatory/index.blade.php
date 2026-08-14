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
        </div>

        <div class="mt-10">{{ $reports->links() }}</div>
    </section>
@endsection
