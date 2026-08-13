@extends('layouts.app')

@section('title', localized($actionDomain, 'title') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/village.jpg" :kicker="__('site.home.domains_title')"
                 :title="localized($actionDomain, 'title')" :intro="localized($actionDomain, 'summary')" />

    <section class="max-w-5xl mx-auto px-4 py-16 reveal">
        @php
            $domainFields = [];
            foreach ([
                'enjeux' => __('pages.field_enjeux'),
                'objectifs' => __('pages.field_objectifs'),
                'actions' => __('pages.field_actions'),
                'publics_cibles' => __('pages.field_publics_cibles'),
                'resultats_attendus' => __('pages.field_resultats_attendus'),
            ] as $field => $label) {
                if (localized($actionDomain, $field)) {
                    $domainFields[] = ['label' => $label, 'html' => localized($actionDomain, $field)];
                }
            }
        @endphp

        <x-field-cards :fields="$domainFields" />

        @if ($actionDomain->programs->isNotEmpty())
            <div class="mt-10 border-t border-[#e5ddc8] pt-6">
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-4">{{ __('pages.linked_programs') }}</p>
                <ul class="space-y-2">
                    @foreach ($actionDomain->programs as $program)
                        <li>
                            <a href="{{ route('programs.show', [app()->getLocale(), $program->slug]) }}" class="text-[#123D2E] hover:text-[#C99A3E] font-medium">
                                {{ localized($program, 'title') }} →
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('contact.index', app()->getLocale()) }}"
           class="btn-tbw inline-block mt-12 bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-3 text-xs font-bold uppercase tracking-wider">
            {{ __('pages.become_partner_domain') }}
        </a>
    </section>
@endsection
