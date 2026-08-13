@extends('layouts.app')

@section('title', 'Médias — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/village.jpg" :title="__('site.nav.media')" :intro="__('pages.media_intro')" />

    @php
        $galleryIcon = '<rect x="3.5" y="4.5" width="17" height="15" rx="1.5" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="8.5" cy="9.5" r="1.5" fill="currentColor"/><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 17 5-5 3.5 3.5 2.5-2.5 4.5 4.5"/>';
        $videoIcon = '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M10 9.2v5.6l4.8-2.8-4.8-2.8Z" fill="currentColor"/>';
        $megaphoneIcon = '<path d="M3 10v4h3l5 4V6L6 10H3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path stroke-linecap="round" d="M16 9a4 4 0 0 1 0 6"/>';
        $documentIcon = '<path d="M6 3.5h9l3 3V20a.5.5 0 0 1-.5.5h-11A.5.5 0 0 1 6 20V4a.5.5 0 0 1 .5-.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path stroke-linecap="round" d="M9 12h6M9 15.5h6"/>';
    @endphp

    <section class="py-16 reveal">
        <div class="relative">
            <div id="scroll-media" class="content-scroll-viewport px-4">
                <div class="content-scroll-track gap-6 max-w-7xl mx-auto items-stretch">

                    {{-- ===== GALERIE PHOTO ===== --}}
                    <div class="content-card shrink-0 w-[88vw] max-w-2xl bg-white border border-[#eadfca] p-6">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-full bg-[#F3EDE0] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#6B2A28]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $galleryIcon !!}</svg>
                            </div>
                            <div>
                                <h2 class="font-display font-semibold text-[#123D2E]">{{ __('pages.gallery_photos') }}</h2>
                                <p class="text-xs text-[#8a8372]">{{ __('pages.gallery_photos_desc') }}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2 mt-4">
                            @forelse ($photos as $photo)
                                @if ($photo->file_path)
                                    <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title }}" class="w-full h-28 object-cover hover-lift">
                                @endif
                            @empty
                                <p class="text-[#8a8372] text-sm col-span-full">{{ __('pages.no_photos') }}</p>
                            @endforelse
                        </div>
                    </div>

                    {{-- ===== GALERIE VIDÉO ===== --}}
                    <div class="content-card shrink-0 w-[88vw] max-w-2xl bg-white border border-[#eadfca] p-6">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-full bg-[#F3EDE0] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#6B2A28]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $videoIcon !!}</svg>
                            </div>
                            <div>
                                <h2 class="font-display font-semibold text-[#123D2E]">{{ __('pages.gallery_videos') }}</h2>
                                <p class="text-xs text-[#8a8372]">{{ __('pages.gallery_videos_desc') }}</p>
                            </div>
                        </div>
                        <div class="grid gap-4 mt-4">
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
                                <p class="text-[#8a8372] text-sm">{{ __('pages.no_videos') }}</p>
                            @endforelse
                        </div>
                    </div>

                    {{-- ===== COMMUNIQUÉS ===== --}}
                    <div class="content-card shrink-0 w-[88vw] max-w-2xl bg-white border border-[#eadfca] p-6">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-full bg-[#F3EDE0] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#6B2A28]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $megaphoneIcon !!}</svg>
                            </div>
                            <div>
                                <h2 class="font-display font-semibold text-[#123D2E]">{{ __('pages.communiques') }}</h2>
                                <p class="text-xs text-[#8a8372]">{{ __('pages.communiques_desc') }}</p>
                            </div>
                        </div>
                        <ul class="mt-4 space-y-1">
                            @forelse ($communiques as $communique)
                                <li class="border-t border-[#eadfca] first:border-t-0">
                                    @if ($communique->file_path)
                                        <a href="{{ asset('storage/' . $communique->file_path) }}" target="_blank"
                                           class="flex items-center justify-between py-3 text-[#123D2E] hover:text-[#C99A3E] text-sm font-medium transition">
                                            {{ $communique->title }} <span>→</span>
                                        </a>
                                    @else
                                        <span class="block py-3 text-[#8a8372] text-sm font-medium">{{ $communique->title }}</span>
                                    @endif
                                </li>
                            @empty
                                <p class="text-[#8a8372] text-sm">{{ __('pages.no_press') }}</p>
                            @endforelse
                        </ul>
                    </div>

                    {{-- ===== KIT PRESSE ===== --}}
                    <div class="content-card shrink-0 w-[88vw] max-w-2xl bg-white border border-[#eadfca] p-6">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-full bg-[#F3EDE0] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#6B2A28]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $documentIcon !!}</svg>
                            </div>
                            <div>
                                <h2 class="font-display font-semibold text-[#123D2E]">{{ __('pages.press_kit') }}</h2>
                                <p class="text-xs text-[#8a8372]">{{ __('pages.press_kit_desc') }}</p>
                            </div>
                        </div>
                        <ul class="mt-4 space-y-1">
                            @forelse ($presse as $item)
                                <li class="border-t border-[#eadfca] first:border-t-0">
                                    @if ($item->file_path)
                                        <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                                           class="flex items-center justify-between py-3 text-[#123D2E] hover:text-[#C99A3E] text-sm font-medium transition">
                                            {{ $item->title }} <span>→</span>
                                        </a>
                                    @else
                                        <span class="block py-3 text-[#8a8372] text-sm font-medium">{{ $item->title }}</span>
                                    @endif
                                </li>
                            @empty
                                <p class="text-[#8a8372] text-sm">{{ __('pages.no_press_kit') }}</p>
                            @endforelse
                        </ul>
                    </div>

                </div>
            </div>

            <button type="button" aria-label="{{ __('pages.scroll_next') }}"
                    onclick="document.getElementById('scroll-media').scrollBy({left: 500, behavior: 'smooth'})"
                    class="scroll-arrow-btn hidden md:flex absolute right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-[#C99A3E] text-[#123D2E] items-center justify-center shadow-lg z-20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </section>
@endsection
