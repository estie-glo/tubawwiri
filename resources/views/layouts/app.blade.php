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

        .reveal {
            opacity: 0;
            transform: translateY(16px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .reveal-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .hover-lift {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .hover-lift:hover {
            transform: translateY(-3px);
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.18;
            animation: float 18s ease-in-out infinite;
        }
        .blob-1 {
            width: 420px; height: 420px;
            background: #123D2E;
            top: -100px; left: -80px;
            animation-delay: 0s;
        }
        .blob-2 {
            width: 360px; height: 360px;
            background: #C99A3E;
            top: 40%; right: -100px;
            animation-delay: -6s;
        }
        .blob-3 {
            width: 300px; height: 300px;
            background: #6B2A28;
            bottom: -80px; left: 30%;
            animation-delay: -12s;
        }
        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -40px) scale(1.08); }
            66% { transform: translate(-25px, 25px) scale(0.95); }
        }
        @media (prefers-reduced-motion: reduce) {
            .blob { animation: none; }
        }
    </style>

    <link rel="icon" href="{{ asset('images/logo-tbw.jpg') }}">
</head>
<body class="font-body text-[#211D16] bg-[#F6F1E4] flex flex-col min-h-screen">
    @php
        $social = config('tubawwiri.social');
        $contact = config('tubawwiri.contact');
        $whatsappDigits = preg_replace('/\D+/', '', $contact['whatsapp'] ?? '');
        $navLinks = [
            ['route' => 'home', 'label' => __('site.nav.home'), 'params' => []],
            ['route' => 'about', 'label' => __('site.nav.about'), 'params' => []],
            ['route' => 'approach', 'label' => __('site.nav.approach'), 'params' => []],
            ['route' => 'action-domains.index', 'label' => __('site.nav.domains'), 'params' => []],
            ['route' => 'programs.index', 'label' => __('site.nav.programs'), 'params' => []],
            ['route' => 'observatory.index', 'label' => __('site.nav.observatory'), 'params' => []],
            ['route' => 'consulting.index', 'label' => __('site.nav.consulting'), 'params' => []],
            ['route' => 'academy.index', 'label' => __('site.nav.academy'), 'params' => []],
            ['route' => 'resources.index', 'label' => __('site.nav.resources'), 'params' => []],
            ['route' => 'news.index', 'label' => __('site.nav.news'), 'params' => []],
            ['route' => 'impact.index', 'label' => __('site.nav.impact'), 'params' => []],
            ['route' => 'join.index', 'label' => __('site.nav.join'), 'params' => []],
            ['route' => 'media.index', 'label' => __('site.nav.media'), 'params' => []],
            ['route' => 'contact.index', 'label' => __('site.nav.contact'), 'params' => []],
        ];
        $currentPath = request()->path();
        $pathWithoutLocale = preg_replace('#^(fr|en)#', '', $currentPath);
        $frUrl = url('/fr' . $pathWithoutLocale);
        $enUrl = url('/en' . $pathWithoutLocale);
    @endphp

    <div class="h-[3px] w-full bg-gradient-to-r from-[#6B2A28] via-[#C99A3E] to-[#3B2560]"></div>

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
                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route'], array_merge([app()->getLocale()], $link['params'])) }}"
                       class="hover:text-[#C99A3E] border-b border-transparent hover:border-[#C99A3E] pb-1 shrink-0 transition">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="flex items-center gap-3 shrink-0">
                <div class="flex items-center gap-2 text-xs font-semibold text-[#123D2E]">
                    <a href="{{ $frUrl }}" class="{{ app()->getLocale() === 'fr' ? 'text-[#C99A3E]' : 'hover:text-[#C99A3E]' }}">FR</a>
                    <span class="text-[#6B2A28]">|</span>
                    <a href="{{ $enUrl }}" class="{{ app()->getLocale() === 'en' ? 'text-[#C99A3E]' : 'hover:text-[#C99A3E]' }}">EN</a>
                </div>

                <a href="{{ route('donation.index', app()->getLocale()) }}"
                   class="hidden sm:inline-flex bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] text-xs font-bold uppercase tracking-wider px-4 py-2.5 transition">
                    {{ __('site.nav.donate') }}
                </a>

                <button type="button" id="mobile-menu-toggle" class="lg:hidden inline-flex items-center justify-center w-10 h-10 border border-[#d8cfb8] text-[#123D2E]" aria-expanded="false" aria-controls="mobile-menu">
                    <span class="sr-only">Menu</span>
                    <svg id="icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden lg:hidden border-t border-[#e5ddc8] bg-[#F6F1E4]">
            <nav class="max-w-7xl mx-auto px-4 py-4 grid gap-1 text-sm font-semibold uppercase tracking-wider text-[#123D2E]">
                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route'], array_merge([app()->getLocale()], $link['params'])) }}"
                       class="py-2.5 border-b border-[#ebe3d0] hover:text-[#C99A3E]">
                        {{ $link['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('donation.index', app()->getLocale()) }}"
                   class="mt-3 bg-[#C99A3E] text-[#123D2E] text-center py-3 tracking-wider">
                    {{ __('site.nav.donate') }}
                </a>
            </nav>
        </div>
    </header>

    @if (session('success'))
        <div id="flash-message" class="max-w-4xl mx-auto mt-6 px-4 fade-in">
            <div class="flex items-start gap-4 bg-white border-l-2 border-[#123D2E] px-5 py-4 shadow-sm">
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
                <div class="flex flex-wrap gap-3 text-sm">
                    @if (!empty($social['facebook']))
                        <a href="{{ $social['facebook'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-[#C99A3E]">Facebook</a>
                    @endif
                    @if (!empty($social['instagram']))
                        <a href="{{ $social['instagram'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-[#C99A3E]">Instagram</a>
                    @endif
                    @if (!empty($social['youtube']))
                        <a href="{{ $social['youtube'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-[#C99A3E]">YouTube</a>
                    @endif
                    @if (!empty($social['tiktok']))
                        <a href="{{ $social['tiktok'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-[#C99A3E]">TikTok</a>
                    @endif
                    @if (!empty($social['linkedin']))
                        <a href="{{ $social['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-[#C99A3E]">LinkedIn</a>
                    @endif
                </div>
                @if (!empty($social['whatsapp_channel']))
                    <a href="{{ $social['whatsapp_channel'] }}" target="_blank" rel="noopener noreferrer" class="mt-4 inline-block text-sm text-[#C99A3E] font-semibold">WhatsApp →</a>
                @endif
            </div>
            <div>
                <p class="font-semibold text-white text-xs uppercase tracking-wider mb-4">{{ __('forms.newsletter_title') }}</p>
                <p class="text-sm text-[#8fae9d] mb-4">{{ __('forms.newsletter_subtitle') }}</p>
                <form method="POST" action="{{ route('newsletter.store', app()->getLocale()) }}" class="space-y-3 relative">
                    @csrf
                    <div class="absolute left-[-9999px]" aria-hidden="true">
                        <label for="website_newsletter">Website</label>
                        <input type="text" name="website" id="website_newsletter" tabindex="-1" autocomplete="off">
                    </div>
                    <input type="email" name="email" required placeholder="email@exemple.com"
                           class="w-full bg-transparent border border-[#1c4d3a] focus:border-[#C99A3E] outline-none px-3 py-2 text-sm text-white placeholder:text-[#8fae9d]">
                    <button type="submit" class="w-full bg-[#C99A3E] hover:bg-[#b3872f] text-[#123D2E] text-xs font-bold uppercase tracking-wider py-2.5 transition">
                        {{ __('forms.newsletter_submit') }}
                    </button>
                </form>
                <p class="text-sm text-[#cfe0d5] mt-6">{{ $contact['email'] }}</p>
                <p class="text-sm text-[#cfe0d5]">{{ $contact['website'] }}</p>
            </div>
        </div>
        <div class="border-t border-[#1c4d3a] text-center text-xs text-[#8fae9d] py-4">
            &copy; {{ date('Y') }} Fondation TUBAWWIRI (TBW) — {{ __('site.footer.rights') }}
        </div>
    </footer>

    @if ($whatsappDigits)
        <a href="https://wa.me/{{ $whatsappDigits }}" target="_blank" rel="noopener noreferrer"
           class="fixed bottom-5 right-5 bg-[#25D366] hover:brightness-95 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg z-50"
           aria-label="WhatsApp">
            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M20.52 3.48A11.86 11.86 0 0 0 12.05 0C5.5 0 .16 5.34.16 11.9c0 2.1.55 4.15 1.6 5.96L0 24l6.3-1.65a11.86 11.86 0 0 0 5.74 1.46h.01c6.55 0 11.9-5.34 11.9-11.9 0-3.18-1.24-6.17-3.43-8.43ZM12.05 21.2h-.01a9.3 9.3 0 0 1-4.74-1.3l-.34-.2-3.74.98 1-3.64-.22-.37a9.28 9.28 0 0 1-1.42-4.96c0-5.13 4.18-9.3 9.32-9.3a9.25 9.25 0 0 1 9.3 9.31c0 5.13-4.18 9.28-9.29 9.28Zm5.1-6.96c-.28-.14-1.65-.81-1.9-.9-.26-.1-.44-.14-.63.14-.19.28-.72.9-.88 1.08-.16.19-.33.21-.6.07-.28-.14-1.17-.43-2.23-1.37-.82-.73-1.38-1.64-1.54-1.92-.16-.28-.02-.43.12-.57.12-.12.28-.33.42-.49.14-.16.19-.28.28-.47.1-.19.05-.35-.02-.49-.07-.14-.63-1.52-.86-2.08-.23-.55-.46-.47-.63-.48h-.54c-.19 0-.49.07-.75.35-.26.28-.98.96-.98 2.34s1.01 2.71 1.15 2.9c.14.19 1.98 3.02 4.8 4.23.67.29 1.19.46 1.6.59.67.21 1.28.18 1.76.11.54-.08 1.65-.67 1.88-1.32.23-.65.23-1.2.16-1.32-.07-.11-.25-.18-.53-.32Z"/>
            </svg>
        </a>
    @elseif (!empty($social['whatsapp_channel']))
        <a href="{{ $social['whatsapp_channel'] }}" target="_blank" rel="noopener noreferrer"
           class="fixed bottom-5 right-5 bg-[#25D366] hover:brightness-95 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg z-50"
           aria-label="WhatsApp Channel">
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
