<?php

namespace App\Http\Controllers;

use App\Models\ActionDomain;

class ActionDomainController extends Controller
{
    public function index()
    {
        $actionDomains = ActionDomain::where('is_published', true)
            ->orderBy('order')
            ->get();

        return view('pages.action-domains.index', compact('actionDomains'));
    }

    /**
     * Chaque champ (enjeux, objectifs, actions, publics cibles, résultats
     * attendus) est une vraie page indépendante avec navigation précédent/
     * suivant — CLAUDE.md 3.12.5/3.12.6, conforme à
     * exemplespagesdesliensdestypesdedomainesdaction.png.
     */
    public function show(string $locale, string $actionDomain)
    {
        $actionDomain = ActionDomain::where('slug', $actionDomain)->firstOrFail();
        $actionDomain->load('programs');

        $fields = [];
        foreach ([
            'enjeux' => ['label' => __('pages.field_enjeux'), 'icon' => 'warning'],
            'objectifs' => ['label' => __('pages.field_objectifs'), 'icon' => 'target'],
            'actions' => ['label' => __('pages.field_actions'), 'icon' => 'megaphone'],
            'publics_cibles' => ['label' => __('pages.field_publics_cibles'), 'icon' => 'people'],
            'resultats_attendus' => ['label' => __('pages.field_resultats_attendus'), 'icon' => 'trending'],
        ] as $field => $meta) {
            if (localized($actionDomain, $field)) {
                $fields[] = ['label' => $meta['label'], 'icon' => $meta['icon'], 'html' => localized($actionDomain, $field)];
            }
        }

        $position = (int) request()->route('position', 1);
        $total = count($fields);

        abort_unless($total > 0 && $position >= 1 && $position <= $total, 404);

        return view('pages.action-domains.show', [
            'actionDomain' => $actionDomain,
            'field' => $fields[$position - 1],
            'position' => $position,
            'total' => $total,
        ]);
    }
}
