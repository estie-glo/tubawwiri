@extends('layouts.app')

@section('title', 'Médias — Fondation TUBAWWIRI (TBW)')

@section('content')
    <x-page-hero image="community/village.jpg" :title="__('site.nav.media')" :intro="__('pages.media_intro')" />

    @php
        $galleryIcon = '<rect x="3.5" y="4.5" width="17" height="15" rx="1.5" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="8.5" cy="9.5" r="1.5" fill="currentColor"/><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 17 5-5 3.5 3.5 2.5-2.5 4.5 4.5"/>';
        $videoIcon = '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M10 9.2v5.6l4.8-2.8-4.8-2.8Z" fill="currentColor"/>';
        $megaphoneIcon = '<path d="M3 10v4h3l5 4V6L6 10H3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path stroke-linecap="round" d="M16 9a4 4 0 0 1 0 6"/>';
        $documentIcon = '<path d="M6 3.5h9l3 3V20a.5.5 0 0 1-.5.5h-11A.5.5 0 0 1 6 20V4a.5.5 0 0 1 .5-.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path stroke-linecap="round" d="M9 12h6M9 15.5h6"/>';
        $downloadIcon = '<path d="M12 4v11m0 0 4-4m-4 4-4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 17.5V19a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 20 19v-1.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>';
    @endphp

    <section class="max-w-7xl mx-auto px-4 py-16 reveal">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 items-stretch">

            {{-- ===== GALERIE PHOTO ===== --}}
            <div id="galerie-photo" class="bg-white border border-[#eadfca] rounded-2xl p-5 flex flex-col">
                <div class="flex items-start justify-between gap-2">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-[#F3EDE0] flex items-center justify-center shrink-0">
                            <svg class="w-[18px] h-[18px] text-[#6B2A28]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $galleryIcon !!}</svg>
                        </div>
                        <h2 class="font-display font-semibold text-[#123D2E] text-sm">{{ __('pages.gallery_photos') }}</h2>
                    </div>
                    @if ($photos->isNotEmpty())
                        <a href="#galerie-photo" class="text-[10px] font-bold uppercase tracking-widest text-[#C99A3E] hover:text-[#6B2A28] shrink-0">{{ __('pages.see_all') }} →</a>
                    @endif
                </div>
                <p class="text-xs text-[#8a8372] mt-2">{{ __('pages.gallery_photos_desc') }}</p>

                @if ($photos->isNotEmpty())
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $photos->first()->file_path) }}" alt="" class="w-full h-28 object-cover rounded-xl">
                        @if ($photos->count() > 1)
                            <div class="grid grid-cols-3 gap-1.5 mt-1.5">
                                @foreach ($photos->skip(1)->take(3) as $photo)
                                    <img src="{{ asset('storage/' . $photo->file_path) }}" alt="" class="w-full h-12 object-cover rounded-lg">
                                @endforeach
                            </div>
                        @endif
                    </div>
                @else
                    <p class="text-[#8a8372] text-xs mt-4 flex-1">{{ __('pages.no_photos') }}</p>
                @endif

                <p class="flex items-center gap-1.5 text-[11px] text-[#8a8372] mt-4 pt-3 border-t border-[#eadfca]">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true">{!! $galleryIcon !!}</svg>
                    {{ trans_choice('pages.photos_count', $photos->count()) }}
                </p>
            </div>

            {{-- ===== GALERIE VIDÉO ===== --}}
            <div id="galerie-video" class="bg-white border border-[#eadfca] rounded-2xl p-5 flex flex-col">
                <div class="flex items-start justify-between gap-2">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-[#F3EDE0] flex items-center justify-center shrink-0">
                            <svg class="w-[18px] h-[18px] text-[#6B2A28]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $videoIcon !!}</svg>
                        </div>
                        <h2 class="font-display font-semibold text-[#123D2E] text-sm">{{ __('pages.gallery_videos') }}</h2>
                    </div>
                    @if ($videos->isNotEmpty())
                        <a href="#galerie-video" class="text-[10px] font-bold uppercase tracking-widest text-[#C99A3E] hover:text-[#6B2A28] shrink-0">{{ __('pages.see_all') }} →</a>
                    @endif
                </div>
                <p class="text-xs text-[#8a8372] mt-2">{{ __('pages.gallery_videos_desc') }}</p>

                @if ($videos->isNotEmpty())
                    <div class="mt-4">
                        <div class="relative aspect-video rounded-xl overflow-hidden bg-[#123D2E]">
                            <iframe src="{{ $videos->first()->video_url }}" class="w-full h-full" allowfullscreen></iframe>
                        </div>
                        @if ($videos->count() > 1)
                            <div class="grid grid-cols-3 gap-1.5 mt-1.5">
                                @foreach ($videos->skip(1)->take(3) as $video)
                                    <div class="aspect-square rounded-lg overflow-hidden bg-[#123D2E]/90 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-[#C99A3E]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M10 9.2v5.6l4.8-2.8-4.8-2.8Z"/></svg>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @else
                    <p class="text-[#8a8372] text-xs mt-4 flex-1">{{ __('pages.no_videos') }}</p>
                @endif

                <p class="flex items-center gap-1.5 text-[11px] text-[#8a8372] mt-4 pt-3 border-t border-[#eadfca]">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true">{!! $videoIcon !!}</svg>
                    {{ trans_choice('pages.videos_count', $videos->count()) }}
                </p>
            </div>

            {{-- ===== COMMUNIQUÉS ===== --}}
            <div id="communiques" class="bg-white border border-[#eadfca] rounded-2xl p-5 flex flex-col">
                <div class="flex items-start justify-between gap-2">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-[#F3EDE0] flex items-center justify-center shrink-0">
                            <svg class="w-[18px] h-[18px] text-[#6B2A28]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $megaphoneIcon !!}</svg>
                        </div>
                        <h2 class="font-display font-semibold text-[#123D2E] text-sm">{{ __('pages.communiques') }}</h2>
                    </div>
                    @if ($communiques->isNotEmpty())
                        <a href="#communiques" class="text-[10px] font-bold uppercase tracking-widest text-[#C99A3E] hover:text-[#6B2A28] shrink-0">{{ __('pages.see_all') }} →</a>
                    @endif
                </div>
                <p class="text-xs text-[#8a8372] mt-2">{{ __('pages.communiques_desc') }}</p>

                <ul class="mt-3 flex-1">
                    @forelse ($communiques->take(3) as $communique)
                        <li class="border-t border-[#eadfca] first:border-t-0">
                            @if ($communique->file_path)
                                <a href="{{ asset('storage/' . $communique->file_path) }}" target="_blank"
                                   class="flex items-center justify-between gap-2 py-2.5 text-[#123D2E] hover:text-[#C99A3E] text-xs font-medium transition">
                                    <span class="line-clamp-2">{{ $communique->title }}</span>
                                    <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $downloadIcon !!}</svg>
                                </a>
                            @else
                                <span class="block py-2.5 text-[#8a8372] text-xs font-medium">{{ $communique->title }}</span>
                            @endif
                        </li>
                    @empty
                        <p class="text-[#8a8372] text-xs">{{ __('pages.no_press') }}</p>
                    @endforelse
                </ul>

                <p class="flex items-center gap-1.5 text-[11px] text-[#8a8372] mt-4 pt-3 border-t border-[#eadfca]">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true">{!! $megaphoneIcon !!}</svg>
                    {{ trans_choice('pages.communiques_count', $communiques->count()) }}
                </p>
            </div>

            {{-- ===== KIT PRESSE ===== --}}
            <div id="kit-presse" class="bg-white border border-[#eadfca] rounded-2xl p-5 flex flex-col">
                <div class="flex items-start justify-between gap-2">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-[#F3EDE0] flex items-center justify-center shrink-0">
                            <svg class="w-[18px] h-[18px] text-[#6B2A28]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $documentIcon !!}</svg>
                        </div>
                        <h2 class="font-display font-semibold text-[#123D2E] text-sm">{{ __('pages.press_kit') }}</h2>
                    </div>
                    @if ($presse->isNotEmpty())
                        <a href="#kit-presse" class="text-[10px] font-bold uppercase tracking-widest text-[#C99A3E] hover:text-[#6B2A28] shrink-0">{{ __('pages.see_all') }} →</a>
                    @endif
                </div>
                <p class="text-xs text-[#8a8372] mt-2">{{ __('pages.press_kit_desc') }}</p>

                <ul class="mt-3 flex-1">
                    @forelse ($presse->take(3) as $item)
                        <li class="border-t border-[#eadfca] first:border-t-0">
                            @if ($item->file_path)
                                <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                                   class="flex items-center justify-between gap-2 py-2.5 text-[#123D2E] hover:text-[#C99A3E] text-xs font-medium transition">
                                    <span class="line-clamp-2">{{ $item->title }}</span>
                                    <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $downloadIcon !!}</svg>
                                </a>
                            @else
                                <span class="block py-2.5 text-[#8a8372] text-xs font-medium">{{ $item->title }}</span>
                            @endif
                        </li>
                    @empty
                        <p class="text-[#8a8372] text-xs">{{ __('pages.no_press_kit') }}</p>
                    @endforelse
                </ul>

                <p class="flex items-center gap-1.5 text-[11px] text-[#8a8372] mt-4 pt-3 border-t border-[#eadfca]">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true">{!! $documentIcon !!}</svg>
                    {{ trans_choice('pages.press_kit_count', $presse->count()) }}
                </p>
            </div>
        </div>

        @if ($presse->isNotEmpty())
            <div class="mt-6 border-t-2 border-[#C99A3E] bg-white rounded-2xl px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-[#C99A3E] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $downloadIcon !!}</svg>
                    <p class="text-sm text-[#123D2E] font-medium">{{ __('pages.press_kit_access') }}</p>
                </div>
                <a href="#kit-presse"
                   class="btn-tbw shrink-0 inline-flex items-center gap-2 whitespace-nowrap bg-[#123D2E] hover:bg-[#0d2e22] text-white px-4 sm:px-6 py-3 text-[11px] sm:text-xs font-bold uppercase tracking-wider">
                    {{ __('pages.press_kit_download_all') }}
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $downloadIcon !!}</svg>
                </a>
            </div>
        @endif
    </section>
@endsection
