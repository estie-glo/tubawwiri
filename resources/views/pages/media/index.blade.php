@extends('layouts.app')

@section('title', 'Médias — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">Médias</h1>
        <p class="text-[#4a453c] mt-4 max-w-2xl leading-relaxed">Galerie photo, galerie vidéo, communiqués et dossier de presse.</p>

        @if ($photos->isNotEmpty())
            <div class="mt-16">
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">Galerie photo</p>
                <div class="grid md:grid-cols-4 gap-2">
                    @foreach ($photos as $photo)
                        <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title }}" class="w-full h-40 object-cover">
                    @endforeach
                </div>
            </div>
        @endif

        @if ($videos->isNotEmpty())
            <div class="mt-16">
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">Galerie vidéo</p>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($videos as $video)
                        <div>
                            <div class="aspect-video">
                                <iframe src="{{ $video->video_url }}" class="w-full h-full" allowfullscreen></iframe>
                            </div>
                            @if ($video->title)
                                <p class="text-sm text-[#4a453c] mt-2">{{ $video->title }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($communiques->isNotEmpty())
            <div class="mt-16">
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">Communiqués</p>
                <ul class="space-y-2">
                    @foreach ($communiques as $communique)
                        <li>
                            <a href="{{ asset('storage/' . $communique->file_path) }}" target="_blank"
                               class="text-[#123D2E] hover:text-[#C99A3E] font-medium">
                                {{ $communique->title }} →
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($presse->isNotEmpty())
            <div class="mt-16">
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">Dossier de presse</p>
                <ul class="space-y-2">
                    @foreach ($presse as $item)
                        <li>
                            <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                               class="text-[#123D2E] hover:text-[#C99A3E] font-medium">
                                {{ $item->title }} →
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
@endsection
