@extends('layouts.app')

@section('title', 'Faire un don — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-2xl mx-auto px-4 py-20">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">{{ __('site.nav.donate') }}</h1>
        <p class="text-[#4a453c] mb-10 leading-relaxed">Ensemble, faisons grandir la lumière. Votre don soutient nos programmes de santé mentale communautaire et de résilience humaine.</p>

        @if ($errors->any())
            <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm p-3 mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('donation.store', app()->getLocale()) }}" class="bg-white p-8 border border-[#e5ddc8] space-y-4">
            @csrf
            <input type="text" name="nom" placeholder="Nom (optionnel)" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
            <input type="email" name="email" placeholder="Email (optionnel)" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
            <input type="text" name="telephone" placeholder="Téléphone (optionnel)" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
            <input type="number" name="montant" placeholder="Montant (FCFA)" required min="500" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">

            <div>
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-3">Moyen de paiement</p>
                <div class="grid grid-cols-2 gap-3 text-sm">
                    <label class="border border-[#e5ddc8] px-3 py-2.5 flex items-center gap-2"><input type="radio" name="moyen_paiement" value="mtn_momo" required> MTN MoMo</label>
                    <label class="border border-[#e5ddc8] px-3 py-2.5 flex items-center gap-2"><input type="radio" name="moyen_paiement" value="orange_money"> Orange Money</label>
                    <label class="border border-[#e5ddc8] px-3 py-2.5 flex items-center gap-2"><input type="radio" name="moyen_paiement" value="carte"> Carte bancaire</label>
                    <label class="border border-[#e5ddc8] px-3 py-2.5 flex items-center gap-2"><input type="radio" name="moyen_paiement" value="virement"> Virement</label>
                </div>
            </div>

            <div>
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-3">Type de don</p>
                <select name="type_don" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                    <option value="ponctuel">Don ponctuel</option>
                    <option value="mensuel">Don mensuel</option>
                    <option value="parrainage">Parrainage</option>
                    <option value="entreprise">Soutien d'entreprise</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5 transition">
                Continuer mon don
            </button>
        </form>

        <p class="text-xs text-[#8a8372] mt-4">
            * Intégration des paiements MTN MoMo / Orange Money à finaliser côté développeur selon les API disponibles pour le Cameroun.
        </p>
    </section>
@endsection
