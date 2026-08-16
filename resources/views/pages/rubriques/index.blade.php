@extends('layouts.app')

@section('title', __('rubriques.title') . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('rubriques.intro'))

@section('content')
    <section class="py-20 reveal">
        <div class="max-w-7xl mx-auto px-4">
            <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">Fondation TUBAWWIRI (TBW)</p>
            <h1 class="font-display text-3xl md:text-4xl font-semibold text-[#123D2E] mt-2 max-w-2xl">
                {{ __('rubriques.title') }}
            </h1>
            <p class="text-[#6F6759] mt-4 max-w-2xl leading-relaxed">
                {{ __('rubriques.intro') }}
            </p>

            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-12">
                @foreach (__('rubriques.items') as $i => $item)
                    <a href="{{ route('rubriques.show', [app()->getLocale(), $i + 1]) }}"
                       class="reveal group bg-white border border-[#eadfca] rounded-2xl overflow-hidden hover-lift flex flex-col" style="transition-delay: {{ ($i % 5) * 80 }}ms">
                        <div class="relative h-32 overflow-hidden">
                            <img src="{{ asset('images/rubriques/' . $item['image']) }}" alt=""
                                 class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/80 via-[#123D2E]/10 to-transparent"></div>
                            <p class="absolute top-3 left-4 text-[11px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</p>
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <h2 class="font-display font-semibold text-[#123D2E] leading-snug">{{ $item['name'] }}</h2>
                            <p class="text-sm text-[#6F6759] mt-2 leading-relaxed flex-1 line-clamp-4">{{ $item['pitch'] }}</p>
                            <span class="text-xs font-bold uppercase tracking-wider text-[#C99A3E] mt-4 group-hover:text-[#6B2A28] transition">
                                {{ __('rubriques.voir_plus') }} →
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
