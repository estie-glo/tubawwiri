@extends('layouts.app')

@section('title', ($page->meta_title_fr ?? $page->title_fr) . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', $page->meta_description_fr)

@section('content')
    <section class="max-w-3xl mx-auto px-4 py-20 reveal">
        @if ($page->cover_image)
            <img src="{{ asset('storage/' . $page->cover_image) }}" alt="{{ $page->title_fr }}" class="mb-10 w-full">
        @endif

        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-8 border-l-2 border-[#6B2A28] pl-6">
            {{ app()->getLocale() === 'en' && $page->title_en ? $page->title_en : $page->title_fr }}
        </h1>

        <div class="prose max-w-none text-[#4a453c] leading-relaxed">
            {!! app()->getLocale() === 'en' && $page->content_en ? $page->content_en : $page->content_fr !!}
        </div>
    </section>
@endsection
