@extends('layouts.app')

@section('title', localized($article, 'title') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <article class="max-w-3xl mx-auto px-4 py-20 reveal">
        @if ($article->category)
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ localized($article->category, 'name') }}</p>
        @endif
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-3">{{ localized($article, 'title') }}</h1>
        <p class="text-xs text-[#8a8372] mb-10">
            {{ optional($article->published_at)->format('d/m/Y') }}
            @if ($article->author) · {{ $article->author }} @endif
        </p>

        @if ($article->cover_image)
            <img src="{{ asset('storage/' . $article->cover_image) }}" class="mb-10 w-full">
        @endif

        <div class="prose max-w-none text-[#4a453c] leading-relaxed">
            {!! localized($article, 'content') !!}
        </div>

        <div class="mt-12 pt-6 border-t border-[#e5ddc8] flex gap-4 text-xs font-semibold uppercase tracking-wider text-[#8a8372]">
            {{ __('pages.share') }} :
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" class="hover:text-[#C99A3E]" target="_blank" rel="noopener">Facebook</a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" class="hover:text-[#C99A3E]" target="_blank" rel="noopener">LinkedIn</a>
            <a href="https://wa.me/?text={{ urlencode(localized($article, 'title') . ' ' . url()->current()) }}" class="hover:text-[#C99A3E]" target="_blank" rel="noopener">WhatsApp</a>
        </div>
    </article>
@endsection
