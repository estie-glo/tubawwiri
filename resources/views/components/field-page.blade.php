@props([
    'kicker',
    'pageTitle',
    'icon',
    'heading',
    'position',
    'total',
    'urlFor',
    'photoUrl' => null,
    'photoSoft' => false,
])

<section class="min-h-[65vh] flex flex-col items-center justify-center px-4 py-16 reveal">
    <div class="w-full max-w-5xl">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em] text-center mb-2">{{ $kicker }}</p>
        <h1 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E] text-center mb-10">{{ $pageTitle }}</h1>

        <div class="relative flex items-center gap-3 sm:gap-5">
            <a href="{{ $urlFor(max($position - 1, 1)) }}" id="page-nav-prev" aria-label="{{ __('pages.previous') }}" data-first-url="{{ $urlFor(1) }}"
               class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-[#C99A3E] hover:bg-[#C99A3E] hover:text-white transition {{ $position <= 1 ? 'opacity-30 pointer-events-none' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </a>

            <div class="page-swipe-card relative flex-1 bg-white rounded-[2.5rem] overflow-hidden shadow-sm min-h-[380px] p-8 md:p-14">
                @if ($photoUrl && $photoSoft)
                    {{-- Source basse résolution : fond flouté (dissimule le manque de netteté) + vignette non agrandie --}}
                    <img src="{{ $photoUrl }}" alt="" class="absolute inset-0 w-full h-full object-cover hero-kenburns opacity-40 blur-xl">
                    <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-white/20"></div>
                    <img src="{{ $photoUrl }}" alt="" class="hidden md:block absolute right-8 top-1/2 -translate-y-1/2 w-[280px] max-h-[70%] object-cover rounded-2xl shadow-lg">
                @elseif ($photoUrl)
                    <img src="{{ $photoUrl }}" alt="" class="absolute inset-0 w-full h-full object-cover hero-kenburns opacity-90">
                    <div class="absolute inset-0 bg-gradient-to-r from-white via-white/75 to-white/10"></div>
                @endif

                <div class="relative z-10 max-w-lg">
                    <p class="text-xs font-bold text-[#C99A3E] tracking-[0.2em]">
                        {{ str_pad($position, 2, '0', STR_PAD_LEFT) }}
                    </p>
                    <div class="w-14 h-14 rounded-full bg-[#123D2E] border-2 border-[#C99A3E] flex items-center justify-center mt-4">
                        <svg class="w-6 h-6 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $icon !!}</svg>
                    </div>
                    <h2 class="font-display text-2xl md:text-3xl font-semibold text-[#123D2E] mt-5 leading-snug">
                        {{ $heading }}
                    </h2>
                    <div class="w-12 h-[3px] bg-[#C99A3E] mt-4 mb-4"></div>
                    <div class="prose max-w-none text-[#4a453c] leading-relaxed">
                        {{ $slot }}
                    </div>
                </div>
            </div>

            <a href="{{ $urlFor(min($position + 1, $total)) }}" id="page-nav-next" aria-label="{{ __('pages.next') }}"
               class="hidden sm:flex shrink-0 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-[#C99A3E] hover:bg-[#C99A3E] hover:text-white transition {{ $position >= $total ? 'opacity-30 pointer-events-none' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="flex sm:hidden items-center justify-between mt-5">
            <a href="{{ $urlFor(max($position - 1, 1)) }}" class="text-xs font-bold uppercase tracking-wider text-[#C99A3E] {{ $position <= 1 ? 'opacity-30 pointer-events-none' : '' }}">← {{ __('pages.previous') }}</a>
            <a href="{{ $urlFor(min($position + 1, $total)) }}" class="text-xs font-bold uppercase tracking-wider text-[#C99A3E] {{ $position >= $total ? 'opacity-30 pointer-events-none' : '' }}">{{ __('pages.next') }} →</a>
        </div>

        <div class="flex items-center justify-center gap-2 mt-7">
            @for ($n = 1; $n <= $total; $n++)
                <a href="{{ $urlFor($n) }}" aria-label="{{ $n }}/{{ $total }}"
                   class="w-2.5 h-2.5 rounded-full transition {{ $n === $position ? 'bg-[#C99A3E]' : 'bg-[#d8cfb8] hover:bg-[#C99A3E]/50' }}"></a>
            @endfor
        </div>

        @isset($footer)
            <div class="mt-8">{{ $footer }}</div>
        @endisset
    </div>
</section>
