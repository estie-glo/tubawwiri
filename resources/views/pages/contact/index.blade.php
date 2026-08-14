@extends('layouts.app')

@section('title', __('site.nav.contact') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    @php
        $c = $contact ?? config('tubawwiri.contact');
        $mapsQuery = urlencode($c['maps_query'] ?? 'Cameroun');
    @endphp

    <section class="max-w-7xl mx-auto px-4 pt-16 pb-6 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.nav.contact') }}</h1>
    </section>

    {{-- ===== FORMULAIRES ===== --}}
    <section class="max-w-7xl mx-auto px-4 pb-8 grid lg:grid-cols-2 gap-8 reveal">
        <div class="bg-white border border-[#eadfca] rounded-3xl p-8">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 rounded-full bg-[#123D2E] flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-[#C99A3E]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.556-4.03 8.25-9 8.25a9.76 9.76 0 0 1-2.555-.337L3 21l1.395-3.72C3.512 16.126 3 14.633 3 13.05 3 8.494 7.03 4.8 12 4.8s9 3.694 9 7.2Z"/></svg>
                </div>
                <div>
                    <p class="font-display text-lg font-semibold text-[#123D2E]">{{ __('forms.nous_ecrire') }}</p>
                    <p class="text-xs text-[#8a8372]">{{ __('forms.nous_ecrire_desc') }}</p>
                </div>
            </div>
            <div class="w-12 h-[3px] bg-[#C99A3E] mb-6"></div>

            @if ($errors->any())
                <div class="border-l-2 border-[#6B2A28] bg-[#F6F1E4] text-[#6B2A28] text-sm rounded-xl p-3 mb-6">
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
                        <input type="text" name="nom" required class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.email') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="email" name="email" required class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.telephone') }}</label>
                        <input type="text" name="telephone" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.pays') }}</label>
                        <input type="text" name="pays" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.sujet') }}</label>
                    <input type="text" name="sujet" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.message') }} <span class="text-[#C99A3E]">*</span></label>
                    <textarea name="message" required rows="5" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none p-3 text-sm transition"></textarea>
                </div>
                <button type="submit" class="btn-tbw w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5">
                    {{ __('forms.btn_envoyer_message') }}
                </button>
            </form>
        </div>

        <div class="bg-white border border-[#eadfca] rounded-3xl p-8">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 rounded-full bg-[#6B2A28] flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-[#C99A3E]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.09 9.09 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.94 11.94 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                </div>
                <div>
                    <p class="font-display text-lg font-semibold text-[#123D2E]">{{ __('forms.devenir_partenaire') }}</p>
                    <p class="text-xs text-[#8a8372]">{{ __('forms.devenir_partenaire_desc') }}</p>
                </div>
            </div>
            <div class="w-12 h-[3px] bg-[#6B2A28] mb-6"></div>

            <form method="POST" action="{{ route('partner.store', app()->getLocale()) }}" class="space-y-6 relative">
                @csrf
                <div class="absolute left-[-9999px]" aria-hidden="true">
                    <label for="website_partner">Website</label>
                    <input type="text" name="website" id="website_partner" tabindex="-1" autocomplete="off">
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.organisation') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="text" name="organisation" required class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.responsable') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="text" name="nom_responsable" required class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.email') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="email" name="email" required class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.telephone') }}</label>
                        <input type="text" name="telephone" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.pays') }}</label>
                        <input type="text" name="pays" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.type_partenariat') }}</label>
                        <input type="text" name="type_partenariat" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.message') }}</label>
                    <textarea name="message" rows="3" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none p-3 text-sm transition"></textarea>
                </div>
                <button type="submit" class="btn-tbw w-full border border-[#123D2E] text-[#123D2E] hover:bg-[#123D2E] hover:text-white font-bold uppercase tracking-wider text-xs py-3.5">
                    {{ __('forms.btn_envoyer') }}
                </button>
            </form>
        </div>
    </section>

    {{-- ===== COORDONNÉES ===== --}}
    <section class="max-w-7xl mx-auto px-4 pb-20 reveal">
        <div class="grid sm:grid-cols-3 gap-5">
            <div class="bg-white border-t-2 border-[#C99A3E] border-x border-b border-x-[#eadfca] border-b-[#eadfca] rounded-2xl p-6 hover-lift">
                <svg class="w-6 h-6 text-[#C99A3E]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6.75A2.25 2.25 0 0 1 5.25 4.5h13.5A2.25 2.25 0 0 1 21 6.75v10.5A2.25 2.25 0 0 1 18.75 19.5H5.25A2.25 2.25 0 0 1 3 17.25V6.75Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m3.5 7 8.5 6 8.5-6"/></svg>
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mt-3">Email</p>
                <a href="mailto:{{ $c['email'] }}" class="text-[#123D2E] font-medium hover:text-[#C99A3E] transition">{{ $c['email'] }}</a>
            </div>
            <div class="bg-white border-t-2 border-[#C99A3E] border-x border-b border-x-[#eadfca] border-b-[#eadfca] rounded-2xl p-6 hover-lift">
                <svg class="w-6 h-6 text-[#C99A3E]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-1.372a1.5 1.5 0 0 0-1.06-1.436l-3.36-1.008a1.5 1.5 0 0 0-1.6.44l-.646.775a11.25 11.25 0 0 1-5.352-5.352l.775-.646a1.5 1.5 0 0 0 .44-1.6L8.808 5.31A1.5 1.5 0 0 0 7.372 4.25H6a2.25 2.25 0 0 0-2.25 2.25v.25Z"/></svg>
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mt-3">{{ __('forms.telephone') }} / WhatsApp</p>
                @if (!empty($c['phone']))
                    <p class="text-[#123D2E] font-medium">{{ $c['phone'] }}</p>
                @endif
                @if (!empty($c['whatsapp']))
                    <a href="https://wa.me/{{ preg_replace('/\D+/', '', $c['whatsapp']) }}" target="_blank" rel="noopener noreferrer"
                       class="text-[#123D2E] font-medium hover:text-[#C99A3E] transition">{{ $c['whatsapp'] }}</a>
                @endif
            </div>
            <div class="bg-white border-t-2 border-[#C99A3E] border-x border-b border-x-[#eadfca] border-b-[#eadfca] rounded-2xl p-6 hover-lift">
                <svg class="w-6 h-6 text-[#C99A3E]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5"/><path stroke-linecap="round" d="M3.5 12h17M12 3.5c2.2 2.4 3.4 5.4 3.4 8.5s-1.2 6.1-3.4 8.5c-2.2-2.4-3.4-5.4-3.4-8.5S9.8 5.9 12 3.5Z"/></svg>
                <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mt-3">{{ __('site.footer.links') }}</p>
                <a href="https://{{ $c['website'] }}" target="_blank" rel="noopener noreferrer" class="text-[#123D2E] font-medium hover:text-[#C99A3E] transition">{{ $c['website'] }}</a>
            </div>
        </div>

        <div class="mt-5 border border-[#eadfca] rounded-3xl p-2 bg-white overflow-hidden">
            <div class="aspect-[21/9] rounded-[1.25rem] overflow-hidden">
                <iframe src="https://www.google.com/maps?q={{ $mapsQuery }}&output=embed" class="w-full h-full" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection
