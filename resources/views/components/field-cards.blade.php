@props(['fields'])
@php
    $photos = ['village.jpg', 'family.jpg', 'statue.jpg', 'sunset.jpg'];
@endphp

<div class="grid sm:grid-cols-2 gap-5">
    @foreach ($fields as $i => $field)
        <div class="bg-white border border-[#eadfca] overflow-hidden hover-lift">
            <div class="relative h-28 overflow-hidden">
                <img src="{{ asset('images/community/' . $photos[$i % count($photos)]) }}" alt=""
                     class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#123D2E]/85 via-[#123D2E]/25 to-transparent"></div>
                <p class="absolute bottom-3 left-4 right-4 text-xs font-bold text-white uppercase tracking-widest">{{ $field['label'] }}</p>
            </div>
            <div class="prose max-w-none text-sm text-[#4a453c] p-5">{!! $field['html'] !!}</div>
        </div>
    @endforeach
</div>
