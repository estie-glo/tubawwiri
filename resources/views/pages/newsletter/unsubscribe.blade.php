@extends('layouts.app')

@section('title', __('forms.newsletter_unsubscribe_title') . ' — Fondation TUBAWWIRI (TBW)')

@section('content')
    <section class="max-w-xl mx-auto px-4 py-20 reveal">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 mb-4">{{ __('forms.newsletter_unsubscribe_title') }}</h1>
        <p class="text-[#4a453c] mb-10 leading-relaxed">{{ __('forms.newsletter_unsubscribe_intro') }}</p>

        @if ($errors->any())
            <div class="border-l-2 border-[#6B2A28] bg-white text-[#6B2A28] text-sm rounded-xl p-3 mb-6">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('newsletter.unsubscribe', app()->getLocale()) }}" class="space-y-6 relative">
            @csrf
            <div class="absolute left-[-9999px]" aria-hidden="true">
                <label for="website_unsubscribe">Website</label>
                <input type="text" name="website" id="website_unsubscribe" tabindex="-1" autocomplete="off">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-[#6B2A28] mb-2">{{ __('forms.email') }} <span class="text-[#C99A3E]">*</span></label>
                <input type="email" name="email" required class="w-full bg-transparent border-b border-[#d8cfb8] focus:border-[#123D2E] outline-none py-2 text-sm transition">
            </div>
            <button type="submit" class="btn-tbw w-full border border-[#123D2E] text-[#123D2E] hover:bg-[#123D2E] hover:text-white font-bold uppercase tracking-wider text-xs py-3.5">
                {{ __('forms.newsletter_unsubscribe_submit') }}
            </button>
        </form>
    </section>
@endsection
