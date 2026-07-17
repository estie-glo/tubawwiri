@extends('layouts.app')

@section('title', $post->title_fr . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-3xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ ucfirst($post->type) }}</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">{{ $post->title_fr }}</h1>
        @if ($post->published_on)
            <p class="text-xs text-[#8a8372] mb-8">{{ $post->published_on->format('d/m/Y') }}</p>
        @endif

        <p class="text-[#4a453c] leading-relaxed">{{ $post->summary_fr }}</p>

        @if ($post->file_path)
            <a href="{{ asset('storage/' . $post->file_path) }}" target="_blank"
               class="inline-block mt-10 bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-3 text-xs font-bold uppercase tracking-wider transition">
                Télécharger le rapport (PDF)
            </a>
        @endif
    </section>
@endsection
