    {{-- ===== SEO ===== --}}
    @php
        $seoTitle = trim($__env->yieldContent('title', 'Fondation TUBAWWIRI (TBW)'));
        $seoDescription = trim($__env->yieldContent('meta_description', 'La Fondation TUBAWWIRI (TBW) œuvre pour la promotion de la santé mentale communautaire et de la résilience humaine.'));
    @endphp

    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Alternates de langue pour Google --}}
    @php
        $currentPath = request()->path();
        $pathWithoutLocale = preg_replace('#^(fr|en)#', '', $currentPath);
    @endphp
    <link rel="alternate" hreflang="fr" href="{{ url('/fr' . $pathWithoutLocale) }}">
    <link rel="alternate" hreflang="en" href="{{ url('/en' . $pathWithoutLocale) }}">

    {{-- Open Graph (partage Facebook/LinkedIn/WhatsApp) --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Fondation TUBAWWIRI (TBW)">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo-tbw.jpg') }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'en' ? 'en_US' : 'fr_FR' }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">

    {{-- Google Analytics — actif uniquement si GOOGLE_ANALYTICS_ID est défini dans .env --}}
    @if (config('services.google_analytics_id'))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config('services.google_analytics_id') }}');
        </script>
    @endif
