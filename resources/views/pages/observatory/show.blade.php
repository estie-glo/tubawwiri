@extends('layouts.app')

@section('title', localized($report, 'title') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-3xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ $report->type }}</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-3">{{ localized($report, 'title') }}</h1>
        @if ($report->published_on)
            <p class="text-xs text-[#8a8372] mb-8">{{ $report->published_on->format('d/m/Y') }}</p>
        @endif

        @if ($report->cover_image)
            <img src="{{ asset('storage/' . $report->cover_image) }}" class="mb-8 w-full">
        @endif

        <p class="text-[#4a453c] mb-10 leading-relaxed">{{ localized($report, 'summary') }}</p>

        @if ($report->file_path)
            <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank"
               class="btn-tbw inline-block bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-3 text-xs font-bold uppercase tracking-wider">
                {{ __('pages.download') }} (PDF)
            </a>
        @endif
    </section>
@endsection
