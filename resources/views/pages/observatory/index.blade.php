@extends('layouts.app')

@section('title', "Observatoire Africain de la Résilience — Fondation TUBAWWIRI (TBW)")

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">Observatoire Africain de la Résilience</h1>
        <p class="text-[#4a453c] mt-4 max-w-2xl leading-relaxed">Analyses, notes, rapports, statistiques et baromètres sur la résilience humaine et les questions sociales en Afrique.</p>

        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8] mt-12">
            @foreach ($posts as $post)
                <a href="{{ route('observatory.show', [app()->getLocale(), $post->slug]) }}"
                   class="bg-white p-8 group hover:bg-[#F6F1E4] transition">
                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest">{{ ucfirst($post->type) }}</p>
                    <h2 class="font-display font-semibold text-[#123D2E] mt-2">{{ $post->title_fr }}</h2>
                    <p class="text-sm text-[#8a8372] mt-2">{{ $post->summary_fr }}</p>
                    @if ($post->published_on)
                        <p class="text-xs text-[#8a8372] mt-4">{{ $post->published_on->format('d/m/Y') }}</p>
                    @endif
                </a>
            @endforeach
        </div>
    </section>
@endsection
