<?php

namespace App\Http\Controllers;

class ArchitectureController extends Controller
{
    /**
     * Chaque volet est une vraie page indépendante (1 cadre = 1 URL), avec
     * navigation précédent/suivant — CLAUDE.md 3.12.4/3.12.5 (12 volets
     * confirmés par interfacearchitecturedelecosystemetbw.png).
     */
    public function show(string $locale)
    {
        $position = (int) request()->route('position', 1);

        $volets = __('architecture.volets');
        $total = count($volets);

        abort_unless($position >= 1 && $position <= $total, 404);

        return view('pages.architecture.index', [
            'volet' => $volets[$position - 1],
            'position' => $position,
            'total' => $total,
        ]);
    }
}
