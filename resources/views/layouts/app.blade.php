<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fondation TUBAWWIRI (TBW)')</title>
    <meta name="description" content="@yield('meta_description', 'La Fondation TUBAWWIRI (TBW) œuvre pour la promotion de la santé mentale communautaire et de la résilience humaine.')">
    @include('layouts.seo-head')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        a { text-decoration: none; }
        .font-display { font-family: 'Fraunces', serif; }
        .font-body { font-family: 'Work Sans', sans-serif; }
        .root-divider {
            background-image: radial-gradient(circle, #C99A3E 1.5px, transparent 1.5px);
            background-size: 8px 8px;
        }
    </style>

    <link rel="icon" href="{{ asset('images/logo-tbw.jpg') }}">
</head>
<body class="font-body text-[#211D16] bg-[#F6F1E4] flex flex-col min-h-screen">

    {{-- Liseré signature en haut --}}
    <div class="h-[3px] w-full bg-gradient-to-r from-[#6B2A28] via-[#C99A3E] to-[#3B2560]"></div>

    {{-- ================= HEADER ================= --}}
    <header class="bg-[#F6F1E4]/95 backdrop-blur sticky top-0 z-50 border-b border-[#e5ddc8]">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-20 gap-4">
            <a href="{{ route('home', app()->getLocale()) }}" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('images/logo-tbw.jpg') }}" alt="Fondation TUBAWWIRI (TBW)" class="h-11 w-11 object-cover rounded-full ring-1 ring-[#C99A3E]">
                <div class="hidden xl:block leading-none">
                    <p class="font-display font-semibold text-[#123D2E] text-base whitespace-nowrap">Fondation TUBAWWIRI</p>
                    <p class="text-[10px] tracking-[0.2em] text-[#C99A3E] font-semibold mt-0.5">(TBW)</p>
                </div>
            </a>

            <nav class="hidden lg:flex items-center gap-5 text-[11px] font-semibold uppercase tracking-wider text-[#123D2E] overflow-x-auto whitespace-nowrap">
                <a href="{{ route('home', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.home') }}</a>
                <a href="{{ route('about', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.about') }}</a>
                <a href="{{ route('approach', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.approach') }}</a>
                <a href="{{ route('action-domains.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.domains') }}</a>
                <a href="{{ route('programs.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.programs') }}</a>
                <a href="{{ route('observatory.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.observatory') }}</a>
                <a href="{{ route('consulting.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.consulting') }}</a>
                <a href="{{ route('academy.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.academy') }}</a>
                <a href="{{ route('resources.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.resources') }}</a>
                <a href="{{ route('news.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.news') }}</a>
                <a href="{{ route('impact.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.impact') }}</a>
                <a href="{{ route('join.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.join') }}</a>
                <a href="{{ route('media.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.media') }}</a>
                <a href="{{ route('contact.index', app()->getLocale()) }}" class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">{{ __('site.nav.contact') }}</a>
            </nav>

            <div class="flex items-center gap-4 shrink-0">
                @php
                    $currentPath = request()->path();
                    $pathWithoutLocale = preg_replace('#^(fr|en)#', '', $currentPath);
                    $frUrl = url('/fr' . $pathWithoutLocale);
                    $enUrl = url('/en' . $pathWithoutLocale);
                @endphp
                <div class="flex items-center gap-2 text-xs font-semibold text-[#123D2E]">
                    <a href="{{ $frUrl }}" class="{{ app()->getLocale() === 'fr' ? 'text-[#C99A3E]' : 'hover:text-[#C99A3E]' }}">FR</a>
                    <span class="text-[#6B2A28]">|</span>
                    <a href="{{ $enUrl }}" class="{{ app()->getLocale() === 'en' ? 'text-[#C99A3E]' : 'hover:text-[#C99A3E]' }}">EN</a>
                </div>

                <a href="{{ route('donation.index', app()->getLocale()) }}"
                   class="bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] text-xs font-bold uppercase tracking-wider px-4 py-2.5 transition">
                    {{ __('site.nav.donate') }}
                </a>
            </div>
        </div>
    </header>

    {{-- ================= FLASH MESSAGES ================= --}}
    @if (session('success'))
        <div class="max-w-4xl mx-auto mt-6 px-4">
            <div class="border-l-2 border-[#123D2E] bg-white px-4 py-3 text-sm text-[#123D2E]">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- ================= CONTENU ================= --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- ================= FOOTER ================= --}}
    <footer class="bg-[#123D2E] text-[#cfe0d5] mt-16">
        <div class="h-2 root-divider opacity-40"></div>
        <div class="max-w-7xl mx-auto px-4 py-14 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <p class="font-display font-semibold text-white text-lg">Fondation TUBAWWIRI</p>
                <p class="text-[10px] tracking-[0.2em] text-[#C99A3E] font-semibold mt-1">(TBW)</p>
                <p class="text-sm text-[#8fae9d] mt-3 italic font-display">{{ __('site.tagline') }}</p>
                <p class="text-xs text-[#8fae9d] mt-4 leading-relaxed">{{ __('site.mission_short') }}</p>
            </div>
            <div>
                <p class="font-semibold text-white text-xs uppercase tracking-wider mb-4">{{ __('site.footer.links') }}</p>
                <ul class="space-y-2.5 text-sm text-[#cfe0d5]">
                    <li><a href="{{ route('about', app()->getLocale()) }}" class="hover:text-[#C99A3E]">{{ __('site.nav.about') }}</a></li>
                    <li><a href="{{ route('approach', app()->getLocale()) }}" class="hover:text-[#C99A3E]">{{ __('site.nav.approach') }}</a></li>
                    <li><a href="{{ route('programs.index', app()->getLocale()) }}" class="hover:text-[#C99A3E]">{{ __('site.nav.programs') }}</a></li>
                    <li><a href="{{ route('resources.index', app()->getLocale()) }}" class="hover:text-[#C99A3E]">{{ __('site.nav.resources') }}</a></li>
                    <li><a href="{{ route('contact.index', app()->getLocale()) }}" class="hover:text-[#C99A3E]">{{ __('site.nav.contact') }}</a></li>
                </ul>
            </div>
            <div>
                <p class="font-semibold text-white text-xs uppercase tracking-wider mb-4">{{ __('site.footer.follow_us') }}</p>
                <div class="flex gap-3 text-sm">
                    <a href="#" class="hover:text-[#C99A3E]">Facebook</a>
                    <a href="#" class="hover:text-[#C99A3E]">Instagram</a>
                    <a href="#" class="hover:text-[#C99A3E]">LinkedIn</a>
                </div>
                <a href="https://wa.me/000000000" class="mt-4 inline-block text-sm text-[#C99A3E] font-semibold">WhatsApp →</a>
            </div>
            <div>
                <p class="font-semibold text-white text-xs uppercase tracking-wider mb-4">Contact</p>
                <p class="text-sm text-[#cfe0d5]">contact@tubawwiri.org</p>
                <p class="text-sm text-[#cfe0d5]">www.tubawwiri.org</p>
            </div>
        </div>
        <div class="border-t border-[#1c4d3a] text-center text-xs text-[#8fae9d] py-4">
            &copy; {{ date('Y') }} Fondation TUBAWWIRI (TBW) — {{ __('site.footer.rights') }}
        </div>
    </footer>

    <a href="https://wa.me/000000000" target="_blank"
       class="fixed bottom-5 right-5 bg-[#25D366] hover:brightness-95 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg z-50">
        <span class="text-2xl">💬</span>
    </a>

</body>
</html>
