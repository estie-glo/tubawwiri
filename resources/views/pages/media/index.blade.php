@extends('layouts.app')

@section('title', 'Médias — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.nav.media') }}</h1>
        <p class="text-[#4a453c] mt-4 max-w-2xl leading-relaxed">{{ __('pages.media_intro') }}</p>

        <div class="mt-16">
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">{{ __('pages.gallery_photos') }}</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                @forelse ($photos as $photo)
                    <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title }}" class="w-full h-40 object-cover hover-lift">
                @empty
                    <p class="text-[#8a8372] text-sm col-span-full">{{ __('pages.no_photos') }}</p>
                @endforelse
            </div>
        </div>

        <div class="mt-16">
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">{{ __('pages.gallery_videos') }}</p>
            <div class="grid md:grid-cols-3 gap-6">
                @forelse ($videos as $video)
                    <div>
                        <div class="aspect-video">
                            <iframe src="{{ $video->video_url }}" class="w-full h-full" allowfullscreen></iframe>
                        </div>
                        @if ($video->title)
                            <p class="text-sm text-[#4a453c] mt-2">{{ $video->title }}</p>
                        @endif
                    </div>
                @empty
                    <p class="text-[#8a8372] text-sm col-span-full">{{ __('pages.no_videos') }}</p>
                @endforelse
            </div>
        </div>

        <div class="mt-16">
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">{{ __('pages.communiques') }}</p>
            <ul class="space-y-2">
                @forelse ($communiques as $communique)
                    <li>
                        <a href="{{ asset('storage/' . $communique->file_path) }}" target="_blank"
                           class="text-[#123D2E] hover:text-[#C99A3E] text-sm font-medium">
                            {{ $communique->title }} →
                        </a>
                    </li>
                @empty
                    <p class="text-[#8a8372] text-sm">{{ __('pages.no_press') }}</p>
                @endforelse
            </ul>
        </div>

        <div class="mt-16">
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">{{ __('pages.press_kit') }}</p>
            <ul class="space-y-2">
                @forelse ($presse as $item)
                    <li>
                        <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                           class="text-[#123D2E] hover:text-[#C99A3E] text-sm font-medium">
                            {{ $item->title }} →
                        </a>
                    </li>
                @empty
                    <p class="text-[#8a8372] text-sm">{{ __('pages.no_press_kit') }}</p>
                @endforelse
            </ul>
        </div>
    </section>
@endsection
