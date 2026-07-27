@extends('layouts.app')

@section('title', 'Centre de ressources — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.nav.resources') }}</h1>
        <p class="text-[#4a453c] mt-4 max-w-2xl leading-relaxed">{{ __('pages.resources_intro') }}</p>

        <form method="GET" class="mt-8 max-w-md">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ __('pages.search_resources') }}"
                   class="w-full border border-[#e5ddc8] px-4 py-3 text-sm focus:outline-none focus:border-[#123D2E]">
        </form>

        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8] mt-12">
            @forelse ($resources as $resource)
                <div class="bg-white p-8 hover-lift">
                    <h2 class="font-display font-semibold text-[#123D2E]">{{ $resource->title_fr }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2">{{ $resource->summary_fr }}</p>
                    @if ($resource->file_path)
                        <a href="{{ asset('storage/' . $resource->file_path) }}" target="_blank" class="inline-block mt-4 text-xs font-bold text-[#6B2A28] uppercase tracking-wider border-b border-[#6B2A28] pb-0.5">
                            {{ __('pages.download') }} →
                        </a>
                    @endif
                </div>
            @empty
                <p class="text-[#8a8372] text-sm p-8 bg-white">{{ __('pages.no_resources') }}</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $resources->links() }}</div>
    </section>
@endsection
