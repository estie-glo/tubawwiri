@extends('layouts.app')

@section('title', 'Nous rejoindre — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-2xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">{{ __('site.nav.join') }}</h1>
        <p class="text-[#4a453c] mb-10 leading-relaxed">Devenez membre, bénévole, stagiaire, consultant ou ambassadeur de la Tribu TUBAWWIRI.</p>

        @if ($errors->any())
            <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm p-3 mb-6">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('join.store', app()->getLocale()) }}" class="space-y-6">
            @csrf
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">Nom <span class="text-[#C99A3E]">*</span></label>
                    <input type="text" name="nom" required class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">Email <span class="text-[#C99A3E]">*</span></label>
                    <input type="email" name="email" required class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">Téléphone</label>
                    <input type="text" name="telephone" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">Pays</label>
                    <input type="text" name="pays" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-3">Vous voulez devenir <span class="text-[#C99A3E]">*</span></label>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 text-sm">
                    @foreach (['membre' => 'Membre', 'benevole' => 'Bénévole', 'stagiaire' => 'Stagiaire', 'consultant' => 'Consultant', 'ambassadeur' => 'Ambassadeur'] as $val => $label)
                        <label class="relative block cursor-pointer">
                            <input type="radio" name="profil" value="{{ $val }}" required class="peer sr-only">
                            <span class="block border border-[#d8cfb8] peer-checked:border-[#123D2E] peer-checked:bg-[#123D2E] peer-checked:text-white px-3 py-2.5 text-center transition">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">Votre motivation</label>
                <textarea name="motivation" rows="4" class="w-full border border-[#d8cfb8] focus:border-[#123D2E] outline-none p-3 text-sm transition"></textarea>
            </div>

            <button type="submit" class="w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5 transition">
                Envoyer ma demande
            </button>
        </form>
    </section>
@endsection
