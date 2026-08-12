@extends('layouts.app')

@section('title', 'TBW Consulting — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-20 grid md:grid-cols-2 gap-16 reveal">
        <div>
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
            <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-6">TBW Consulting</h1>
            <p class="text-[#4a453c] mb-8 leading-relaxed">{{ __('pages.consulting_intro') }}</p>
            <ul class="space-y-3 text-sm">
                @foreach (__('pages.consulting_services') as $item)
                    <li class="border-b border-[#e5ddc8] pb-3 text-[#123D2E] font-medium">{{ $item }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">{{ __('forms.demander_devis') }}</p>

            @if ($errors->any())
                <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm p-3 mb-6">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('consulting.quote.store', app()->getLocale()) }}" class="space-y-6 relative">
                @csrf
                <div class="absolute left-[-9999px]" aria-hidden="true">
                    <label for="website_quote">Website</label>
                    <input type="text" name="website" id="website_quote" tabindex="-1" autocomplete="off">
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.nom') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="text" name="nom" required value="{{ old('nom') }}" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.organisation') }}</label>
                        <input type="text" name="organisation" value="{{ old('organisation') }}" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.email') }} <span class="text-[#C99A3E]">*</span></label>
                        <input type="email" name="email" required value="{{ old('email') }}" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.telephone') }}</label>
                        <input type="text" name="telephone" value="{{ old('telephone') }}" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.pays') }}</label>
                        <input type="text" name="pays" value="{{ old('pays') }}" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.service_souhaite') }}</label>
                        <input type="text" name="service_souhaite" value="{{ old('service_souhaite') }}" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.budget_estimatif') }}</label>
                        <input type="text" name="budget_estimatif" value="{{ old('budget_estimatif') }}" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.delai_souhaite') }}</label>
                        <input type="text" name="delai" value="{{ old('delai') }}" class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.description_besoin') }} <span class="text-[#C99A3E]">*</span></label>
                    <textarea name="description_besoin" required rows="4" class="w-full border border-[#d8cfb8] focus:border-[#123D2E] outline-none p-3 text-sm transition">{{ old('description_besoin') }}</textarea>
                </div>

                <button type="submit" class="btn-tbw w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5">
                    {{ __('forms.btn_envoyer_demande') }}
                </button>
            </form>
        </div>
    </section>
@endsection
