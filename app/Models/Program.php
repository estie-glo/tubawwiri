<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_domain_id', 'slug', 'title_fr', 'title_en',
        'summary_fr', 'summary_en',
        'objectifs_fr', 'objectifs_en',
        'activites_fr', 'activites_en',
        'duree',
        'beneficiaires_fr', 'beneficiaires_en',
        'indicateurs_fr', 'indicateurs_en',
        'partenaires_souhaites_fr', 'partenaires_souhaites_en',
        'cover_image', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function actionDomain()
    {
        return $this->belongsTo(ActionDomain::class);
    }
}
