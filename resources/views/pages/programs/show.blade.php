@extends('layouts.app')

@section('title', $field['label'] . ' — ' . $program->title_fr . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    @php
        $locale = app()->getLocale();
        $urlFor = fn (int $n) => $n <= 1
            ? route('programs.show', [$locale, $program->slug])
            : route('programs.show.field', [$locale, $program->slug, $n]);
        $icons = [
            'warning' => '<path d="M12 3.5 21.5 20h-19L12 3.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M12 9.5v4.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="17" r="1" fill="currentColor"/>',
            'people' => '<circle cx="8" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="16" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3M11.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
            'target' => '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="4.5" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="1" fill="currentColor"/>',
            'megaphone' => '<path d="M3 10v4h3l5 4V6L6 10H3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M16 9a4 4 0 0 1 0 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
            'trending' => '<path d="M13 2 4 14h6l-1 8 9-12h-6l1-8Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            'heart' => '<path d="M12 21s-7-4.5-7-10a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 5.5-7 10-7 10-1.3-1-2.6-1.9-4-3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
        ];
    @endphp

    <x-field-page
        :kicker="$program->title_fr"
        :page-title="__('site.nav.programs')"
        :icon="$icons[$field['icon']]"
        :heading="$field['label']"
        :position="$position"
        :total="$total"
        :url-for="$urlFor"
        :photo-url="$program->cover_image ? asset('storage/' . $program->cover_image) : null">

        @if ($position === 1 && ($program->duree || ($program->defis_3t && count($program->defis_3t))))
            <div class="flex flex-wrap items-center gap-2 mb-4">
                @if ($program->duree)
                    <span class="text-[11px] font-bold uppercase tracking-widest text-[#6B2A28] border border-[#6B2A28] rounded-full px-3 py-1">{{ __('pages.field_duree') }} · {{ $program->duree }}</span>
                @endif
                @if ($program->defis_3t && count($program->defis_3t))
                    @foreach ($program->defis3tLabels() as $label)
                        <span class="text-[11px] font-semibold border border-[#C99A3E] text-[#123D2E] rounded-full px-3 py-1">{{ $label }}</span>
                    @endforeach
                @endif
            </div>
        @endif

        {!! $field['html'] !!}

        @if ($position >= $total)
            @if ($program->indicateurs_fr || $program->partenaires_souhaites_fr)
                <div class="mt-6 pt-4 border-t border-[#e5ddc8] space-y-4">
                    @if ($program->indicateurs_fr)
                        <div>
                            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-1">{{ __('pages.field_indicateurs') }}</p>
                            <p class="text-sm text-[#4a453c]">{{ $program->indicateurs_fr }}</p>
                        </div>
                    @endif
                    @if ($program->partenaires_souhaites_fr)
                        <div>
                            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-1">{{ __('pages.field_partenaires_souhaites') }}</p>
                            <p class="text-sm text-[#4a453c]">{{ $program->partenaires_souhaites_fr }}</p>
                        </div>
                    @endif
                </div>
            @endif
        @endif

        <x-slot:footer>
            <div class="border-t-2 border-[#C99A3E] bg-white rounded-2xl px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-[#C99A3E] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M11 15H5a2 2 0 0 1-2-2v-1a5 5 0 0 1 5-5h1M13 15h6a2 2 0 0 0 2-2v-1a5 5 0 0 0-5-5h-1M9 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm6 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <p class="text-sm text-[#123D2E] font-medium">{{ __('pages.become_partner_program_question') }}</p>
                </div>
                <a href="{{ route('contact.index', $locale) }}"
                   class="btn-tbw shrink-0 bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-3 text-xs font-bold uppercase tracking-wider">
                    {{ __('pages.become_partner_program') }}
                </a>
            </div>
        </x-slot:footer>
    </x-field-page>
@endsection
