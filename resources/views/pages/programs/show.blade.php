@extends('layouts.app')

@section('title', $program->title_fr . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/family.jpg"
                 :kicker="$program->actionDomain ? $program->actionDomain->title_fr : 'Fondation TUBAWWIRI (TBW)'"
                 :title="$program->title_fr" :intro="$program->summary_fr" />

    <section class="max-w-5xl mx-auto px-4 py-16 reveal">
        @if ($program->duree)
            <div class="border-l-2 border-[#6B2A28] pl-4 mb-10 inline-block">
                <p class="text-xs text-[#8a8372] uppercase tracking-widest">{{ __('pages.field_duree') }}</p>
                <p class="font-display font-semibold text-[#123D2E]">{{ $program->duree }}</p>
            </div>
        @endif

        @if ($program->defis_3t && count($program->defis_3t))
            <div class="mb-10">
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-3">Défis des 3T associés</p>
                <div class="flex flex-wrap gap-2">
                    @foreach ($program->defis3tLabels() as $label)
                        <span class="text-xs font-semibold border border-[#C99A3E] text-[#123D2E] px-3 py-1.5">{{ $label }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        @php
            $programFields = [];
            foreach ([
                'probleme_fr' => 'Problème identifié',
                'public_concerne_fr' => 'Public concerné',
                'objectifs_fr' => __('pages.field_objectifs'),
                'activites_fr' => __('pages.field_activites'),
                'resultats_attendus_fr' => __('pages.field_resultats_attendus'),
                'beneficiaires_fr' => __('pages.field_beneficiaires'),
                'indicateurs_fr' => __('pages.field_indicateurs'),
                'partenaires_souhaites_fr' => __('pages.field_partenaires_souhaites'),
            ] as $field => $label) {
                if ($program->$field) {
                    $programFields[] = ['label' => $label, 'html' => $program->$field];
                }
            }
        @endphp

        <x-field-cards :fields="$programFields" />

        <a href="{{ route('contact.index', app()->getLocale()) }}"
           class="btn-tbw inline-block mt-6 bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-3 text-xs font-bold uppercase tracking-wider">
            {{ __('pages.become_partner_program') }}
        </a>
    </section>
@endsection
