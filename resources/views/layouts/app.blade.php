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
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,400;1,9..144,500&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --tbw-forest: #123D2E;
            --tbw-gold: #C99A3E;
            --tbw-wine: #6B2A28;
            --tbw-violet: #3B2560;
            --tbw-sand: #F3EDE0;
            --tbw-ink: #1C1914;
            --tbw-muted: #6F6759;
        }
        a { text-decoration: none; }
        .font-display { font-family: 'Fraunces', Georgia, serif; }
        .font-body { font-family: 'Manrope', system-ui, sans-serif; }
        .root-divider {
            background-image: radial-gradient(circle, #C99A3E 1.4px, transparent 1.4px);
            background-size: 10px 10px;
        }
        .reveal {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .reveal-visible { opacity: 1; transform: translateY(0); }
        .hover-lift {
            transition: transform 0.28s ease, box-shadow 0.28s ease;
        }
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 40px rgba(18, 61, 46, 0.12);
        }
        .btn-tbw {
            position: relative;
            border-radius: 999px;
            transition: transform 0.25s ease, box-shadow 0.25s ease, background-color 0.25s ease, color 0.25s ease, border-color 0.25s ease;
        }
        .btn-tbw:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(18, 61, 46, 0.18);
        }
        .btn-tbw:active {
            transform: translateY(0);
            box-shadow: none;
        }
        .field-input {
            width: 100%;
            background: #fff;
            border: 1px solid #e2d8c4;
            border-radius: 1.25rem;
            padding: 0.7rem 0.9rem;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .field-input:focus {
            border-color: #123D2E;
            box-shadow: 0 0 0 3px rgba(18, 61, 46, 0.08);
        }
        .nav-panel {
            opacity: 0;
            visibility: hidden;
            transform: translateY(6px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
        }
        .nav-group:hover .nav-panel,
        .nav-group:focus-within .nav-panel {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .nav-group:hover .nav-chevron,
        .nav-group:focus-within .nav-chevron {
            transform: rotate(180deg);
        }
        .hero-kenburns {
            animation: kenburns 22s ease-in-out infinite alternate;
        }
        @keyframes kenburns {
            from { transform: scale(1); }
            to { transform: scale(1.08); }
        }
        .marquee-viewport {
            overflow: hidden;
            -webkit-mask-image: linear-gradient(to right, transparent, black 4%, black 96%, transparent);
            mask-image: linear-gradient(to right, transparent, black 4%, black 96%, transparent);
        }
        .marquee-track {
            display: flex;
            width: max-content;
            animation: marquee-scroll var(--marquee-duration, 42s) linear infinite;
        }
        .marquee-viewport:hover .marquee-track {
            animation-play-state: paused;
        }
        @keyframes marquee-scroll {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }
        @media (prefers-reduced-motion: reduce) {
            .hero-kenburns { animation: none; }
            .reveal { opacity: 1; transform: none; }
            .marquee-track { animation: none; }
        }
        .content-scroll-viewport {
            overflow-x: auto;
            scroll-snap-type: x proximity;
            scrollbar-width: thin;
            scrollbar-color: #C99A3E transparent;
            -webkit-overflow-scrolling: touch;
        }
        .content-scroll-viewport::-webkit-scrollbar {
            height: 6px;
        }
        .content-scroll-viewport::-webkit-scrollbar-thumb {
            background: #C99A3E;
        }
        .content-scroll-track {
            display: flex;
        }
        .content-card {
            scroll-snap-align: start;
            border-radius: 1.5rem;
            overflow: hidden;
        }
        .scroll-arrow-btn {
            transition: transform 0.2s ease, background-color 0.2s ease;
        }
        .scroll-arrow-btn:hover {
            transform: translateX(3px);
            background-color: #b3872f;
        }
        .prose :where(p) { margin: 0.55em 0; }
        .prose :where(p:first-child) { margin-top: 0; }
        .prose :where(p:last-child) { margin-bottom: 0; }
        .prose :where(ul) { margin: 0.55em 0; padding-left: 1.15em; list-style: disc; }
        .prose :where(li) { margin: 0.2em 0; }
        .prose :where(blockquote) { border-left: 2px solid currentColor; padding-left: 0.9em; font-style: italic; margin: 0.65em 0; }
        .prose :where(strong) { font-weight: 700; }
    .tbw-bg-photo {
        position: absolute;
        inset: 0;
        background-image: url("/images/bg-tubawwiri.png");
        background-size: cover;
        background-position: center;
        z-index: -20;
    }
    .tbw-bg-logo-badge {
        position: absolute;
        bottom: 24px;
        right: 24px;
        width: 90px;
        opacity: 0.9;
        z-index: -10;
    }
    </style>

    <link rel="icon" href="{{ asset('images/logo-mark.png') }}">
</head>
<body class="font-body text-[var(--tbw-ink)] bg-[var(--tbw-sand)] flex flex-col min-h-screen">
    @php
        $social = config('tubawwiri.social');
        $contact = config('tubawwiri.contact');
        $whatsappDigits = preg_replace('/\D+/', '', $contact['whatsapp'] ?? '');
        $locale = app()->getLocale();
        $primaryNav = [
            ['route' => 'home', 'label' => __('site.nav.home')],
            ['route' => 'about', 'label' => __('site.nav.about')],
            ['route' => 'approach', 'label' => __('site.nav.approach')],
            ['route' => 'action-domains.index', 'label' => __('site.nav.domains')],
            ['route' => 'programs.index', 'label' => __('site.nav.programs')],
            ['route' => 'academy.index', 'label' => __('site.nav.academy')],
            ['route' => 'consulting.index', 'label' => __('site.nav.consulting')],
            ['route' => 'contact.index', 'label' => __('site.nav.contact')],
        ];
        $moreNav = [
            ['route' => 'rubriques.index', 'label' => __('rubriques.title')],
            ['route' => 'founder.index', 'label' => __('founder.title')],
            ['route' => 'architecture.index', 'label' => __('architecture.title')],
            ['route' => 'observatory.index', 'label' => __('site.nav.observatory')],
            ['route' => 'resources.index', 'label' => __('site.nav.resources')],
            ['route' => 'news.index', 'label' => __('site.nav.news')],
            ['route' => 'impact.index', 'label' => __('site.nav.impact')],
            ['route' => 'join.index', 'label' => __('site.nav.join')],
            ['route' => 'media.index', 'label' => __('site.nav.media')],
        ];
        $mobileNav = array_merge($primaryNav, $moreNav);
        $currentPath = request()->path();
        $pathWithoutLocale = preg_replace('#^(fr|en)#', '', $currentPath);
        $frUrl = url('/fr' . $pathWithoutLocale);
        $enUrl = url('/en' . $pathWithoutLocale);
    @endphp

    <div class="h-[3px] w-full bg-gradient-to-r from-[#6B2A28] via-[#C99A3E] to-[#3B2560]"></div>

    <header class="sticky top-0 z-50 bg-[#F3EDE0]/92 backdrop-blur-md border-b border-[#e4dac6]">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-[4.5rem] gap-4">
            <a href="{{ route('home', $locale) }}" class="flex items-center gap-3 shrink-0 min-w-0">
                <img src="{{ asset('images/logo-mark.png') }}" alt="TUBAWWIRI" class="h-11 w-11 object-contain">
                <div class="leading-tight min-w-0">
                    <p class="font-display font-semibold text-[#123D2E] text-[0.95rem] tracking-tight truncate">TUBAWWIRI</p>
                    <p class="text-[10px] tracking-[0.22em] text-[#C99A3E] font-semibold">TBW</p>
                </div>
            </a>

            <nav class="hidden xl:flex items-center text-[11px] font-semibold uppercase tracking-[0.12em] text-[#123D2E]">
                @foreach ($primaryNav as $link)
                    @php $isActive = request()->routeIs($link['route']); @endphp
                    <a href="{{ route($link['route'], $locale) }}"
                       class="relative px-2.5 py-2 transition {{ $isActive ? 'text-[#6B2A28]' : 'hover:text-[#C99A3E]' }}">
                        {{ $link['label'] }}
                        <span class="absolute left-2.5 right-2.5 -bottom-[1px] h-[2px] bg-[#C99A3E] transition-transform origin-left {{ $isActive ? 'scale-x-100' : 'scale-x-0' }}"></span>
                    </a>
                    @if (! $loop->last)
                        <span class="w-1 h-1 rounded-full bg-[#d8cfb8]" aria-hidden="true"></span>
                    @endif
                @endforeach
                <span class="w-1 h-1 rounded-full bg-[#d8cfb8] mx-2.5" aria-hidden="true"></span>
                <div class="relative nav-group">
                    <button type="button" class="flex items-center gap-1 px-2.5 py-2 hover:text-[#C99A3E] transition uppercase tracking-[0.12em]">
                        {{ __('site.nav.more') }}
                        <svg class="nav-chevron w-3 h-3 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="nav-panel absolute right-0 top-full mt-3 w-60 bg-[#F3EDE0] border border-[#e4dac6] shadow-xl rounded-3xl p-2 z-50">
                        <p class="px-3 pt-1.5 pb-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#C99A3E]">{{ __('site.nav.more') }}</p>
                        @foreach ($moreNav as $link)
                            @php $isActive = request()->routeIs($link['route']); @endphp
                            <a href="{{ route($link['route'], $locale) }}"
                               class="block px-3 py-2.5 text-[11px] rounded-xl border-l-2 transition {{ $isActive ? 'border-[#C99A3E] bg-white text-[#6B2A28]' : 'border-transparent hover:bg-white hover:text-[#C99A3E] hover:border-[#C99A3E]' }}">
                                {{ $link['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </nav>

            <div class="flex items-center gap-3 shrink-0">
                <div class="flex items-center gap-2 text-xs font-semibold text-[#123D2E]">
                    <a href="{{ $frUrl }}" class="{{ $locale === 'fr' ? 'text-[#C99A3E]' : 'hover:text-[#C99A3E]' }}">FR</a>
                    <span class="text-[#6B2A28]/50">|</span>
                    <a href="{{ $enUrl }}" class="{{ $locale === 'en' ? 'text-[#C99A3E]' : 'hover:text-[#C99A3E]' }}">EN</a>
                </div>

                <a href="{{ route('donation.index', $locale) }}"
                   class="btn-tbw hidden sm:inline-flex bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] text-xs font-bold uppercase tracking-wider px-4 py-2.5">
                    {{ __('site.nav.donate') }}
                </a>

                <button type="button" id="mobile-menu-toggle" class="xl:hidden inline-flex items-center justify-center w-10 h-10 border border-[#d8cfb8] text-[#123D2E]" aria-expanded="false" aria-controls="mobile-menu">
                    <span class="sr-only">Menu</span>
                    <svg id="icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden xl:hidden border-t border-[#e4dac6] bg-[#F3EDE0] max-h-[70vh] overflow-y-auto">
            <nav class="max-w-7xl mx-auto px-4 py-4 grid gap-1 text-sm font-semibold uppercase tracking-wider text-[#123D2E]">
                @foreach ($mobileNav as $link)
                    @php $isActive = request()->routeIs($link['route']); @endphp
                    <a href="{{ route($link['route'], $locale) }}" class="py-2.5 border-b border-[#ebe3d0] flex items-center justify-between {{ $isActive ? 'text-[#6B2A28]' : 'hover:text-[#C99A3E]' }}">
                        {{ $link['label'] }}
                        @if ($isActive)
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C99A3E]"></span>
                        @endif
                    </a>
                @endforeach
                <a href="{{ route('donation.index', $locale) }}" class="btn-tbw mt-3 bg-[#C99A3E] text-[#123D2E] text-center py-3 tracking-wider">
                    {{ __('site.nav.donate') }}
                </a>
            </nav>
        </div>
    </header>

    @if (session('success'))
        <div id="flash-message" class="max-w-4xl mx-auto mt-6 px-4">
            <div class="flex items-start gap-4 bg-white border-l-[3px] border-[#123D2E] rounded-2xl px-5 py-4 shadow-sm">
                <div class="shrink-0 w-8 h-8 rounded-full bg-[#123D2E] text-white flex items-center justify-center text-sm font-bold mt-0.5">✓</div>
                <div class="flex-1">
                    <p class="text-xs font-bold text-[#123D2E] uppercase tracking-widest">{{ __('forms.flash_title') }}</p>
                    <p class="text-sm text-[#4a453c] mt-1">{{ session('success') }}</p>
                </div>
                <button onclick="document.getElementById('flash-message').remove()" class="text-[#8a8372] hover:text-[#123D2E] text-sm">✕</button>
            </div>
        </div>
    @endif

    <main class="flex-1">
        @yield('content')
    </main>

    @php
        $socialIcons = [
            'facebook' => '<path d="M22 12.06C22 6.51 17.52 2 12 2S2 6.51 2 12.06c0 5 3.66 9.13 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.45h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.91h-2.34V22c4.78-.81 8.44-4.94 8.44-9.94Z"/>',
            'instagram' => '<rect x="3" y="3" width="18" height="18" rx="5" fill="none" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="12" r="4.1" fill="none" stroke="currentColor" stroke-width="1.7"/><circle cx="17.3" cy="6.7" r="1.05" fill="currentColor"/>',
            'youtube' => '<rect x="2.3" y="6" width="19.4" height="12" rx="3.5" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M10 9.6v4.8l4.4-2.4-4.4-2.4Z" fill="currentColor"/>',
            'tiktok' => '<path d="M16.6 2h-3.1v13.4a2.6 2.6 0 1 1-2.6-2.6c.2 0 .4 0 .6.05V9.6a5.9 5.9 0 0 0-.6-.03A5.7 5.7 0 1 0 16.6 15.4V9.1a7.7 7.7 0 0 0 4.5 1.4V7.3a4.7 4.7 0 0 1-4.5-4.7V2Z"/>',
            'linkedin' => '<circle cx="6.9" cy="5" r="2" fill="currentColor"/><rect x="5" y="8.5" width="3.8" height="11" fill="currentColor"/><path d="M12.4 8.5h3.6V10h.05c.5-.9 1.7-1.8 3.5-1.8 3.7 0 4.4 2.4 4.4 5.6v5.7h-3.8v-5c0-1.2 0-2.8-1.7-2.8-1.7 0-2 1.3-2 2.7v5.1h-3.8V8.5Z"/>',
            'threads' => '<path d="M12 3c-5 0-8 3-8 8v2c0 5 3 8 8 8 4.1 0 6.6-2 7.1-5.1.2-1.3-.5-2.5-1.8-2.8.1-2-.9-3.4-2.7-3.7-1.7-.3-3.2.5-3.7 2l1.6.5c.2-.6.9-1 1.7-.8.9.2 1.3.9 1.2 1.9-.8-.1-1.7 0-2.4.3-1.4.5-2.1 1.7-1.9 2.9.2 1.3 1.5 2 3 1.9 1.4-.1 2.4-.9 2.8-2.2.3.3.4.7.3 1.1-.3 1.7-2 2.7-4.4 2.7-3.5 0-5.2-1.9-5.2-5.9V11c0-4 1.7-6 5.2-6 1.7 0 3 .6 3.9 1.7l1.5-1.1C15.9 4 14.2 3 12 3Z"/>',
            'whatsapp_channel' => '<path d="M17.5 14.4c-.3-.1-1.6-.8-1.9-.9-.2-.1-.4-.1-.6.1-.2.3-.7.9-.9 1.1-.1.2-.3.2-.6.1-.3-.1-1.2-.4-2.2-1.4-.8-.7-1.4-1.6-1.5-1.9-.1-.3 0-.4.1-.6.1-.1.3-.3.4-.5.1-.1.2-.3.3-.4.1-.2 0-.4 0-.5C11.5 9.4 11.1 8.4 11 8c-.1-.4-.3-.3-.4-.3h-.5c-.2 0-.5.1-.7.3-.3.3-1 1-1 2.3 0 1.4 1 2.7 1.1 2.9.1.2 2 3 4.7 4.2.7.3 1.2.5 1.6.6.7.2 1.3.2 1.7.1.5-.1 1.6-.7 1.9-1.3.2-.6.2-1.2.2-1.3-.1-.1-.3-.2-.6-.3ZM12 2a10 10 0 0 0-8.5 15.2L2 22l4.9-1.3A10 10 0 1 0 12 2Zm0 18.2c-1.6 0-3.2-.4-4.5-1.3l-.3-.2-2.9.8.8-2.8-.2-.3A8.2 8.2 0 1 1 12 20.2Z"/>',
        ];
        $socialLabels = [
            'facebook' => 'Facebook', 'instagram' => 'Instagram', 'youtube' => 'YouTube',
            'tiktok' => 'TikTok', 'linkedin' => 'LinkedIn', 'threads' => 'Threads',
            'whatsapp_channel' => 'WhatsApp',
        ];
    @endphp

    <footer id="site-footer" class="bg-[#123D2E] text-[#cfe0d5] mt-0">
        <div class="h-2 root-divider opacity-40"></div>
        <div class="max-w-7xl mx-auto px-4 py-14 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <img src="{{ asset('images/logo-emblem.png') }}" alt="Fondation TUBAWWIRI" class="h-14 w-auto object-contain mb-4 brightness-110">
                <p class="text-sm text-[#8fae9d] italic font-display">{{ __('site.tagline') }}</p>
                <p class="text-xs text-[#8fae9d] mt-4 leading-relaxed">{{ __('site.mission_short') }}</p>
            </div>
            <div>
                <p class="font-semibold text-white text-xs uppercase tracking-wider mb-4">{{ __('site.footer.links') }}</p>
                <ul class="text-sm">
                    @foreach ([
                        ['route' => 'about', 'label' => __('site.nav.about')],
                        ['route' => 'approach', 'label' => __('site.nav.approach')],
                        ['route' => 'programs.index', 'label' => __('site.nav.programs')],
                        ['route' => 'academy.index', 'label' => __('site.nav.academy')],
                        ['route' => 'contact.index', 'label' => __('site.nav.contact')],
                    ] as $link)
                        <li class="border-b border-white/10">
                            <a href="{{ route($link['route'], $locale) }}" class="group flex items-center justify-between py-2.5 hover:text-[#C99A3E] transition">
                                <span>{{ $link['label'] }}</span>
                                <span class="text-[#C99A3E] opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition">→</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <p class="font-semibold text-white text-xs uppercase tracking-wider mb-4">{{ __('site.footer.follow_us') }}</p>
                <div class="flex flex-wrap gap-2.5">
                    @foreach ($socialIcons as $key => $svgPath)
                        @if (!empty($social[$key]))
                            <a href="{{ $social[$key] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $socialLabels[$key] }}"
                               class="hover-lift w-10 h-10 flex items-center justify-center border border-white/15 text-white/90 hover:bg-[#C99A3E] hover:text-[#123D2E] hover:border-[#C99A3E] transition">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">{!! $svgPath !!}</svg>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="mt-6 space-y-2 text-sm">
                    <a href="mailto:{{ $contact['email'] }}" class="flex items-center gap-2.5 text-[#cfe0d5] hover:text-[#C99A3E] transition">
                        <svg class="w-4 h-4 shrink-0 text-[#C99A3E]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6.75A2.25 2.25 0 0 1 5.25 4.5h13.5A2.25 2.25 0 0 1 21 6.75v10.5A2.25 2.25 0 0 1 18.75 19.5H5.25A2.25 2.25 0 0 1 3 17.25V6.75Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m3.5 7 8.5 6 8.5-6"/></svg>
                        {{ $contact['email'] }}
                    </a>
                    <a href="https://{{ $contact['website'] }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2.5 text-[#cfe0d5] hover:text-[#C99A3E] transition">
                        <svg class="w-4 h-4 shrink-0 text-[#C99A3E]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8.5"/><path stroke-linecap="round" d="M3.5 12h17M12 3.5c2.2 2.4 3.4 5.4 3.4 8.5s-1.2 6.1-3.4 8.5c-2.2-2.4-3.4-5.4-3.4-8.5S9.8 5.9 12 3.5Z"/></svg>
                        {{ $contact['website'] }}
                    </a>
                </div>
            </div>
            <div class="border border-white/15 rounded-3xl p-5">
                <div class="flex items-center gap-2 mb-3">
                    <svg class="w-4 h-4 text-[#C99A3E]" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6.75A2.25 2.25 0 0 1 5.25 4.5h13.5A2.25 2.25 0 0 1 21 6.75v10.5A2.25 2.25 0 0 1 18.75 19.5H5.25A2.25 2.25 0 0 1 3 17.25V6.75Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m3.5 7 8.5 6 8.5-6"/></svg>
                    <p class="font-semibold text-white text-xs uppercase tracking-wider">{{ __('forms.newsletter_title') }}</p>
                </div>
                <p class="text-sm text-[#8fae9d] mb-4">{{ __('forms.newsletter_subtitle') }}</p>
                <form method="POST" action="{{ route('newsletter.store', $locale) }}" class="space-y-3 relative">
                    @csrf
                    <div class="absolute left-[-9999px]" aria-hidden="true">
                        <label for="website_newsletter">Website</label>
                        <input type="text" name="website" id="website_newsletter" tabindex="-1" autocomplete="off">
                    </div>
                    <input type="email" name="email" required placeholder="email@exemple.com"
                           class="w-full bg-[#0f3226] border border-[#1c4d3a] focus:border-[#C99A3E] outline-none rounded-full px-4 py-2.5 text-sm text-white placeholder:text-[#8fae9d]">
                    <button type="submit" class="btn-tbw w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] text-xs font-bold uppercase tracking-wider py-2.5">
                        {{ __('forms.newsletter_submit') }}
                    </button>
                </form>
                <a href="{{ route('newsletter.unsubscribe.form', $locale) }}" class="text-xs text-[#8fae9d] hover:text-[#C99A3E] mt-3 inline-block">{{ __('forms.newsletter_unsubscribe_link') }}</a>
            </div>
        </div>
        <div class="border-t border-[#1c4d3a] text-center text-xs text-[#8fae9d] py-4">
            &copy; {{ date('Y') }} Fondation TUBAWWIRI (TBW) — {{ __('site.footer.rights') }}
        </div>
    </footer>

    @if ($whatsappDigits || !empty($social['whatsapp_channel']))
        <a href="{{ $whatsappDigits ? 'https://wa.me/'.$whatsappDigits : $social['whatsapp_channel'] }}"
           target="_blank" rel="noopener noreferrer"
           class="fixed bottom-5 right-5 bg-[#25D366] hover:brightness-95 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg z-50"
           aria-label="WhatsApp">
            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M20.52 3.48A11.86 11.86 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.9c0 2.1.55 4.15 1.6 5.96L0 24l6.3-1.65a11.86 11.86 0 0 0 5.74 1.46h.01c6.55 0 11.9-5.34 11.9-11.9 0-3.18-1.24-6.17-3.43-8.43ZM12.05 21.2h-.01a9.3 9.3 0 0 1-4.74-1.3l-.34-.2-3.74.98 1-3.64-.22-.37a9.28 9.28 0 0 1-1.42-4.96c0-5.13 4.18-9.3 9.32-9.3a9.25 9.25 0 0 1 9.3 9.31c0 5.13-4.18 9.28-9.29 9.28Zm5.1-6.96c-.28-.14-1.65-.81-1.9-.9-.26-.1-.44-.14-.63.14-.19.28-.72.9-.88 1.08-.16.19-.33.21-.6.07-.28-.14-1.17-.43-2.23-1.37-.82-.73-1.38-1.64-1.54-1.92-.16-.28-.02-.43.12-.57.12-.12.28-.33.42-.49.14-.16.19-.28.28-.47.1-.19.05-.35-.02-.49-.07-.14-.63-1.52-.86-2.08-.23-.55-.46-.47-.63-.48h-.54c-.19 0-.49.07-.75.35-.26.28-.98.96-.98 2.34s1.01 2.71 1.15 2.9c.14.19 1.98 3.02 4.8 4.23.67.29 1.19.46 1.6.59.67.21 1.28.18 1.76.11.54-.08 1.65-.67 1.88-1.32.23-.65.23-1.2.16-1.32-.07-.11-.25-.18-.53-.32Z"/>
            </svg>
        </a>
    @endif

    <script src="{{ asset('js/reveal.js') }}"></script>
    <script>
        (function () {
            var toggle = document.getElementById('mobile-menu-toggle');
            var menu = document.getElementById('mobile-menu');
            var iconOpen = document.getElementById('icon-open');
            var iconClose = document.getElementById('icon-close');
            if (!toggle || !menu) return;
            toggle.addEventListener('click', function () {
                var open = menu.classList.toggle('hidden') === false;
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
                iconOpen.classList.toggle('hidden', open);
                iconClose.classList.toggle('hidden', !open);
            });
        })();
    </script>
</body>
</html>
