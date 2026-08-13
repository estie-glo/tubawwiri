@extends('layouts.app')

@section('title', __('architecture.title') . ' — Fondation TUBAWWIRI (TBW)')
@section('meta_description', __('architecture.intro'))

@section('content')
    <x-page-hero image="doctrine/tolamuke.jpg" :title="__('architecture.title')" :intro="__('architecture.intro')" />

    {{-- ===== NIVEAUX ===== --}}
    <section class="py-16 reveal">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E]">{{ __('architecture.levels_title') }}</h2>

            <div class="mt-10">
                @foreach (__('architecture.levels') as $level)
                    <div class="relative pl-14 pb-10 {{ !$loop->last ? 'border-l-2 border-[#e5ddc8] ml-4' : 'ml-4' }}">
                        <span class="absolute -left-4 top-0 w-8 h-8 rounded-full bg-[#123D2E] text-[#C99A3E] text-xs font-bold flex items-center justify-center">
                            {{ $level['n'] }}
                        </span>
                        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.2em]">{{ $level['label'] }}</p>
                        <p class="text-[#123D2E] font-display text-lg mt-1">{{ $level['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== CHAÎNE DE TRANSFORMATION ===== --}}
    <section class="py-16 bg-[#123D2E] text-white reveal">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="font-display text-2xl md:text-3xl font-semibold">{{ __('architecture.chain_title') }}</h2>

            <div class="mt-10 flex flex-col lg:flex-row lg:items-stretch gap-3">
                @foreach (__('architecture.chain') as $step)
                    <div class="flex-1 border border-white/15 bg-white/[0.03] p-4 flex items-center justify-center text-center hover-lift">
                        <p class="text-sm font-medium">{{ $step }}</p>
                    </div>
                    @if (! $loop->last)
                        <div class="hidden lg:flex items-center justify-center text-[#C99A3E]" aria-hidden="true">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </div>
                        <div class="flex lg:hidden items-center justify-center text-[#C99A3E]" aria-hidden="true">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 3 COMPOSANTES ===== --}}
    <section class="py-16 reveal">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E]">{{ __('architecture.components_title') }}</h2>

            <div class="grid md:grid-cols-3 gap-5 mt-10">
                @foreach (__('architecture.components') as $component)
                    <div class="bg-white border-t-2 border-[#C99A3E] border-x border-b border-x-[#eadfca] border-b-[#eadfca] p-6 hover-lift">
                        <h3 class="font-display text-xl font-semibold text-[#123D2E]">{{ $component['name'] }}</h3>
                        <p class="text-sm text-[#6F6759] mt-2 leading-relaxed">{{ $component['role'] }}</p>
                        <ul class="mt-4 space-y-2">
                            @foreach ($component['functions'] as $fn)
                                <li class="text-sm text-[#4a453c] border-t border-[#eadfca] pt-2 first:border-t-0 first:pt-0">{{ $fn }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== PARCOURS DANS LA TRIBU ===== --}}
    <section class="py-16 pb-20 bg-[#F3EDE0] reveal">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E]">{{ __('architecture.tribe_title') }}</h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 mt-10">
                @foreach (__('architecture.tribe') as $i => $role)
                    <div class="bg-white p-6 border border-[#eadfca] hover-lift">
                        <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">0{{ $i + 1 }}</p>
                        <h3 class="font-display font-semibold text-[#123D2E] mt-2">{{ $role['name'] }}</h3>
                        <p class="text-sm text-[#6F6759] mt-2 leading-relaxed">{{ $role['text'] }}</p>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('join.index', app()->getLocale()) }}"
               class="btn-tbw inline-flex mt-10 bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] px-6 py-3 text-xs font-bold uppercase tracking-wider">
                {{ __('site.nav.join') }}
            </a>
        </div>
    </section>
@endsection
