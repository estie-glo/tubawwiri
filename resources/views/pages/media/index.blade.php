@extends('layouts.app')

@section('title', 'Médias — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-14">{{ __('site.nav.media') }}</h1>

        <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">Galerie photo</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mb-16">
            @forelse ($photos as $photo)
                <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title }}" class="aspect-square object-cover">
            @empty
                <p class="text-[#8a8372] text-sm col-span-full">Aucune photo pour le moment.</p>
            @endforelse
        </div>

        <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">Galerie vidéo</p>
        <div class="grid md:grid-cols-3 gap-4 mb-16">
            @forelse ($videos as $video)
                <div class="aspect-video">
                    <iframe src="{{ $video->video_url }}" class="w-full h-full" allowfullscreen></iframe>
                </div>
            @empty
                <p class="text-[#8a8372] text-sm col-span-full">Aucune vidéo pour le moment.</p>
            @endforelse
        </div>

        <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">Communiqués & presse</p>
        <ul class="space-y-2">
            @forelse ($press as $item)
                <li>
                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="text-[#123D2E] hover:text-[#C99A3E] text-sm font-medium">
                        {{ $item->title }} →
                    </a>
                </li>
            @empty
                <p class="text-[#8a8372] text-sm">Aucun communiqué pour le moment.</p>
            @endforelse
        </ul>
    </section>
@endsection
