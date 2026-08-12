@extends('layouts.app')

@section('title', __('site.nav.contact') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    @php
        $c = $contact ?? config('tubawwiri.contact');
        $mapsQuery = urlencode($c['maps_query'] ?? 'Cameroun');
    @endphp

    <section class="max-w-7xl mx-auto px-4 py-20 grid md:grid-cols-2 gap-16 reveal">

        <div>
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
            <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-8">{{ __('site.nav.contact') }}</h1>

            <div class="space-y-2 text-sm text-[#4a453c] mb-10">
                <p>{{ $c['email'] }}</p>
                @if (!empty($c['phone']))
                    <p>{{ $c['phone'] }}</p>
                @endif
                @if (!empty($c['whatsapp']))
                    <p>WhatsApp :
                        <a href="https://wa.me/{{ preg_replace('/\D+/', '', $c['whatsapp']) }}" target="_blank" rel="noopener noreferrer" class="text-[#123D2E] font-semibold hover:text-[#C99A3E]">
                            {{ $c['whatsapp'] }}
                        </a>
                    </p>
                @endif
                <p>{{ $c['website'] }}</p>
            </div>

            <div class="aspect-video">
                <iframe src="https://www.google.com/maps?q={{ $mapsQuery }}&output=embed" class="w-full h-full" loading="lazy"></iframe>
            </div>

            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mt-12 mb-6">{{ __('forms.devenir_partenaire') }}</p>
            <form method="POST" action="{{ route('partner.store', app()->getLocale()) }}" class="space-y-6 relative">
                @csrf
                <div class="absolute left-[-9999px]" aria-hidden="true">
                    <label for="website_partner">Website</label>
                    <input type="text" name="website" id="website_partner" tabindex="-1" autocomplete="off">
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.organisation') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="text" name="organisation" required class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.responsable') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="text" name="nom_responsable" required class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.email') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="email" name="email" required class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.telephone') }}</label>
                        <input type="text" name="telephone" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.pays') }}</label>
                        <input type="text" name="pays" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.type_partenariat') }}</label>
                        <input type="text" name="type_partenariat" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.message') }}</label>
                    <textarea name="message" rows="3" class="w-full border border-[#d8cfb8] focus:border-[#123D2E] outline-none p-3 text-sm transition"></textarea>
                </div>
                <button type="submit" class="btn-tbw w-full border border-[#123D2E] text-[#123D2E] hover:bg-[#123D2E] hover:text-white font-bold uppercase tracking-wider text-xs py-3.5">
                    {{ __('forms.btn_envoyer') }}
                </button>
            </form>
        </div>

        <div>
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">{{ __('forms.nous_ecrire') }}</p>

            @if ($errors->any())
                <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm p-3 mb-6">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store', app()->getLocale()) }}" class="space-y-6 relative">
                @csrf
                <div class="absolute left-[-9999px]" aria-hidden="true">
                    <label for="website_contact">Website</label>
                    <input type="text" name="website" id="website_contact" tabindex="-1" autocomplete="off">
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.nom') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="text" name="nom" required class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.email') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="email" name="email" required class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.telephone') }}</label>
                        <input type="text" name="telephone" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.pays') }}</label>
                        <input type="text" name="pays" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.sujet') }}</label>
                    <input type="text" name="sujet" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.message') }} <span class="text-[#C99A3E]">*</span></label>
                    <textarea name="message" required rows="5" class="w-full border border-[#d8cfb8] focus:border-[#123D2E] outline-none p-3 text-sm transition"></textarea>
                </div>
                <button type="submit" class="btn-tbw w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5">
                    {{ __('forms.btn_envoyer_message') }}
                </button>
            </form>
        </div>
    </section>
@endsection
