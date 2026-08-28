@extends('layouts.app')

@section('title', $field['label'] . ' — ' . localized($actionDomain, 'title') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    @php
        $locale = app()->getLocale();
        $urlFor = fn (int $n) => $n <= 1
            ? route('action-domains.show', [$locale, $actionDomain->slug])
            : route('action-domains.show.field', [$locale, $actionDomain->slug, $n]);
        $icons = [
            'warning' => '<path d="M12 3.5 21.5 20h-19L12 3.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M12 9.5v4.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="17" r="1" fill="currentColor"/>',
            'target' => '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="4.5" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="1" fill="currentColor"/>',
            'megaphone' => '<path d="M3 10v4h3l5 4V6L6 10H3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M16 9a4 4 0 0 1 0 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
            'people' => '<circle cx="8" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="16" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3M11.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
            'trending' => '<path d="M13 2 4 14h6l-1 8 9-12h-6l1-8Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
        ];
    @endphp

    <x-field-page
        :kicker="localized($actionDomain, 'title')"
        :page-title="__('site.home.domains_title')"
        :icon="$icons[$field['icon']]"
        :heading="$field['label']"
        :position="$position"
        :total="$total"
        :url-for="$urlFor"
        :photo-url="$actionDomain->cover_image ? asset('storage/' . $actionDomain->cover_image) : null">
        {!! $field['html'] !!}

        @if ($position >= $total)
            @if ($actionDomain->programs->isNotEmpty())
                <div class="mt-6 pt-4 border-t border-[#e5ddc8]">
                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-3">{{ __('pages.linked_programs') }}</p>
                    <ul class="space-y-1.5">
                        @foreach ($actionDomain->programs as $program)
                            <li>
                                <a href="{{ route('programs.show', [$locale, $program->slug]) }}" class="text-[#123D2E] hover:text-[#C99A3E] font-medium text-sm">
                                    {{ localized($program, 'title') }} →
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif

        <x-slot:footer>
            <div class="border-t-2 border-[#C99A3E] bg-white rounded-2xl px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-[#C99A3E] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M11 15H5a2 2 0 0 1-2-2v-1a5 5 0 0 1 5-5h1M13 15h6a2 2 0 0 0 2-2v-1a5 5 0 0 0-5-5h-1M9 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm6 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <p class="text-sm text-[#123D2E] font-medium">{{ localized($actionDomain, 'appel_partenariat') }}</p>
                </div>
                <a href="{{ route('contact.index', $locale) }}"
                   class="btn-tbw shrink-0 bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-3 text-xs font-bold uppercase tracking-wider">
                    {{ __('pages.become_partner_domain') }}
                </a>
            </div>
        </x-slot:footer>
    </x-field-page>
@endsection
