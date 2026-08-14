@extends('layouts.app')

@section('title', localized($training, 'title') . ' — ' . __('site.nav.academy'))

@section('content')
    <section class="max-w-5xl mx-auto px-4 py-20 grid md:grid-cols-2 gap-16 reveal">
        <div>
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ __('site.nav.academy') }}</p>
            <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-6">{{ localized($training, 'title') }}</h1>
            <p class="text-[#4a453c] mb-8 leading-relaxed">{{ localized($training, 'description') }}</p>

            @php
                $metaIcons = [
                    'mode' => '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path stroke-linecap="round" d="M4 12h16M12 3.5c2.2 2.4 3.4 5.4 3.4 8.5s-1.2 6.1-3.4 8.5c-2.2-2.4-3.4-5.4-3.4-8.5S9.8 5.9 12 3.5Z"/>',
                    'niveau' => '<path d="M4 20V10M10 20V4M16 20v-7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
                    'duree' => '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.6"/><path stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" stroke-width="1.6" d="M12 7.5V12l3 2"/>',
                    'prix' => '<path d="M4 8.5h13.5a2.5 2.5 0 0 1 0 5H8a2.5 2.5 0 0 0 0 5H20" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M9 5v3M9 16v3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
                ];
            @endphp
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div class="bg-white border border-[#eadfca] rounded-2xl p-4">
                    <svg class="w-5 h-5 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $metaIcons['mode'] !!}</svg>
                    <p class="text-xs text-[#8a8372] uppercase tracking-widest mt-2">{{ __('forms.mode') }}</p>
                    <p class="font-display font-semibold text-[#123D2E]">{{ ucfirst(str_replace('_', ' ', $training->mode)) }}</p>
                </div>
                <div class="bg-white border border-[#eadfca] rounded-2xl p-4">
                    <svg class="w-5 h-5 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $metaIcons['niveau'] !!}</svg>
                    <p class="text-xs text-[#8a8372] uppercase tracking-widest mt-2">{{ __('forms.niveau') }}</p>
                    <p class="font-display font-semibold text-[#123D2E]">{{ ucfirst($training->level ?? '—') }}</p>
                </div>
                <div class="bg-white border border-[#eadfca] rounded-2xl p-4">
                    <svg class="w-5 h-5 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $metaIcons['duree'] !!}</svg>
                    <p class="text-xs text-[#8a8372] uppercase tracking-widest mt-2">{{ __('pages.field_duree') }}</p>
                    <p class="font-display font-semibold text-[#123D2E]">{{ $training->duree ?? '—' }}</p>
                </div>
                @if ($training->price)
                    <div class="bg-white border border-[#eadfca] rounded-2xl p-4">
                        <svg class="w-5 h-5 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $metaIcons['prix'] !!}</svg>
                        <p class="text-xs text-[#8a8372] uppercase tracking-widest mt-2">Prix</p>
                        <p class="font-display font-semibold text-[#123D2E]">{{ number_format($training->price, 0, ',', ' ') }} FCFA</p>
                    </div>
                @endif
            </div>
        </div>

        <div>
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">{{ __('forms.sinscrire_formation') }}</p>

            @if ($errors->any())
                <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm rounded-xl p-3 mb-6">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('academy.enroll.store', app()->getLocale()) }}" class="space-y-6 relative">
                @csrf
                <div class="absolute left-[-9999px]" aria-hidden="true">
                    <label for="website_enroll">Website</label>
                    <input type="text" name="website" id="website_enroll" tabindex="-1" autocomplete="off">
                </div>
                <input type="hidden" name="training_id" value="{{ $training->id }}">

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
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-3">{{ __('forms.niveau') }}</label>
                    <div class="grid grid-cols-3 gap-3 text-sm">
                        @foreach ([
                            'debutant' => __('forms.niveau_debutant'),
                            'intermediaire' => __('forms.niveau_intermediaire'),
                            'avance' => __('forms.niveau_avance'),
                        ] as $val => $label)
                            <label class="relative block cursor-pointer">
                                <input type="radio" name="niveau" value="{{ $val }}" class="peer sr-only">
                                <span class="block border border-[#d8cfb8] rounded-full peer-checked:border-[#123D2E] peer-checked:bg-[#123D2E] peer-checked:text-white px-3 py-2.5 text-center transition">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-3">{{ __('forms.mode') }}</label>
                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <label class="relative block cursor-pointer">
                            <input type="radio" name="mode" value="en_ligne" checked class="peer sr-only">
                            <span class="block border border-[#d8cfb8] rounded-full peer-checked:border-[#123D2E] peer-checked:bg-[#123D2E] peer-checked:text-white px-3 py-2.5 text-center transition">{{ __('forms.mode_en_ligne') }}</span>
                        </label>
                        <label class="relative block cursor-pointer">
                            <input type="radio" name="mode" value="presentiel" class="peer sr-only">
                            <span class="block border border-[#d8cfb8] rounded-full peer-checked:border-[#123D2E] peer-checked:bg-[#123D2E] peer-checked:text-white px-3 py-2.5 text-center transition">{{ __('forms.mode_presentiel') }}</span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-tbw w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5">
                    {{ __('forms.btn_confirmer_inscription') }}
                </button>
            </form>
        </div>
    </section>
@endsection
