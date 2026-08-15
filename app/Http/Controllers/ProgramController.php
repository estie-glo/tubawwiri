<?php

namespace App\Http\Controllers;

use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_published', true)->get();

        return view('pages.programs.index', compact('programs'));
    }

    /**
     * Chaque champ (problème, public concerné, objectifs, activités,
     * résultats attendus, bénéficiaires) est une vraie page indépendante
     * avec navigation précédent/suivant — CLAUDE.md 3.12.5/3.12.6, conforme
     * à exemplepagedesliensdestypesdeprogrammes.png.
     */
    public function show(string $locale, string $program)
    {
        $program = Program::where('slug', $program)->firstOrFail();

        $fields = [];
        foreach ([
            'probleme_fr' => ['label' => __('pages.field_probleme'), 'icon' => 'warning'],
            'public_concerne_fr' => ['label' => __('pages.field_public_concerne'), 'icon' => 'people'],
            'objectifs_fr' => ['label' => __('pages.field_objectifs'), 'icon' => 'target'],
            'activites_fr' => ['label' => __('pages.field_activites'), 'icon' => 'megaphone'],
            'resultats_attendus_fr' => ['label' => __('pages.field_resultats_attendus'), 'icon' => 'trending'],
            'beneficiaires_fr' => ['label' => __('pages.field_beneficiaires'), 'icon' => 'heart'],
        ] as $field => $meta) {
            if ($program->$field) {
                $fields[] = ['label' => $meta['label'], 'icon' => $meta['icon'], 'html' => $program->$field];
            }
        }

        $position = (int) request()->route('position', 1);
        $total = count($fields);

        abort_unless($total > 0 && $position >= 1 && $position <= $total, 404);

        return view('pages.programs.show', [
            'program' => $program,
            'field' => $fields[$position - 1],
            'position' => $position,
            'total' => $total,
        ]);
    }
}