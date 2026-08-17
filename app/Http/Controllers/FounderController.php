<?php

namespace App\Http\Controllers;

class FounderController extends Controller
{
    /**
     * Chaque paragraphe de la biographie est une vraie page indépendante,
     * avec navigation précédent/suivant — CLAUDE.md 3.12.5. Nombre de pages
     * = nombre réel de paragraphes du contenu source (4, vérifié dans
     * docs-source/Biographie_Ngapout_Nana_Fadimatou_TUBAWWIRI-3.docx), pas
     * un chiffre supposé.
     */
    public function index()
    {
        $position = (int) request()->route('position', 1);

        $paragraphs = __('founder.paragraphs');
        $total = count($paragraphs);

        abort_unless($position >= 1 && $position <= $total, 404);

        return view('pages.founder.index', [
            'paragraph' => $paragraphs[$position - 1],
            'position' => $position,
            'total' => $total,
        ]);
    }

    /**
     * Aperçu temporaire — Option A (page unique, copie conforme du mockup
     * exemplepagebibliographie.png), à comparer avec l'Option B (4 pages
     * paginées) pour que la Fondatrice tranche. À retirer une fois le choix fait.
     */
    public function apercu()
    {
        return view('pages.founder.apercu-unique', [
            'paragraphs' => __('founder.paragraphs'),
        ]);
    }
}
