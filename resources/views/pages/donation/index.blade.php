@extends('layouts.app')

@section('title', __('site.nav.donate') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-3xl mx-auto px-4 pt-16 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2">{{ __('site.nav.donate') }}</h1>
        <p class="text-[#4a453c] mt-3 max-w-xl leading-relaxed">{{ __('site.home.join_subtitle') }}</p>
    </section>

    <section class="max-w-3xl mx-auto px-4 py-10 reveal">
        {{-- Rappel des numéros Mobile Money --}}
        <div class="grid sm:grid-cols-2 gap-4 mb-10">
            <div class="bg-white border border-[#eadfca] rounded-2xl p-4 flex items-center gap-3">
                <span class="w-10 h-10 rounded-full bg-[#FFCB05] text-[#123D2E] flex items-center justify-center text-[10px] font-black shrink-0">MTN</span>
                <div>
                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest">MTN Mobile Money</p>
                    <p class="font-display text-lg font-semibold text-[#123D2E]">+{{ config('tubawwiri.donations.mtn_momo') }}</p>
                </div>
            </div>
            <div class="bg-white border border-[#eadfca] rounded-2xl p-4 flex items-center gap-3">
                <span class="w-10 h-10 rounded-full bg-[#FF7900] text-white flex items-center justify-center text-[9px] font-black shrink-0 text-center leading-tight">Orange</span>
                <div>
                    <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest">Orange Money</p>
                    <p class="font-display text-lg font-semibold text-[#123D2E]">+{{ config('tubawwiri.donations.orange_money') }}</p>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm rounded-xl p-3 mb-6">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('donation.store', app()->getLocale()) }}" class="space-y-8 relative">
            @csrf
            <div class="absolute left-[-9999px]" aria-hidden="true">
                <label for="website_donation">Website</label>
                <input type="text" name="website" id="website_donation" tabindex="-1" autocomplete="off">
            </div>
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.nom_optionnel') }}</label>
                    <input type="text" name="nom" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.email_optionnel') }}</label>
                    <input type="email" name="email" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.telephone_optionnel') }}</label>
                    <input type="text" name="telephone" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.montant') }} <span class="text-[#C99A3E]">*</span></label>
                    <input type="number" name="montant" required min="500" placeholder="ex: 10 000"
                           class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none px-4 py-2.5 text-sm transition">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-3">{{ __('forms.moyen_paiement') }} <span class="text-[#C99A3E]">*</span></label>
                @php
                    $paiementIcons = [
                        'mtn_momo' => '<rect x="3" y="5" width="18" height="14" rx="2.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M7 9v6M17 9v6M11 9l1.5 3L14 9" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>',
                        'orange_money' => '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path stroke-linecap="round" d="M8.5 12h7M12 8.5v7"/>',
                        'carte' => '<rect x="2.5" y="5.5" width="19" height="13" rx="1.8" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M2.5 9.5h19" stroke="currentColor" stroke-width="1.6"/>',
                        'virement' => '<path d="M4 10.5 12 4l8 6.5M5.5 10.5V19M18.5 10.5V19M9 19v-4.5h6V19M4 19h16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>',
                    ];
                @endphp
                <div class="grid grid-cols-2 gap-3 text-sm">
                    @foreach ([
                        'mtn_momo' => __('forms.paiement_momo'),
                        'orange_money' => __('forms.paiement_orange'),
                        'carte' => __('forms.paiement_carte'),
                        'virement' => __('forms.paiement_virement'),
                    ] as $val => $label)
                        <label class="relative block cursor-pointer">
                            <input type="radio" name="moyen_paiement" value="{{ $val }}" required class="peer sr-only">
                            <span class="flex items-center justify-center gap-2 border border-[#d8cfb8] rounded-full peer-checked:border-[#123D2E] peer-checked:bg-[#123D2E] peer-checked:text-white px-4 py-3 text-center transition">
                                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $paiementIcons[$val] !!}</svg>
                                {{ $label }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-3">{{ __('forms.type_don') }} <span class="text-[#C99A3E]">*</span></label>
                <div class="grid grid-cols-2 gap-3 text-sm">
                    @foreach ([
                        'ponctuel' => __('forms.don_ponctuel'),
                        'mensuel' => __('forms.don_mensuel'),
                        'parrainage' => __('forms.don_parrainage'),
                        'entreprise' => __('forms.don_entreprise'),
                    ] as $val => $label)
                        <label class="relative block cursor-pointer">
                            <input type="radio" name="type_don" value="{{ $val }}" required {{ $val === 'ponctuel' ? 'checked' : '' }} class="peer sr-only">
                            <span class="block border border-[#d8cfb8] rounded-full peer-checked:border-[#123D2E] peer-checked:bg-[#123D2E] peer-checked:text-white px-4 py-3 text-center transition">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn-tbw w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5">
                {{ __('forms.btn_continuer_don') }}
            </button>
        </form>

        <div class="flex items-start gap-2 mt-6">
            <svg class="w-4 h-4 text-[#C99A3E] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="10.5" width="14" height="9" rx="1.5"/><path stroke-linecap="round" d="M8 10.5V7a4 4 0 0 1 8 0v3.5"/></svg>
            <p class="text-xs text-[#8a8372] leading-snug">
                Après votre don par Mobile Money, vous recevrez une confirmation. Pour toute question, contactez-nous directement via WhatsApp au +237 676 869 191.
            </p>
        </div>
    </section>
@endsection
