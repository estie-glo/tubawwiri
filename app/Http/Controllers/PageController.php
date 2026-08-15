<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    /**
     * Chaque paragraphe/section du contenu est une vraie page indépendante
     * (1 cadre = 1 URL), avec navigation précédent/suivant — CLAUDE.md 3.12.5.
     */
    public function show(string $locale)
    {
        // "slug" (défini via defaults()) et "position" (segment d'URI présent
        // seulement sur la route .show) ne sont PAS déclarés comme paramètres
        // de méthode typés : Laravel injecte les paramètres de route par
        // position, et le nombre de segments diffère entre /qui-sommes-nous
        // (locale + défaut slug = 2) et /qui-sommes-nous/{position}
        // (locale + position + défaut slug = 3), ce qui désaligne tout
        // paramètre typé placé après $locale. On les lit donc directement sur
        // la requête pour rester correct sur les deux routes.
        $slug = request()->route('slug', 'qui-sommes-nous');
        $position = (int) request()->route('position', 1);

        $page = Page::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $blocks = split_content_blocks(localized($page, 'content'));
        $total = count($blocks);

        abort_unless($total > 0 && $position >= 1 && $position <= $total, 404);

        return view('pages.institutional', [
            'page' => $page,
            'block' => $blocks[$position - 1],
            'position' => $position,
            'total' => $total,
        ]);
    }
}