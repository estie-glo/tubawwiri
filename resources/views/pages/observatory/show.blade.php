@extends('layouts.app')

@section('title', localized($report, 'title') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/village.jpg" :kicker="$report->type" :title="localized($report, 'title')" />

    <section class="max-w-3xl mx-auto px-4 py-16 reveal">
        @if ($report->published_on)
            <p class="text-xs text-[#8a8372] mb-8">{{ $report->published_on->format('d/m/Y') }}</p>
        @endif

        @if ($report->cover_image)
            <img src="{{ asset('storage/' . $report->cover_image) }}" class="mb-8 w-full">
        @endif

        <div class="bg-white border-t-2 border-[#C99A3E] border-x border-b border-x-[#eadfca] border-b-[#eadfca] rounded-2xl p-6 mb-10">
            <p class="text-[#4a453c] leading-relaxed">{{ localized($report, 'summary') }}</p>
        </div>

        @if ($report->file_path)
            <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank"
               class="btn-tbw inline-block bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-3 text-xs font-bold uppercase tracking-wider">
                {{ __('pages.download') }} (PDF)
            </a>
        @endif
    </section>
@endsection
