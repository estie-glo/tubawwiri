@extends('layouts.app')

@section('title', $actionDomain->title_fr . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-3xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ __('site.home.domains_title') }}</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">
            {{ app()->getLocale() === 'en' && $actionDomain->title_en ? $actionDomain->title_en : $actionDomain->title_fr }}
        </h1>
        <p class="text-[#4a453c] mb-10 leading-relaxed">
            {{ app()->getLocale() === 'en' && $actionDomain->summary_en ? $actionDomain->summary_en : $actionDomain->summary_fr }}
        </p>

        @foreach ([
            'enjeux' => 'Enjeux',
            'objectifs' => 'Objectifs',
            'actions' => 'Actions',
            'publics_cibles' => 'Publics cibles',
            'resultats_attendus' => 'Résultats attendus',
            'appel_partenariat' => 'Appel à partenariat',
        ] as $field => $label)
            @php
                $fieldEn = $field . '_en';
                $fieldFr = $field . '_fr';
                $value = app()->getLocale() === 'en' && $actionDomain->$fieldEn ? $actionDomain->$fieldEn : $actionDomain->$fieldFr;
            @endphp
            @if ($value)
                <div class="mb-8 border-t border-[#e5ddc8] pt-6">
                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-2">{{ $label }}</p>
                    <div class="prose max-w-none text-[#4a453c]">{!! $value !!}</div>
                </div>
            @endif
        @endforeach

        @if ($actionDomain->programs->isNotEmpty())
            <div class="mt-10 border-t border-[#e5ddc8] pt-6">
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-4">Programmes liés</p>
                <ul class="space-y-2">
                    @foreach ($actionDomain->programs as $program)
                        <li>
                            <a href="{{ route('programs.show', [app()->getLocale(), $program->slug]) }}" class="text-[#123D2E] hover:text-[#C99A3E] font-medium">
                                {{ $program->title_fr }} →
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('contact.index', app()->getLocale()) }}"
           class="inline-block mt-12 bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-3 text-xs font-bold uppercase tracking-wider transition">
            Devenir partenaire de ce domaine
        </a>
    </section>
@endsection
