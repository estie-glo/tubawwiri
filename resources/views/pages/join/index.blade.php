@extends('layouts.app')

@section('title', 'Nous rejoindre — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-2xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">{{ __('site.nav.join') }}</h1>
        <p class="text-[#4a453c] mb-10 leading-relaxed">Devenez membre, bénévole, stagiaire, consultant ou ambassadeur de la Tribu TUBAWWIRI.</p>

        @if ($errors->any())
            <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm p-3 mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('join.store', app()->getLocale()) }}" class="bg-white p-8 border border-[#e5ddc8] space-y-4">
            @csrf
            <input type="text" name="nom" placeholder="Nom" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
            <input type="email" name="email" placeholder="Email" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
            <input type="text" name="telephone" placeholder="Téléphone" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
            <input type="text" name="pays" placeholder="Pays" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">

            <select name="profil" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <option value="">Choisir un profil</option>
                <option value="membre">Devenir membre</option>
                <option value="benevole">Devenir bénévole</option>
                <option value="stagiaire">Faire un stage</option>
                <option value="consultant">Devenir consultant</option>
                <option value="ambassadeur">Devenir ambassadeur</option>
            </select>

            <textarea name="motivation" placeholder="Votre motivation" rows="4" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]"></textarea>

            <button type="submit" class="w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5 transition">
                Envoyer ma demande
            </button>
        </form>
    </section>
@endsection
