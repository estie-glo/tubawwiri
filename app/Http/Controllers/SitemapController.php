<?php

namespace App\Http\Controllers;

use App\Models\ActionDomain;
use App\Models\Article;
use App\Models\Program;
use App\Models\Report;
use App\Models\Training;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    /**
     * Génère le plan de site XML avec toutes les pages publiées,
     * en FR et EN (balises hreflang pour indiquer les versions liées à Google).
     */
    public function index()
    {
        $staticPaths = [
            '', 'qui-sommes-nous', 'notre-approche', 'domaines-action',
            'programmes', 'observatoire', 'tbw-consulting', 'tbw-academy',
            'ressources', 'actualites', 'nos-impacts', 'faire-un-don',
            'nous-rejoindre', 'medias', 'contact',
        ];

        $urls = collect($staticPaths)->map(fn ($path) => [
            'loc' => url("/fr/{$path}"),
            'loc_en' => url("/en/{$path}"),
        ]);

        // Pages de détail dynamiques (contenu publié uniquement)
        ActionDomain::where('is_published', true)->get()->each(function ($item) use (&$urls) {
            $urls->push([
                'loc' => url("/fr/domaines-action/{$item->slug}"),
                'loc_en' => url("/en/domaines-action/{$item->slug}"),
            ]);
        });

        Program::where('is_published', true)->get()->each(function ($item) use (&$urls) {
            $urls->push([
                'loc' => url("/fr/programmes/{$item->slug}"),
                'loc_en' => url("/en/programmes/{$item->slug}"),
            ]);
        });

        Report::where('is_published', true)->get()->each(function ($item) use (&$urls) {
            $urls->push([
                'loc' => url("/fr/observatoire/{$item->slug}"),
                'loc_en' => url("/en/observatoire/{$item->slug}"),
            ]);
        });

        Training::where('is_published', true)->get()->each(function ($item) use (&$urls) {
            $urls->push([
                'loc' => url("/fr/tbw-academy/{$item->slug}"),
                'loc_en' => url("/en/tbw-academy/{$item->slug}"),
            ]);
        });

        Article::published()->get()->each(function ($item) use (&$urls) {
            $urls->push([
                'loc' => url("/fr/actualites/{$item->slug}"),
                'loc_en' => url("/en/actualites/{$item->slug}"),
            ]);
        });

        $xml = view('sitemap', ['urls' => $urls])->render();

        return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
