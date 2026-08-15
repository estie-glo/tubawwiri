@props([
    'centerLabel' => null,
    'centerIcon' => null,
    'nodes' => [],
    'size' => 280,
    'radius' => 105,
])

@php
    $count = count($nodes);
    $half = $size / 2;
@endphp

<div class="relative mx-auto" style="width: {{ $size }}px; height: {{ $size }}px;">
    {{-- Cercle guide --}}
    <div class="absolute inset-0 rounded-full border border-dashed border-[#C99A3E]/30"></div>

    {{-- Centre --}}
    <div class="absolute rounded-full bg-[#123D2E] border-2 border-[#C99A3E] flex flex-col items-center justify-center text-center px-2"
         style="width: 84px; height: 84px; left: {{ $half - 42 }}px; top: {{ $half - 42 }}px;">
        @if ($centerIcon)
            <svg class="w-6 h-6 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $centerIcon !!}</svg>
        @endif
        @if ($centerLabel)
            <span class="text-[9px] font-bold text-white uppercase tracking-wide mt-1 leading-none">{{ $centerLabel }}</span>
        @endif
    </div>

    {{-- Nœuds --}}
    @foreach ($nodes as $i => $node)
        @php
            $angle = (360 / max($count, 1)) * $i - 90;
            $rad = deg2rad($angle);
            $x = $half + $radius * cos($rad);
            $y = $half + $radius * sin($rad);
        @endphp
        <div class="absolute flex flex-col items-center text-center" style="width: 74px; left: {{ $x - 37 }}px; top: {{ $y - 26 }}px;">
            <div class="w-10 h-10 rounded-full bg-white border border-[#C99A3E] flex items-center justify-center shadow-sm shrink-0">
                <svg class="w-4.5 h-4.5 text-[#123D2E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $node['icon'] !!}</svg>
            </div>
            <span class="text-[9px] font-bold text-[#123D2E] uppercase tracking-wide mt-1 leading-tight">{{ $node['label'] }}</span>
        </div>
    @endforeach
</div>
