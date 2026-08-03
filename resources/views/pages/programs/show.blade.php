@extends('layouts.app')

@section('title', localized($program, 'title') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-3xl mx-auto px-4 py-20 reveal">
        @if ($program->actionDomain)
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ localized($program->actionDomain, 'title') }}</p>
        @endif
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">{{ localized($program, 'title') }}</h1>
        <p class="text-[#4a453c] mb-10 leading-relaxed">{{ localized($program, 'summary') }}</p>

        @if ($program->duree)
            <div class="border-l-2 border-[#6B2A28] pl-4 mb-10 inline-block">
                <p class="text-xs text-[#8a8372] uppercase tracking-widest">{{ __('pages.field_duree') }}</p>
                <p class="font-display font-semibold text-[#123D2E]">{{ $program->duree }}</p>
            </div>
        @endif

        @foreach ([
            'objectifs' => __('pages.field_objectifs'),
            'activites' => __('pages.field_activites'),
            'beneficiaires' => __('pages.field_beneficiaires'),
            'indicateurs' => __('pages.field_indicateurs'),
            'partenaires_souhaites' => __('pages.field_partenaires_souhaites'),
        ] as $field => $label)
            @if (localized($program, $field))
                <div class="mb-8 border-t border-[#e5ddc8] pt-6">
                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-2">{{ $label }}</p>
                    <div class="prose max-w-none text-[#4a453c]">{!! localized($program, $field) !!}</div>
                </div>
            @endif
        @endforeach

        <a href="{{ route('contact.index', app()->getLocale()) }}"
           class="inline-block mt-6 bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-3 text-xs font-bold uppercase tracking-wider transition">
            {{ __('pages.become_partner_program') }}
        </a>
    </section>
@endsection
