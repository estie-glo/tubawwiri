@extends('layouts.app')

@section('title', "Domaines d'action — Fondation TUBAWWIRI (TBW)")

@section('content')
    <x-page-hero image="community/family.jpg" :title="__('site.home.domains_title')" :intro="__('pages.domains_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8]">
            @foreach ($actionDomains as $domain)
                <a href="{{ route('action-domains.show', [app()->getLocale(), $domain->slug]) }}"
                   class="bg-white p-8 group hover:bg-[#F6F1E4] hover-lift transition">
                    <span class="font-display text-3xl text-[#C99A3E] group-hover:text-[#6B2A28] transition">
                        {{ mb_substr(localized($domain, 'title'), 0, 1) }}
                    </span>
                    <h2 class="font-display font-semibold text-[#123D2E] mt-4">
                        {{ localized($domain, 'title') }}
                    </h2>
                    <p class="text-sm text-[#8a8372] mt-2">{{ localized($domain, 'summary') }}</p>
                </a>
            @endforeach
        </div>
    </section>
@endsection
