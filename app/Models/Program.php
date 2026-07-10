<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_domain_id', 'slug', 'title_fr', 'title_en',
        'summary_fr', 'objectifs_fr', 'activites_fr', 'duree',
        'beneficiaires_fr', 'indicateurs_fr', 'partenaires_souhaites_fr',
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
