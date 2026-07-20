<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach ($urls as $url)
    <url>
        <loc>{{ $url['loc'] }}</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="{{ $url['loc'] }}" />
        <xhtml:link rel="alternate" hreflang="en" href="{{ $url['loc_en'] }}" />
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>{{ $url['loc_en'] }}</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="{{ $url['loc'] }}" />
        <xhtml:link rel="alternate" hreflang="en" href="{{ $url['loc_en'] }}" />
        <changefreq>weekly</changefreq>
    </url>
    @endforeach
</urlset>
