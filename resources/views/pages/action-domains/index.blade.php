@extends('layouts.app')

@section('title', "Domaines d'action — Fondation TUBAWWIRI (TBW)")

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.home.domains_title') }}</h1>
        <p class="text-[#4a453c] mt-4 max-w-2xl leading-relaxed">{{ __('pages.domains_intro') }}</p>

        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8] mt-12">
            @foreach ($actionDomains as $domain)
                <a href="{{ route('action-domains.show', [app()->getLocale(), $domain->slug]) }}"
                   class="bg-white p-8 group hover:bg-[#F6F1E4] hover-lift transition">
                    <span class="font-display text-3xl text-[#C99A3E] group-hover:text-[#6B2A28] transition">
                        {{ mb_substr($domain->title_fr, 0, 1) }}
                    </span>
                    <h2 class="font-display font-semibold text-[#123D2E] mt-4">
                        {{ app()->getLocale() === 'en' && $domain->title_en ? $domain->title_en : $domain->title_fr }}
                    </h2>
                    <p class="text-sm text-[#8a8372] mt-2">{{ app()->getLocale() === 'en' && $domain->summary_en ? $domain->summary_en : $domain->summary_fr }}</p>
                </a>
            @endforeach
        </div>
    </section>
@endsection
