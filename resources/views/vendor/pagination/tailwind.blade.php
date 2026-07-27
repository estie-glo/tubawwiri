@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-center gap-2">
        {{-- Précédent --}}
        @if ($paginator->onFirstPage())
            <span class="w-9 h-9 flex items-center justify-center text-[#c9c2ac] border border-[#e5ddc8]">‹</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="w-9 h-9 flex items-center justify-center text-[#123D2E] border border-[#e5ddc8] hover:border-[#123D2E] transition">‹</a>
        @endif

        {{-- Numéros de page --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="w-9 h-9 flex items-center justify-center text-[#8a8372] text-sm">…</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="w-9 h-9 flex items-center justify-center bg-[#123D2E] text-white text-sm font-semibold">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="w-9 h-9 flex items-center justify-center text-[#123D2E] text-sm border border-[#e5ddc8] hover:border-[#123D2E] transition">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Suivant --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="w-9 h-9 flex items-center justify-center text-[#123D2E] border border-[#e5ddc8] hover:border-[#123D2E] transition">›</a>
        @else
            <span class="w-9 h-9 flex items-center justify-center text-[#c9c2ac] border border-[#e5ddc8]">›</span>
        @endif
    </nav>
@endif
