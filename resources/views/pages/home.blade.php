@extends('layouts.app')

@section('title', __('site.home.title') . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('site.home.intro'))

@section('content')

    {{-- ===== HERO ===== --}}
   <section class="relative overflow-hidden max-w-7xl mx-auto px-4 py-20 grid md:grid-cols-5 gap-12 items-center reveal">
    <div class="absolute inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>
        <div class="md:col-span-3 border-l-2 border-[#6B2A28] pl-8">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>

            <h1 class="font-display text-4xl md:text-5xl font-semibold text-[#123D2E] leading-[1.1] mt-3">
                {{ __('site.home.title') }}
            </h1>

            <p class="font-display italic text-[#6B2A28] text-lg mt-4">
                To Be Wise · To Be Whole · To Be Worthy
            </p>

            <p class="mt-6 text-[#4a453c] max-w-lg leading-relaxed">{{ __('site.home.intro') }}</p>

            <div class="mt-9 flex flex-wrap items-center gap-5">
                <a href="{{ route('about', app()->getLocale()) }}"
                   class="bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-3 text-xs font-bold uppercase tracking-wider transition">
                    {{ __('site.home.cta_discover') }}
                </a>
                <a href="{{ route('approach', app()->getLocale()) }}"
                   class="border border-[#123D2E] text-[#123D2E] hover:bg-[#123D2E] hover:text-white px-6 py-3 text-xs font-bold uppercase tracking-wider transition">
                    {{ __('site.nav.approach') }}
                </a>
                <a href="{{ route('donation.index', app()->getLocale()) }}"
                   class="text-[#6B2A28] hover:text-[#123D2E] text-xs font-bold uppercase tracking-wider border-b border-[#6B2A28] pb-0.5 transition">
                    {{ __('site.home.cta_donate') }} →
                </a>
            </div>
        </div>

        <div class="md:col-span-2 flex justify-center">
            <div class="relative">
                <div class="absolute inset-0 bg-[#C99A3E] rounded-full blur-3xl opacity-10"></div>
                <img src="{{ asset('images/hero-tree.jpg') }}" alt="TESIMAMA TOLAMUKE TELUMIERE" class="relative max-w-xs w-full">
            </div>
        </div>
    </section>

    {{-- ===== DOMAINES D'ACTION ===== --}}
    <section class="bg-white py-20 border-t border-b border-[#e5ddc8] reveal">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-end justify-between mb-12 flex-wrap gap-4">
                <h2 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E]">{{ __('site.home.domains_title') }}</h2>
                <span class="text-xs text-[#8a8372] uppercase tracking-widest">{{ $actionDomains->count() }} domaines</span>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-px bg-[#e5ddc8]">
                @foreach ($actionDomains as $domain)
                    <a href="{{ route('action-domains.show', [app()->getLocale(), $domain->slug]) }}"
                       class="bg-white p-5 group hover:bg-[#F6F1E4] hover-lift transition flex flex-col justify-between min-h-[140px]">
                        <span class="font-display text-2xl text-[#C99A3E] group-hover:text-[#6B2A28] transition">
                            {{ mb_substr(localized($domain, 'title'), 0, 1) }}
                        </span>
                        <p class="text-xs font-semibold text-[#123D2E] leading-snug mt-4">
                            {{ localized($domain, 'title') }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== CAVAMIS + 3T ===== --}}
    <section class="bg-[#123D2E] text-white py-20 reveal">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-16">
            <div>
                <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Méthodologie</p>
                <h3 class="font-display text-2xl font-semibold mt-2">{{ __('site.home.method_title') }}</h3>
                <p class="text-sm text-[#8fae9d] mt-2 max-w-sm">{{ __('site.home.method_subtitle') }}</p>

                <p class="mt-8 text-sm leading-loose tracking-wide">
                    <span class="text-white font-medium">Comprendre</span>
                    <span class="text-[#C99A3E] mx-2">·</span>
                    <span class="text-white font-medium">Accompagner</span>
                    <span class="text-[#C99A3E] mx-2">·</span>
                    <span class="text-white font-medium">Valoriser</span>
                    <span class="text-[#C99A3E] mx-2">·</span>
                    <span class="text-white font-medium">Mobiliser</span>
                    <span class="text-[#C99A3E] mx-2">·</span>
                    <span class="text-white font-medium">Impacter</span>
                    <span class="text-[#C99A3E] mx-2">·</span>
                    <span class="text-white font-medium">Soutenir</span>
                </p>
            </div>

            <div>
                <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Doctrine</p>
                <h3 class="font-display text-2xl font-semibold mt-2">{{ __('site.home.doctrine_title') }}</h3>

                <div class="grid grid-cols-3 gap-6 mt-8">
                    <div class="border-t border-[#C99A3E] pt-4">
                        <p class="font-display italic text-lg">TESIMAMA</p>
                        <p class="text-[#8fae9d] text-xs mt-2 leading-relaxed">Nos racines — identité, valeurs, ressources.</p>
                    </div>
                    <div class="border-t border-[#C99A3E] pt-4">
                        <p class="font-display italic text-lg">TOLAMUKE</p>
                        <p class="text-[#8fae9d] text-xs mt-2 leading-relaxed">Notre éveil — conscience, compétences, pouvoir d'agir.</p>
                    </div>
                    <div class="border-t border-[#3B2560] pt-4">
                        <p class="font-display italic text-lg">TELUMIERE</p>
                        <p class="text-[#8fae9d] text-xs mt-2 leading-relaxed">Notre lumière — au service de soi et de la société.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== ACTUALITÉS + IMPACT + REJOINDRE ===== --}}
    <section class="max-w-7xl mx-auto px-4 py-20 grid md:grid-cols-3 gap-12 reveal">

        <div class="md:col-span-1">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em] mb-4">{{ __('site.home.news_title') }}</p>
            <div class="space-y-5">
                @forelse ($latestArticles as $article)
                    <a href="{{ route('news.show', [app()->getLocale(), $article->slug]) }}" class="block group border-b border-[#e5ddc8] pb-4">
                        <p class="text-sm font-semibold text-[#123D2E] group-hover:text-[#6B2A28]">{{ localized($article, 'title') }}</p>
                        <p class="text-xs text-[#8a8372] mt-1">{{ localized($article, 'excerpt') }}</p>
                    </a>
                @empty
                    <p class="text-sm text-[#8a8372]">{{ __('pages.no_news') }}</p>
                @endforelse
            </div>
        </div>

        <div class="md:col-span-1">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em] mb-4">{{ __('site.home.impact_title') }}</p>
            <div class="grid grid-cols-2 gap-6">
                @foreach ($impactStats as $stat)
                    <div class="border-l-2 border-[#6B2A28] pl-3">
                        <p class="font-display text-2xl font-semibold text-[#123D2E]">+{{ number_format($stat->value, 0, ',', ' ') }}</p>
                        <p class="text-xs text-[#8a8372] mt-1">{{ localized($stat, 'label') }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="md:col-span-1 bg-[#123D2E] text-white p-8">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ __('site.home.join_title') }}</p>
            <p class="font-display italic text-lg mt-2">{{ __('site.home.join_subtitle') }}</p>
            <div class="mt-6 space-y-3 text-sm">
                <a href="{{ route('join.index', app()->getLocale()) }}" class="block border-b border-[#1c4d3a] pb-2 hover:text-[#C99A3E] transition">Devenir membre →</a>
                <a href="{{ route('join.index', app()->getLocale()) }}" class="block border-b border-[#1c4d3a] pb-2 hover:text-[#C99A3E] transition">Devenir bénévole →</a>
                <a href="{{ route('contact.index', app()->getLocale()) }}" class="block border-b border-[#1c4d3a] pb-2 hover:text-[#C99A3E] transition">Devenir partenaire →</a>
                <a href="{{ route('donation.index', app()->getLocale()) }}" class="block text-[#C99A3E] font-semibold pt-2 hover:text-white transition">Faire un don →</a>
            </div>
        </div>
    </section>

@endsection
