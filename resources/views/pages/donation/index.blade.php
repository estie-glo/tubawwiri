@extends('layouts.app')

@section('title', __('site.nav.donate') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-2xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">{{ __('site.nav.donate') }}</h1>
        <p class="text-[#4a453c] mb-10 leading-relaxed">{{ __('site.home.join_subtitle') }}</p>

        @if ($errors->any())
            <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm p-3 mb-6">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('donation.store', app()->getLocale()) }}" class="space-y-8">
            @csrf
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.nom_optionnel') }}</label>
                    <input type="text" name="nom" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.email_optionnel') }}</label>
                    <input type="email" name="email" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.telephone_optionnel') }}</label>
                    <input type="text" name="telephone" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.montant') }} <span class="text-[#C99A3E]">*</span></label>
                    <input type="number" name="montant" required min="500" placeholder="ex: 10 000"
                           class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-3">{{ __('forms.moyen_paiement') }} <span class="text-[#C99A3E]">*</span></label>
                <div class="grid grid-cols-2 gap-3 text-sm">
                    @foreach ([
                        'mtn_momo' => __('forms.paiement_momo'),
                        'orange_money' => __('forms.paiement_orange'),
                        'carte' => __('forms.paiement_carte'),
                        'virement' => __('forms.paiement_virement'),
                    ] as $val => $label)
                        <label class="relative block cursor-pointer">
                            <input type="radio" name="moyen_paiement" value="{{ $val }}" required class="peer sr-only">
                            <span class="block border border-[#d8cfb8] peer-checked:border-[#123D2E] peer-checked:bg-[#123D2E] peer-checked:text-white px-4 py-3 text-center transition">{{ $label }}</span>
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
                            <span class="block border border-[#d8cfb8] peer-checked:border-[#123D2E] peer-checked:bg-[#123D2E] peer-checked:text-white px-4 py-3 text-center transition">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5 transition">
                {{ __('forms.btn_continuer_don') }}
            </button>
        </form>

        <p class="text-xs text-[#8a8372] mt-6">
            * Intégration des paiements MTN MoMo / Orange Money à finaliser côté développeur selon les API disponibles pour le Cameroun.
        </p>
    </section>
@endsection
