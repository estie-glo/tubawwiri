@props(['domain', 'index', 'highlighted' => false])

@php
    $domainIcons = [
        'sante-mentale-communautaire' => '<path d="M12 21s-7-4.5-7-10a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 5.5-7 10-7 10-1.3-1-2.6-1.9-4-3Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
        'resilience-humaine' => '<path d="M12 21v-9m0 0c0-4.5-3-7-7-7 0 4.5 2.5 7 7 7Zm0 0c0-4.5 3-7 7-7 0 4.5-2.5 7-7 7Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>',
        'parentalite-positive' => '<circle cx="8" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="16" cy="9" r="2.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M3.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3M11.5 19c.6-2.8 2.4-4.3 4.5-4.3s3.9 1.5 4.5 4.3" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
        'protection-de-lenfant' => '<path d="M12 3.5 4.5 6v5c0 5 3 8 7.5 9.5C16.5 19 19.5 16 19.5 11V6L12 3.5Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
        'leadership-feminin' => '<circle cx="12" cy="8" r="3.3" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M5 20c1-3.5 4-5.5 7-5.5s6 2 7 5.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
        'formation-renforcement-capacites' => '<path d="M4 5.5C4 4.7 4.7 4 5.5 4H12v16H5.5A1.5 1.5 0 0 1 4 18.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M20 5.5c0-.8-.7-1.5-1.5-1.5H12v16h6.5a1.5 1.5 0 0 0 1.5-1.5v-13Z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
        'developpement-communautaire' => '<circle cx="7" cy="9" r="2" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="17" cy="9" r="2" fill="none" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="7" r="2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M2.8 18c.5-2.3 2.1-3.6 4.2-3.6M21.2 18c-.5-2.3-2.1-3.6-4.2-3.6M8.2 19c.6-2.6 2.1-4 3.8-4s3.2 1.4 3.8 4" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
    ];
    $bgPhotos = ['village.jpg', 'family.jpg', 'statue.jpg', 'sunset.jpg'];
    $photoUrl = $domain->cover_image ? asset('storage/' . $domain->cover_image) : asset('images/community/' . $bgPhotos[$index % count($bgPhotos)]);
@endphp

<a href="{{ route('action-domains.show', [app()->getLocale(), $domain->slug]) }}"
   class="reveal group w-full h-full bg-white border {{ $highlighted ? 'border-[#C99A3E]' : 'border-[#eadfca]' }} rounded-2xl overflow-hidden hover-lift flex flex-col"
   style="transition-delay: {{ ($index % 5) * 80 }}ms">
    <div class="p-5 flex flex-col flex-1">
        <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</p>
        <div class="w-11 h-11 rounded-full bg-[#123D2E] flex items-center justify-center mt-3">
            <svg class="w-5 h-5 text-[#C99A3E]" viewBox="0 0 24 24" fill="none" aria-hidden="true">{!! $domainIcons[$domain->slug] ?? $domainIcons['developpement-communautaire'] !!}</svg>
        </div>
        <h3 class="font-display font-semibold text-[#123D2E] mt-3 leading-snug">{{ localized($domain, 'title') }}</h3>
        <p class="text-xs text-[#6F6759] mt-2 leading-relaxed line-clamp-2">{{ localized($domain, 'summary') }}</p>
    </div>
    <div class="h-28 overflow-hidden">
        <img src="{{ $photoUrl }}" alt="" class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
    </div>
</a>
