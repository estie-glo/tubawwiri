@extends('layouts.app')

@section('title', (localized($page, 'meta_title') ?? localized($page, 'title')) . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', localized($page, 'meta_description'))

@section('content')
    <section class="max-w-3xl mx-auto px-4 py-20 reveal">
        @if ($page->cover_image)
            <img src="{{ asset('storage/' . $page->cover_image) }}" alt="{{ localized($page, 'title') }}" class="mb-10 w-full">
        @endif

        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-8 border-l-2 border-[#6B2A28] pl-6">
            {{ localized($page, 'title') }}
        </h1>

        <div class="prose max-w-none text-[#4a453c] leading-relaxed">
            {!! localized($page, 'content') !!}
        </div>
    </section>
@endsection
