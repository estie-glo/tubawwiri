@extends('layouts.app')

@section('title', __('site.nav.resources') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/family.jpg" :title="__('site.nav.resources')" :intro="__('pages.resources_intro')" />

    @php
        $categoryIcons = [
            'guide' => '<path d="M4 5.5C4 4.7 4.7 4 5.5 4H12v16H5.5A1.5 1.5 0 0 1 4 18.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H12v16h6.5a1.5 1.5 0 0 0 1.5-1.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            'rapport' => '<rect x="5" y="3.5" width="14" height="17" rx="1" fill="none" stroke="currentColor" stroke-width="1.6"/><path stroke-linecap="round" d="M8.5 15v-3M12 15V9M15.5 15v-5"/>',
            'outil' => '<path d="M14.7 6.3a3.5 3.5 0 0 0-4.6 4.2L4 16.6l2.4 2.4 6.1-6.1a3.5 3.5 0 0 0 4.2-4.6l-2.2 2.2-1.9-.5-.5-1.9 2.2-2.2Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
            'podcast' => '<rect x="9" y="3" width="6" height="11" rx="3" fill="none" stroke="currentColor" stroke-width="1.6"/><path stroke-linecap="round" d="M5.5 11a6.5 6.5 0 0 0 13 0M12 17.5V21M9 21h6"/>',
            'video' => '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M10 9.2v5.6l4.8-2.8-4.8-2.8Z" fill="currentColor"/>',
            'infographie' => '<path stroke-linecap="round" d="M4 20V10M10 20V4M16 20v-7M22 20H2" stroke="currentColor" stroke-width="1.7"/>',
            'document' => '<path d="M6 3.5h9l3 3V20a.5.5 0 0 1-.5.5h-11A.5.5 0 0 1 6 20V4a.5.5 0 0 1 .5-.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path stroke-linecap="round" d="M9 12h6M9 15.5h6"/>',
        ];
        $defaultIcon = $categoryIcons['document'];
    @endphp

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <form method="GET" class="flex flex-col sm:flex-row gap-3 max-w-2xl">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ __('pages.search_resources') }}"
                   class="flex-1 border border-[#e5ddc8] rounded-full px-4 py-3 text-sm focus:outline-none focus:border-[#123D2E]">
            <select name="category" class="border border-[#e5ddc8] rounded-full px-4 py-3 text-sm focus:outline-none focus:border-[#123D2E] bg-white">
                <option value="">{{ __('pages.all_categories') }}</option>
                @foreach ($categories as $key => $label)
                    <option value="{{ $key }}" @selected(request('category') === $key)>{{ $label }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn-tbw bg-[#123D2E] text-white text-xs font-bold uppercase tracking-wider px-5 py-3">
                {{ __('pages.filter') }}
            </button>
        </form>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 mt-12">
            @forelse ($resources as $resource)
                <div class="bg-white border border-[#eadfca] rounded-2xl p-6 hover-lift flex flex-col">
                    <div class="w-11 h-11 rounded-full bg-[#F3EDE0] flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#6B2A28]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            {!! $categoryIcons[$resource->category] ?? $defaultIcon !!}
                        </svg>
                    </div>
                    @if ($resource->category)
                        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-widest mt-4">
                            {{ $categories[$resource->category] ?? $resource->category }}
                        </p>
                    @endif
                    <h2 class="font-display font-semibold text-[#123D2E] mt-2">{{ localized($resource, 'title') }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2 flex-1">{{ localized($resource, 'description') }}</p>
                    @if ($resource->file_path)
                        <a href="{{ asset('storage/' . $resource->file_path) }}" target="_blank" rel="noopener noreferrer"
                           class="btn-tbw inline-flex items-center justify-center gap-2 mt-5 bg-[#123D2E] hover:bg-[#0d2e22] text-white text-xs font-bold uppercase tracking-wider py-2.5">
                            {{ __('pages.download') }}
                        </a>
                    @elseif ($resource->external_url)
                        <a href="{{ $resource->external_url }}" target="_blank" rel="noopener noreferrer"
                           class="btn-tbw inline-flex items-center justify-center gap-2 mt-5 border border-[#123D2E] text-[#123D2E] hover:bg-[#123D2E] hover:text-white text-xs font-bold uppercase tracking-wider py-2.5">
                            {{ __('pages.open_link') }}
                        </a>
                    @endif
                </div>
            @empty
                <p class="text-[#8a8372] text-sm p-8 bg-white sm:col-span-2 lg:col-span-3">{{ __('pages.no_resources') }}</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $resources->links() }}</div>
    </section>
@endsection
