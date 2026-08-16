@extends('layouts.app')

@section('title', 'Actualités — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/sunset.jpg" :title="__('site.nav.news')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="flex flex-wrap gap-2.5 mb-12 text-xs font-semibold uppercase tracking-wider">
            <a href="{{ route('news.index', app()->getLocale()) }}"
               class="rounded-full border px-4 py-2 transition {{ !$activeCategory ? 'bg-[#123D2E] border-[#123D2E] text-white' : 'border-[#d8cfb8] text-[#123D2E] hover:border-[#C99A3E] hover:text-[#C99A3E]' }}">
                {{ __('pages.all') }}
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('news.category', [app()->getLocale(), $category->slug]) }}"
                   class="rounded-full border px-4 py-2 transition {{ $activeCategory?->id === $category->id ? 'bg-[#123D2E] border-[#123D2E] text-white' : 'border-[#d8cfb8] text-[#123D2E] hover:border-[#C99A3E] hover:text-[#C99A3E]' }}">
                    {{ app()->getLocale() === 'en' && $category->name_en ? $category->name_en : $category->name_fr }}
                </a>
            @endforeach
        </div>

        @php $bgPhotos = ['village.jpg', 'family.jpg', 'statue.jpg', 'sunset.jpg']; @endphp
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse ($articles as $i => $article)
                <a href="{{ route('news.show', [app()->getLocale(), $article->slug]) }}"
                   class="group relative min-h-[300px] overflow-hidden rounded-3xl hover-lift">
                    <img src="{{ $article->cover_image ? asset('storage/' . $article->cover_image) : asset('images/community/' . $bgPhotos[$i % count($bgPhotos)]) }}"
                         alt="" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/94 via-[#123D2E]/65 to-[#123D2E]/20"></div>
                    <div class="relative z-10 flex flex-col justify-end h-full p-6">
                        @if ($article->category)
                            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-widest">
                                {{ app()->getLocale() === 'en' && $article->category->name_en ? $article->category->name_en : $article->category->name_fr }}
                            </p>
                        @endif
                        <h2 class="font-display text-lg font-semibold text-white mt-2">{{ $article->title_fr }}</h2>
                        <p class="text-sm text-white/80 mt-2 line-clamp-2">{{ $article->excerpt_fr }}</p>
                        <p class="flex items-center gap-1.5 text-xs text-white/60 mt-3">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="5" width="17" height="15" rx="1.5"/><path stroke-linecap="round" d="M3.5 9.5h17M8 3v3.5M16 3v3.5"/></svg>
                            {{ optional($article->published_at)->format('d/m/Y') }}
                        </p>
                    </div>
                </a>
            @empty
                <p class="text-[#8a8372] text-sm p-8 bg-white sm:col-span-2 lg:col-span-3">{{ __('pages.no_news') }}</p>
            @endforelse
        </div>

        @if ($articles->hasPages())
            <div class="mt-10">{{ $articles->links() }}</div>
        @endif

        <div class="flex justify-center mt-10">
            <a href="{{ route('news.index', app()->getLocale()) }}"
               class="btn-tbw inline-flex border border-[#C99A3E] text-[#6B2A28] hover:bg-[#C99A3E] hover:text-[#123D2E] px-7 py-3 text-xs font-bold uppercase tracking-wider">
                {{ __('pages.news_more') }}
            </a>
        </div>
    </section>
@endsection
