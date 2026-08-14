@extends('layouts.app')

@section('title', "Domaines d'action — Fondation TUBAWWIRI (TBW)")

@section('content')
    <x-page-hero image="community/family.jpg" :title="__('site.home.domains_title')" :intro="__('pages.domains_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-5">
            @foreach ($actionDomains as $i => $domain)
                <x-domain-card :domain="$domain" :index="$i" :highlighted="$i === 0" />
            @endforeach
        </div>
    </section>
@endsection
