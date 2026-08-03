<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_domain_id', 'slug', 'title_fr', 'title_en',
        'summary_fr', 'probleme_fr', 'public_concerne_fr',
        'objectifs_fr', 'activites_fr', 'duree',
        'beneficiaires_fr', 'indicateurs_fr', 'resultats_attendus_fr',
        'defis_3t', 'partenaires_souhaites_fr',
        'cover_image', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'defis_3t' => 'array',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function actionDomain()
    {
        return $this->belongsTo(ActionDomain::class);
    }

    // Libellés d'affichage pour les Défis 3T cochés (ex: TESIMAMA — Se reconnecter)
    public function defis3tLabels(): array
    {
        $labels = [
            'tesimama' => 'TESIMAMA — Se reconnecter',
            'tolamuke' => 'TOLAMUKE — Prendre conscience et apprendre',
            'telumiere' => 'TELUMIÈRE — Agir et faire rayonner',
        ];

        return collect($this->defis_3t ?? [])
            ->map(fn ($key) => $labels[$key] ?? $key)
            ->all();
    }
}
