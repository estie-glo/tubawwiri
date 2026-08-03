@extends('layouts.app')

@section('title', __('site.nav.join') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-5xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">{{ __('site.nav.join') }}</h1>
        <p class="text-[#4a453c] mb-14 leading-relaxed max-w-2xl">{{ __('pages.engagement_subtitle') }}</p>

        <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-8">{{ __('pages.engagement_title') }}</p>

        <div class="grid md:grid-cols-3 gap-px bg-[#e5ddc8] mb-16">
            @foreach ([
                ['label' => __('pages.role_benevole_label'), 'desc' => __('pages.role_benevole_desc')],
                ['label' => __('pages.role_membre_label'), 'desc' => __('pages.role_membre_desc')],
                ['label' => __('pages.role_gardien_label'), 'desc' => __('pages.role_gardien_desc')],
                ['label' => __('pages.role_ambassadeur_label'), 'desc' => __('pages.role_ambassadeur_desc')],
                ['label' => __('pages.role_formateur_label'), 'desc' => __('pages.role_formateur_desc')],
                ['label' => __('pages.role_mentor_label'), 'desc' => __('pages.role_mentor_desc')],
            ] as $role)
                <div class="bg-white p-6 hover-lift">
                    <p class="font-display font-semibold text-[#123D2E]">{{ $role['label'] }}</p>
                    <p class="text-sm text-[#8a8372] mt-2">{{ $role['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="max-w-2xl">
            @if ($errors->any())
                <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm p-3 mb-6">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('join.store', app()->getLocale()) }}" class="space-y-6">
                @csrf
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
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-3">{{ __('forms.vous_voulez_devenir') }} <span class="text-[#C99A3E]">*</span></label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 text-sm">
                        @foreach ([
                            'benevole' => __('forms.profil_benevole'),
                            'membre' => __('forms.profil_membre'),
                            'gardien' => __('forms.profil_gardien'),
                            'ambassadeur' => __('forms.profil_ambassadeur'),
                            'formateur' => __('forms.profil_formateur'),
                            'mentor' => __('forms.profil_mentor'),
                        ] as $val => $label)
                            <label class="relative block cursor-pointer">
                                <input type="radio" name="profil" value="{{ $val }}" required class="peer sr-only">
                                <span class="block border border-[#d8cfb8] peer-checked:border-[#123D2E] peer-checked:bg-[#123D2E] peer-checked:text-white px-3 py-2.5 text-center transition">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.votre_motivation') }}</label>
                    <textarea name="motivation" rows="4" class="w-full border border-[#d8cfb8] focus:border-[#123D2E] outline-none p-3 text-sm transition"></textarea>
                </div>

                <button type="submit" class="w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5 transition">
                    {{ __('forms.btn_envoyer_ma_demande') }}
                </button>
            </form>
        </div>
    </section>
@endsection
