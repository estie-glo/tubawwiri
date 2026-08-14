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

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 mt-12">
                @foreach (__('rubriques.items') as $i => $item)
                    <div class="reveal group relative min-h-[360px] overflow-hidden rounded-3xl hover-lift" style="transition-delay: {{ ($i % 3) * 90 }}ms">
                        <img src="{{ asset('images/rubriques/' . $item['image']) }}" alt=""
                             class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/95 via-[#123D2E]/68 to-[#123D2E]/25"></div>
                        <div class="relative z-10 flex flex-col justify-end h-full p-6">
                            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">0{{ $i + 1 }}</p>
                            <h2 class="font-display text-xl font-semibold text-white mt-3 leading-snug">
                                {{ $item['name'] }}
                            </h2>
                            @if (!empty($item['subtitle']))
                                <p class="text-xs italic text-[#C99A3E] mt-1">{{ $item['subtitle'] }}</p>
                            @endif
                            <p class="text-sm text-white/80 mt-3 leading-relaxed">
                                {{ $item['pitch'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
