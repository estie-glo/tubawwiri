<?php

namespace App\Http\Controllers;

class RubriqueController extends Controller
{
    /**
     * Page d'index : grille des 10 rubriques en cartes d'aperçu avec
     * "VOIR PLUS →" — conforme à exempleinterfacenosrubriques.png (3.12.4).
     */
    public function index()
    {
        return view('pages.rubriques.index');
    }

    /**
     * Chaque rubrique a sa propre page complète, avec navigation
     * précédent/suivant — CLAUDE.md 3.4/3.12.5 ("même les rubriques
     * c'est pareil").
     */
    public function show(string $locale)
    {
        $position = (int) request()->route('position', 1);

        $items = __('rubriques.items');
        $total = count($items);

        abort_unless($position >= 1 && $position <= $total, 404);

        return view('pages.rubriques.show', [
            'item' => $items[$position - 1],
            'position' => $position,
            'total' => $total,
        ]);
    }
}
