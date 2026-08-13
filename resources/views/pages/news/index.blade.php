@extends('layouts.app')

@section('title', 'Actualités — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/sunset.jpg" :title="__('site.nav.news')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="flex flex-wrap gap-4 mb-12 text-xs font-semibold uppercase tracking-wider">
            <a href="{{ route('news.index', app()->getLocale()) }}"
               class="{{ !$activeCategory ? 'text-[#C99A3E]' : 'text-[#123D2E] hover:text-[#C99A3E]' }}">
                {{ __('pages.all') }}
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('news.category', [app()->getLocale(), $category->slug]) }}"
                   class="{{ $activeCategory?->id === $category->id ? 'text-[#C99A3E]' : 'text-[#123D2E] hover:text-[#C99A3E]' }}">
                    {{ app()->getLocale() === 'en' && $category->name_en ? $category->name_en : $category->name_fr }}
                </a>
            @endforeach
        </div>

        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8]">
            @forelse ($articles as $article)
                <a href="{{ route('news.show', [app()->getLocale(), $article->slug]) }}"
                   class="bg-white p-8 group hover:bg-[#F6F1E4] hover-lift transition">
                    @if ($article->category)
                        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-widest">
                            {{ app()->getLocale() === 'en' && $article->category->name_en ? $article->category->name_en : $article->category->name_fr }}
                        </p>
                    @endif
                    <h2 class="font-display font-semibold text-[#123D2E] mt-2">{{ $article->title_fr }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2 line-clamp-2">{{ $article->excerpt_fr }}</p>
                    <p class="text-xs text-[#8a8372] mt-3">{{ optional($article->published_at)->format('d/m/Y') }}</p>
                </a>
            @empty
                <p class="text-[#8a8372] text-sm p-8 bg-white">{{ __('pages.no_news') }}</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $articles->links() }}</div>
    </section>
@endsection
