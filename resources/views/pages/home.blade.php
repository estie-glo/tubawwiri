@extends('layouts.app')

@section('title', __('site.home.title') . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('site.home.intro'))

@section('content')

    {{-- ===== HERO FULL-BLEED ===== --}}
    <section class="relative min-h-[88vh] flex items-end overflow-hidden">
        <img src="{{ asset('images/banner-tubawwiri.jpeg') }}"
             alt="Fondation TUBAWWIRI"
             class="absolute inset-0 w-full h-full object-cover hero-kenburns">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0b261c]/92 via-[#123D2E]/78 to-[#123D2E]/35"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/75 via-transparent to-transparent"></div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 pb-16 pt-28 md:pb-20 md:pt-32 reveal">
            <p class="font-display text-[#C99A3E] text-xl md:text-2xl tracking-wide">TUBAWWIRI</p>
            <p class="text-[11px] font-semibold tracking-[0.28em] text-white/80 uppercase mt-1">(TBW) · To Be Wise · To Be Whole · To Be Worthy</p>

            <h1 class="font-display text-4xl md:text-6xl font-semibold text-white leading-[1.08] mt-6 max-w-3xl">
                {{ __('site.home.title') }}
            </h1>

            <p class="mt-5 text-white/85 max-w-xl text-base md:text-lg leading-relaxed">
                {{ __('site.home.intro') }}
            </p>

            <div class="mt-9 flex flex-wrap items-center gap-4">
                <a href="{{ route('about', app()->getLocale()) }}"
                   class="btn-tbw bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] px-7 py-3.5 text-xs font-bold uppercase tracking-wider">
                    {{ __('site.home.cta_discover') }}
                </a>
                <a href="{{ route('donation.index', app()->getLocale()) }}"
                   class="btn-tbw border border-white/70 text-white hover:bg-white hover:text-[#123D2E] px-7 py-3.5 text-xs font-bold uppercase tracking-wider">
                    {{ __('site.home.cta_donate') }}
                </a>
            </div>
        </div>
    </section>

    {{-- ===== DOMAINES ===== --}}
    <section class="bg-[#F3EDE0] py-20 reveal">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-end justify-between mb-10 flex-wrap gap-4">
                <div>
                    <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">TUBAWWIRI</p>
                    <h2 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.home.domains_title') }}</h2>
                </div>
                <a href="{{ route('action-domains.index', app()->getLocale()) }}" class="text-xs font-bold uppercase tracking-wider text-[#6B2A28] border-b border-[#6B2A28] pb-0.5">
                    {{ __('pages.read_more') }} →
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach ($actionDomains as $domain)
                    <a href="{{ route('action-domains.show', [app()->getLocale(), $domain->slug]) }}"
                       class="group relative bg-white p-6 min-h-[180px] hover-lift border border-[#eadfca] overflow-hidden">
                        <span class="absolute -right-2 -top-4 font-display text-7xl text-[#C99A3E]/15 group-hover:text-[#C99A3E]/30 transition">
                            {{ mb_substr(localized($domain, 'title'), 0, 1) }}
                        </span>
                        <p class="relative text-[11px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">0{{ $loop->iteration }}</p>
                        <h3 class="relative font-display text-xl font-semibold text-[#123D2E] mt-4 leading-snug">
                            {{ localized($domain, 'title') }}
                        </h3>
                        <p class="relative text-sm text-[#6F6759] mt-3 line-clamp-2">
                            {{ localized($domain, 'summary') }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== CAVAMIS + 3T ===== --}}
    <section class="relative overflow-hidden bg-[#123D2E] text-white py-20 reveal">
        <div class="absolute inset-y-0 right-0 w-1/2 opacity-20 hidden md:block"
             style="background-image: url('{{ asset('images/logo-mark.png') }}'); background-size: contain; background-repeat: no-repeat; background-position: right center;"></div>
        <div class="relative max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-14">
            <div>
                <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Méthodologie</p>
                <h3 class="font-display text-3xl font-semibold mt-2">{{ __('site.home.method_title') }}</h3>
                <p class="text-sm text-[#8fae9d] mt-3 max-w-md leading-relaxed">{{ __('site.home.method_subtitle') }}</p>
                <div class="mt-8 flex flex-wrap gap-x-3 gap-y-2 text-sm tracking-wide">
                    @foreach (['Comprendre','Accompagner','Valoriser','Mobiliser','Impacter','Soutenir'] as $word)
                        <span class="text-white/90">{{ $word }}</span>
                        @if (! $loop->last)<span class="text-[#C99A3E]">·</span>@endif
                    @endforeach
                </div>
                <a href="{{ route('approach', app()->getLocale()) }}"
                   class="btn-tbw inline-flex mt-10 border border-[#C99A3E] text-[#C99A3E] hover:bg-[#C99A3E] hover:text-[#123D2E] px-6 py-3 text-xs font-bold uppercase tracking-wider">
                    {{ __('site.nav.approach') }}
                </a>
            </div>
            <div>
                <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Doctrine</p>
                <h3 class="font-display text-3xl font-semibold mt-2">{{ __('site.home.doctrine_title') }}</h3>
                <div class="grid gap-5 mt-8">
                    <div class="border-l-2 border-[#C99A3E] pl-5 py-1">
                        <p class="font-display text-xl italic">TESIMAMA</p>
                        <p class="text-[#8fae9d] text-sm mt-1">{{ __('site.home.tesimama') }}</p>
                    </div>
                    <div class="border-l-2 border-[#C99A3E] pl-5 py-1">
                        <p class="font-display text-xl italic">TOLAMUKE</p>
                        <p class="text-[#8fae9d] text-sm mt-1">{{ __('site.home.tolamuke') }}</p>
                    </div>
                    <div class="border-l-2 border-[#9b7fd1] pl-5 py-1">
                        <p class="font-display text-xl italic">TELUMIERE</p>
                        <p class="text-[#8fae9d] text-sm mt-1">{{ __('site.home.telumiere') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== ACTUALITÉS + IMPACT + REJOINDRE ===== --}}
    <section class="max-w-7xl mx-auto px-4 py-20 grid lg:grid-cols-3 gap-10 reveal">
        <div class="lg:col-span-1">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em] mb-5">{{ __('site.home.news_title') }}</p>
            <div class="space-y-4">
                @forelse ($latestArticles as $article)
                    <a href="{{ route('news.show', [app()->getLocale(), $article->slug]) }}"
                       class="block group bg-white border border-[#eadfca] p-5 hover-lift">
                        <p class="text-sm font-semibold text-[#123D2E] group-hover:text-[#6B2A28]">{{ localized($article, 'title') }}</p>
                        <p class="text-xs text-[#6F6759] mt-2 line-clamp-2">{{ localized($article, 'excerpt') }}</p>
                    </a>
                @empty
                    <p class="text-sm text-[#6F6759]">{{ __('pages.no_news') }}</p>
                @endforelse
            </div>
        </div>

        <div class="lg:col-span-1">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em] mb-5">{{ __('site.home.impact_title') }}</p>
            <div class="grid grid-cols-2 gap-4">
                @foreach ($impactStats as $stat)
                    <div class="bg-white border border-[#eadfca] p-5">
                        <p class="font-display text-3xl font-semibold text-[#123D2E]">+{{ number_format($stat->value, 0, ',', ' ') }}</p>
                        <p class="text-xs text-[#6F6759] mt-2 leading-snug">{{ localized($stat, 'label') }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="lg:col-span-1 relative overflow-hidden bg-[#123D2E] text-white p-8 min-h-[280px]">
            <img src="{{ asset('images/logo-mark.png') }}" alt="" class="absolute -right-8 -bottom-8 w-40 opacity-15 pointer-events-none">
            <p class="relative text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ __('site.home.join_title') }}</p>
            <p class="relative font-display italic text-2xl mt-3">{{ __('site.home.join_subtitle') }}</p>
            <div class="relative mt-8 space-y-3 text-sm">
                <a href="{{ route('join.index', app()->getLocale()) }}" class="block border-b border-white/15 pb-2 hover:text-[#C99A3E] transition">{{ __('site.nav.join') }} →</a>
                <a href="{{ route('contact.index', app()->getLocale()) }}" class="block border-b border-white/15 pb-2 hover:text-[#C99A3E] transition">{{ __('site.home.cta_partner') }} →</a>
                <a href="{{ route('donation.index', app()->getLocale()) }}" class="btn-tbw inline-flex mt-4 bg-[#C99A3E] text-[#123D2E] px-5 py-2.5 text-xs font-bold uppercase tracking-wider hover:bg-[#b3872f]">
                    {{ __('site.home.cta_donate') }}
                </a>
            </div>
        </div>
    </section>

@endsection
