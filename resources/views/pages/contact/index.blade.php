@extends('layouts.app')

@section('title', 'Contact — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20 grid md:grid-cols-2 gap-16">

        <div>
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
            <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-8">Contact</h1>

            <div class="space-y-2 text-sm text-[#4a453c] mb-10">
                <p>contact@tubawwiri.org</p>
                <p>+237 ...</p>
                <p>WhatsApp : +237 ...</p>
                <p>www.tubawwiri.org</p>
            </div>

            <div class="aspect-video">
                <iframe src="https://www.google.com/maps?q=Cameroun&output=embed" class="w-full h-full" loading="lazy"></iframe>
            </div>

            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mt-12 mb-6">Devenir partenaire</p>
            <form method="POST" action="{{ route('partner.store', app()->getLocale()) }}" class="bg-white p-8 border border-[#e5ddc8] space-y-4">
                @csrf
                <input type="text" name="organisation" placeholder="Organisation" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="text" name="nom_responsable" placeholder="Nom du responsable" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="email" name="email" placeholder="Email" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="text" name="telephone" placeholder="Téléphone" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="text" name="pays" placeholder="Pays" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="text" name="type_partenariat" placeholder="Type de partenariat" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <textarea name="message" placeholder="Message" rows="3" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]"></textarea>
                <button type="submit" class="w-full border border-[#123D2E] text-[#123D2E] hover:bg-[#123D2E] hover:text-white font-bold uppercase tracking-wider text-xs py-3.5 transition">
                    Envoyer
                </button>
            </form>
        </div>

        <div>
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">Nous écrire</p>

            @if ($errors->any())
                <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm p-3 mb-4">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store', app()->getLocale()) }}" class="bg-white p-8 border border-[#e5ddc8] space-y-4">
                @csrf
                <input type="text" name="nom" placeholder="Nom" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="email" name="email" placeholder="Email" required class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="text" name="telephone" placeholder="Téléphone" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="text" name="pays" placeholder="Pays" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <input type="text" name="sujet" placeholder="Sujet" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]">
                <textarea name="message" placeholder="Message" required rows="5" class="w-full border border-[#e5ddc8] px-3 py-2.5 text-sm focus:outline-none focus:border-[#123D2E]"></textarea>
                <button type="submit" class="w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5 transition">
                    Envoyer le message
                </button>
            </form>
        </div>
    </section>
@endsection
