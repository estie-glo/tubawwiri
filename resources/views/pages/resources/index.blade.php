@extends('layouts.app')

@section('title', 'Centre de ressources — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">Centre de ressources</h1>
        <p class="text-[#4a453c] mt-4 max-w-2xl leading-relaxed">Guides, publications, rapports, outils pratiques, podcasts, vidéos et infographies.</p>

        <form method="GET" class="flex flex-wrap gap-3 mt-10">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher..."
                   class="border border-[#e5ddc8] px-4 py-2 text-sm rounded flex-1 min-w-[200px]">
            <select name="category" class="border border-[#e5ddc8] px-4 py-2 text-sm rounded">
                <option value="">Toutes les catégories</option>
                @foreach ($categories as $key => $label)
                    <option value="{{ $key }}" @selected(request('category') === $key)>{{ $label }}</option>
                @endforeach
            </select>
            <button type="submit"
                    class="bg-[#123D2E] hover:bg-[#0d2e22] text-white px-6 py-2 text-xs font-bold uppercase tracking-wider transition">
                Filtrer
            </button>
        </form>

        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8] mt-12">
            @forelse ($resources as $resource)
                <div class="bg-white p-8">
                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest">{{ $categories[$resource->category] ?? $resource->category }}</p>
                    <h2 class="font-display font-semibold text-[#123D2E] mt-2">
                        {{ app()->getLocale() === 'en' && $resource->title_en ? $resource->title_en : $resource->title_fr }}
                    </h2>
                    <p class="text-sm text-[#8a8372] mt-2">
                        {{ app()->getLocale() === 'en' && $resource->description_en ? $resource->description_en : $resource->description_fr }}
                    </p>
                    @if ($resource->file_path)
                        <a href="{{ asset('storage/' . $resource->file_path) }}" target="_blank"
                           class="inline-block mt-4 text-[#6B2A28] hover:text-[#123D2E] text-xs font-bold uppercase tracking-wider border-b border-[#6B2A28] pb-0.5">
                            Télécharger →
                        </a>
                    @elseif ($resource->external_url)
                        <a href="{{ $resource->external_url }}" target="_blank"
                           class="inline-block mt-4 text-[#6B2A28] hover:text-[#123D2E] text-xs font-bold uppercase tracking-wider border-b border-[#6B2A28] pb-0.5">
                            Accéder →
                        </a>
                    @endif
                </div>
            @empty
                <p class="col-span-3 text-[#8a8372] py-10">Aucune ressource trouvée.</p>
            @endforelse
        </div>
    </section>
@endsection
