@extends('layouts.app')

@section('title', $article->title_fr . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <article class="max-w-3xl mx-auto px-4 py-20 reveal">
        @if ($article->category)
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ $article->category->name_fr }}</p>
        @endif
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-3">{{ $article->title_fr }}</h1>
        <p class="text-xs text-[#8a8372] mb-10">
            {{ optional($article->published_at)->format('d/m/Y') }}
            @if ($article->author) · {{ $article->author }} @endif
        </p>

        @if ($article->cover_image)
            <img src="{{ asset('storage/' . $article->cover_image) }}" class="mb-10 w-full">
        @endif

        <div class="prose max-w-none text-[#4a453c] leading-relaxed">
            {!! app()->getLocale() === 'en' && $article->content_en ? $article->content_en : $article->content_fr !!}
        </div>

        <div class="mt-12 pt-6 border-t border-[#e5ddc8] flex gap-4 text-xs font-semibold uppercase tracking-wider text-[#8a8372]">
            {{ __('pages.share') }} :
            <a href="#" class="hover:text-[#C99A3E]">Facebook</a>
            <a href="#" class="hover:text-[#C99A3E]">LinkedIn</a>
            <a href="#" class="hover:text-[#C99A3E]">WhatsApp</a>
        </div>
    </article>
@endsection
