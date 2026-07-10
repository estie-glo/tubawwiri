@extends('layouts.app')

@section('title', $training->title_fr . ' — TBW Academy')

@section('content')
    <section class="max-w-5xl mx-auto px-4 py-20 grid md:grid-cols-2 gap-16">
        <div>
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">TBW Academy</p>
            <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-6">{{ $training->title_fr }}</h1>
            <p class="text-[#4a453c] mb-8 leading-relaxed">{{ $training->description_fr }}</p>

            <div class="grid grid-cols-2 gap-6 text-sm">
                <div class="border-l-2 border-[#6B2A28] pl-3">
                    <p class="text-xs text-[#8a8372] uppercase tracking-widest">Mode</p>
                    <p class="font-display font-semibold text-[#123D2E]">{{ ucfirst(str_replace('_', ' ', $training->mode)) }}</p>
                </div>
                <div class="border-l-2 border-[#6B2A28] pl-3">
                    <p class="text-xs text-[#8a8372] uppercase tracking-widest">Niveau</p>
                    <p class="font-display font-semibold text-[#123D2E]">{{ ucfirst($training->level ?? '—') }}</p>
                </div>
                <div class="border-l-2 border-[#6B2A28] pl-3">
                    <p class="text-xs text-[#8a8372] uppercase tracking-widest">Durée</p>
                    <p class="font-display font-semibold text-[#123D2E]">{{ $training->duree ?? '—' }}</p>
                </div>
                @if ($training->price)
                    <div class="border-l-2 border-[#6B2A28] pl-3">
                        <p class="text-xs text-[#8a8372] uppercase tracking-widest">Prix</p>
                        <p class="font-display font-semibold text-[#123D2E]">{{ number_format($training->price, 0, ',', ' ') }} FCFA</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="bg-white p-8 border border-[#e5ddc8]">
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">S'inscrire à cette formation</p>

            @if ($errors->any())
                <div class="border-l-2 border-[#6B2A28] bg-[#F6F1E4] text-[#6B2A28] text-sm p-3 mb-4">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('academy.enroll.store', app()->getLocale()) }}" class="space-y-4">
                @csrf
                <input type="hidden" name="training_id" value="{{ $training->id }}">
                <input type="text" name="nom" placeholder="Nom" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="email" name="email" placeholder="Email" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="text" name="telephone" placeholder="Téléphone" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="text" name="pays" placeholder="Pays" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <select name="niveau" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                    <option value="">Niveau</option>
                    <option value="debutant">Débutant</option>
                    <option value="intermediaire">Intermédiaire</option>
                    <option value="avance">Avancé</option>
                </select>
                <select name="mode" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                    <option value="en_ligne">En ligne</option>
                    <option value="presentiel">Présentiel</option>
                </select>
                <button type="submit" class="w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5 transition">
                    Confirmer mon inscription
                </button>
            </form>
        </div>
    </section>
@endsection
