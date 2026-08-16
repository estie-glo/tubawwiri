@extends('layouts.app')

@section('title', __('site.nav.join') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-7xl mx-auto px-4 pt-16 pb-10 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">{{ __('site.nav.join') }}</h1>
        <p class="text-[#4a453c] leading-relaxed max-w-2xl">{{ __('pages.engagement_subtitle') }}</p>
    </section>

    <section class="max-w-7xl mx-auto px-4 pb-20 grid lg:grid-cols-2 gap-10 reveal">
        <div>
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">{{ __('pages.engagement_title') }}</p>

            @php
                $roleIcons = [
                    '<path d="M12 21s-7-4.5-7-10a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 5.5-7 10-7 10-1.3-1-2.6-1.9-4-3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
                    '<circle cx="8" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="16" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3M11.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
                    '<path d="M12 3.5 4.5 6v5c0 5 3 8 7.5 9.5C16.5 19 19.5 16 19.5 11V6L12 3.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
                    '<path d="M3 10v4h3l5 4V6L6 10H3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M16 9a4 4 0 0 1 0 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
                    '<path d="M4 5.5C4 4.7 4.7 4 5.5 4H12v16H5.5A1.5 1.5 0 0 1 4 18.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H12v16h6.5a1.5 1.5 0 0 0 1.5-1.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
                    '<circle cx="8" cy="8" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 18c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M14.5 8h5.5M14.5 11.5h5.5M14.5 15h3.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
                ];
                $roles = [
                    ['label' => __('pages.role_benevole_label'), 'desc' => __('pages.role_benevole_desc')],
                    ['label' => __('pages.role_membre_label'), 'desc' => __('pages.role_membre_desc')],
                    ['label' => __('pages.role_gardien_label'), 'desc' => __('pages.role_gardien_desc')],
                    ['label' => __('pages.role_ambassadeur_label'), 'desc' => __('pages.role_ambassadeur_desc')],
                    ['label' => __('pages.role_formateur_label'), 'desc' => __('pages.role_formateur_desc')],
                    ['label' => __('pages.role_mentor_label'), 'desc' => __('pages.role_mentor_desc')],
                ];
            @endphp

            <div class="grid sm:grid-cols-3 gap-4">
                @foreach ($roles as $i => $role)
                    <div class="reveal bg-white border border-[#eadfca] rounded-2xl p-5 hover-lift" style="transition-delay: {{ ($i % 4) * 80 }}ms">
                        <div class="w-9 h-9 rounded-full bg-[#123D2E] flex items-center justify-center">
                            <svg class="w-4 h-4 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $roleIcons[$i] !!}</svg>
                        </div>
                        <p class="font-display font-semibold text-[#123D2E] mt-3">{{ $role['label'] }}</p>
                        <p class="text-xs text-[#8a8372] mt-1.5 leading-relaxed">{{ $role['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white border border-[#eadfca] rounded-3xl p-8 h-fit">
            <p class="text-xs font-bold text-[#6B2A28] uppercase tracking-widest mb-6">{{ __('pages.votre_demande') }}</p>

            @if ($errors->any())
                <div class="border-l-2 border-[#6B2A28] bg-[#F6F1E4] text-[#6B2A28] text-sm rounded-xl p-3 mb-6">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('join.store', app()->getLocale()) }}" class="space-y-6 relative">
                @csrf
                <div class="absolute left-[-9999px]" aria-hidden="true">
                    <label for="website_join">Website</label>
                    <input type="text" name="website" id="website_join" tabindex="-1" autocomplete="off">
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
                                <span class="block border border-[#d8cfb8] rounded-full peer-checked:border-[#123D2E] peer-checked:bg-[#123D2E] peer-checked:text-white px-3 py-2.5 text-center transition">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.votre_motivation') }}</label>
                    <textarea name="motivation" rows="4" class="w-full bg-white border border-[#d8cfb8] rounded-xl focus:border-[#123D2E] outline-none p-3 text-sm transition"></textarea>
                </div>

                <button type="submit" class="btn-tbw w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] font-bold uppercase tracking-wider text-xs py-3.5">
                    {{ __('forms.btn_envoyer_ma_demande') }}
                </button>
            </form>
        </div>
    </section>
@endsection
