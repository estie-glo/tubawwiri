@extends('layouts.app')

@section('title', localized($actionDomain, 'title') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-3xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ __('site.home.domains_title') }}</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">
            {{ localized($actionDomain, 'title') }}
        </h1>
        <p class="text-[#4a453c] mb-10 leading-relaxed">
            {{ localized($actionDomain, 'summary') }}
        </p>

        @foreach ([
            'enjeux' => __('pages.field_enjeux'),
            'objectifs' => __('pages.field_objectifs'),
            'actions' => __('pages.field_actions'),
            'publics_cibles' => __('pages.field_publics_cibles'),
            'resultats_attendus' => __('pages.field_resultats_attendus'),
        ] as $field => $label)
            @if (localized($actionDomain, $field))
                <div class="mb-8 border-t border-[#e5ddc8] pt-6">
                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-2">{{ $label }}</p>
                    <div class="prose max-w-none text-[#4a453c]">{!! localized($actionDomain, $field) !!}</div>
                </div>
            @endif
        @endforeach

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
