@props([
    'image' => null,
    'imageUrl' => null,
    'imagePosition' => 'center',
    'kicker' => 'Fondation TUBAWWIRI (TBW)',
    'title',
    'intro' => null,
])

<section class="relative min-h-[38vh] flex items-end overflow-hidden reveal">
    <img src="{{ $imageUrl ?: asset('images/' . $image) }}" alt="" style="object-position: {{ $imagePosition }};"
         class="absolute inset-0 w-full h-full object-cover hero-kenburns">
    <div class="absolute inset-0 bg-gradient-to-t from-[#0b261c]/94 via-[#123D2E]/72 to-[#123D2E]/30"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 pb-10 pt-24">
        <p class="text-xs font-bold text-[#C99A3E] uppercase tracking-[0.25em]">{{ $kicker }}</p>
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-white mt-2">{{ $title }}</h1>
        @if ($intro)
            <p class="text-white/85 mt-4 max-w-2xl leading-relaxed">{{ $intro }}</p>
        @endif
    </div>
</section>
