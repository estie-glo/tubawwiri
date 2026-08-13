@extends('layouts.app')

@section('title', __('site.nav.resources') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/family.jpg" :title="__('site.nav.resources')" :intro="__('pages.resources_intro')" />

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <form method="GET" class="flex flex-col sm:flex-row gap-3 max-w-2xl">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ __('pages.search_resources') }}"
                   class="flex-1 border border-[#e5ddc8] px-4 py-3 text-sm focus:outline-none focus:border-[#123D2E]">
            <select name="category" class="border border-[#e5ddc8] px-4 py-3 text-sm focus:outline-none focus:border-[#123D2E] bg-white">
                <option value="">{{ __('pages.all_categories') }}</option>
                @foreach ($categories as $key => $label)
                    <option value="{{ $key }}" @selected(request('category') === $key)>{{ $label }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn-tbw bg-[#123D2E] text-white text-xs font-bold uppercase tracking-wider px-5 py-3">
                {{ __('pages.filter') }}
            </button>
        </form>

        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8] mt-12">
            @forelse ($resources as $resource)
                <div class="bg-white p-8 hover-lift">
                    @if ($resource->category)
                        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-widest mb-2">
                            {{ $categories[$resource->category] ?? $resource->category }}
                        </p>
                    @endif
                    <h2 class="font-display font-semibold text-[#123D2E]">{{ localized($resource, 'title') }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2">{{ localized($resource, 'description') }}</p>
                    @if ($resource->file_path)
                        <a href="{{ asset('storage/' . $resource->file_path) }}" target="_blank" rel="noopener noreferrer"
                           class="inline-block mt-4 text-xs font-bold text-[#6B2A28] uppercase tracking-wider border-b border-[#6B2A28] pb-0.5">
                            {{ __('pages.download') }} →
                        </a>
                    @elseif ($resource->external_url)
                        <a href="{{ $resource->external_url }}" target="_blank" rel="noopener noreferrer"
                           class="inline-block mt-4 text-xs font-bold text-[#6B2A28] uppercase tracking-wider border-b border-[#6B2A28] pb-0.5">
                            {{ __('pages.open_link') }} →
                        </a>
                    @endif
                </div>
            @empty
                <p class="text-[#8a8372] text-sm p-8 bg-white md:col-span-3">{{ __('pages.no_resources') }}</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $resources->links() }}</div>
    </section>
@endsection
