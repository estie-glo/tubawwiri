@extends('layouts.app')

@section('title', 'TBW Consulting — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20 grid md:grid-cols-2 gap-16">
        <div>
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
            <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-6">TBW Consulting</h1>
            <p class="text-[#4a453c] mb-8 leading-relaxed">
                Services professionnels : conseil stratégique, études, évaluations, recherche,
                formations, coaching, accompagnement institutionnel et gestion de projets.
            </p>
            <ul class="space-y-3 text-sm">
                @foreach (['Conseil stratégique', 'Études & évaluations', 'Recherche appliquée', 'Formations & coaching', 'Accompagnement institutionnel', 'Gestion de projets'] as $item)
                    <li class="border-b border-[#e5ddc8] pb-3 text-[#123D2E] font-medium">{{ $item }}</li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white p-8 border border-[#e5ddc8]">
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">Demander un devis</p>

            @if ($errors->any())
                <div class="border-l-2 border-[#6B2A28] bg-[#F6F1E4] text-[#6B2A28] text-sm p-3 mb-4">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('consulting.quote.store', app()->getLocale()) }}" class="space-y-4">
                @csrf
                <input type="text" name="nom" placeholder="Nom" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]" value="{{ old('nom') }}">
                <input type="text" name="organisation" placeholder="Organisation" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]" value="{{ old('organisation') }}">
                <input type="email" name="email" placeholder="Email" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]" value="{{ old('email') }}">
                <input type="text" name="telephone" placeholder="Téléphone" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]" value="{{ old('telephone') }}">
                <input type="text" name="pays" placeholder="Pays" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]" value="{{ old('pays') }}">
                <input type="text" name="service_souhaite" placeholder="Service souhaité" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]" value="{{ old('service_souhaite') }}">
                <input type="text" name="budget_estimatif" placeholder="Budget estimatif" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]" value="{{ old('budget_estimatif') }}">
                <input type="text" name="delai" placeholder="Délai souhaité" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]" value="{{ old('delai') }}">
                <textarea name="description_besoin" placeholder="Description du besoin" required rows="4" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">{{ old('description_besoin') }}</textarea>

                <button type="submit" class="w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5 transition">
                    Envoyer la demande
                </button>
            </form>
        </div>
    </section>
@endsection
